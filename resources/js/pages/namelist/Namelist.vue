<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Namelist</h1>
                </div>
                <div v-if="$route.path === '/admin/namelist'" class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Namelist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <router-link
                                v-if="$route.path === '/admin/namelist'"
                                to="/admin/namelist/create"
                            >
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus-circle mr-1"></i> Add
                                    New Namelist
                                </button>
                            </router-link>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Passport No.</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Post</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(namelist, index) in namelists"
                                        :key="namelist.id"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ namelist.fullname }}</td>
                                        <td>{{ namelist.passport_no }}</td>
                                        <td>{{ namelist.dob }}</td>
                                        <td>{{ namelist.doe }}</td>
                                        <td>{{ namelist.status }}</td>
                                        <td>
                                            <router-link :to="'/admin/namelists/' + namelist.id + '/edit'">
                                                <i class="fa fa-edit mr-2"></i>
                                            </router-link>
                                            <a
                                                href="#"
                                                @click.prevent="deleteNamelist(namelist.id)"
                                            >
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Bootstrap4Pagination
                            :data="namelists"
                            @pagination-change-page="getNamelists"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { ref, onMounted } from "vue";
import moment from "moment";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
import Swal from "sweetalert2";

export default {
    components: {
        Bootstrap4Pagination
    },
    setup() {
        const namelists = ref([]);

        const getNamelists = () => {
            axios.get("/api/namelist")
                .then((response) => {
                    console.log(response.data);
                    namelists.value = response.data; // Use response.data to get the actual data
                })
                .catch((error) => {
                    console.error('Error fetching namelists:', error);
                });
        };

        onMounted(() => {
            getNamelists();
        });

        const deleteNamelist = (id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/namelist/${id}`)
                        .then(() => {
                            Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                            getNamelists(); // Refresh the list
                        })
                        .catch((error) => {
                            console.error('Error deleting namelist:', error);
                        });
                }
            });
        };

        return {
            namelists,
            getNamelists,
            deleteNamelist
        };
    }
};
</script>
