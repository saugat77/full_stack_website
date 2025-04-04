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
                        <div class="">
                            <input
                                type="text"
                                name="search"
                                v-model="searchQuery"
                                @input="getNamelists"
                                placeholder="Search..."
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Select</th>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Passport No.</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Date of Expiry</th>
                                        <th scope="col">Post</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="filteredNamelists.length">
                                        <tr
                                            v-for="(
                                                namelist, index
                                            ) in filteredNamelists"
                                            :key="namelist.id"
                                        >
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    :checked="
                                                        isSelected(namelist.id)
                                                    "
                                                    @change="
                                                        toggleSelection(
                                                            namelist.id
                                                        )
                                                    "
                                                />
                                            </td>
                                            <td>
                                                {{
                                                    index +
                                                    1 +
                                                    (currentPage - 1) * perPage
                                                }}
                                            </td>
                                            <td>{{ namelist.fullname }}</td>
                                            <td>{{ namelist.passport_no }}</td>
                                            <td>{{ namelist.dob }}</td>
                                            <td>{{ namelist.doe }}</td>
                                            <td>{{ namelist.status }}</td>
                                            <td>
                                                <router-link
                                                    :to="
                                                        '/admin/namelists/' +
                                                        namelist.id +
                                                        '/edit'
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-edit mr-2"
                                                    ></i>
                                                </router-link>
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                        deleteNamelist(
                                                            namelist.id
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-trash text-danger"
                                                    ></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td colspan="8" class="text-center">
                                            No results found
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button
                                class="m-1 float-right btn btn-primary"
                                @click="printSelectedNamelists"
                            >
                                <i class="fa fa-print mr-1"></i> Print Selected
                            </button>
                        </div>
                        <Bootstrap4Pagination
                            :data="namelists"
                            @pagination-change-page="getNamelists"
                            :current-page="currentPage"
                            :per-page="perPage"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { ref, onMounted, computed } from "vue";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
import { useToastr } from "../../toaster";
import Swal from "sweetalert2";

export default {
    components: {
        Bootstrap4Pagination,
    },
    setup() {
        const toastr = useToastr();
        const namelists = ref([]);
        const searchQuery = ref("");
        const currentPage = ref(1);
        const perPage = ref(20);
        const selectedNamelists = ref([]);
         printSelectedNamelists = (e) => {
            alert("hello");

            axios
                .post("/api/namelist")
                .then((response) => {
                    console.log(response);

                    router.push("/admin/demands");
                    toastr.success("Demand created successfully!");
                })
                .catch((error) => {
                    console.error("Error selecting namelists:", error);
                });
        };
        const getNamelists = (page = 1) => {
            currentPage.value = page;
            axios
                .get("/api/namelist", {
                    params: {
                        search: searchQuery.value,
                        page: page,
                        per_page: perPage.value,
                    },
                })
                .then((response) => {
                    namelists.value = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching namelists:", error);
                });
        };

        onMounted(() => {
            getNamelists();
        });

        const filteredNamelists = computed(() => {
            if (!searchQuery.value) {
                return namelists.value.data || [];
            }
            return namelists.value.data.filter((namelist) => {
                return (
                    namelist.fullname
                        .toLowerCase()
                        .includes(searchQuery.value.toLowerCase()) ||
                    namelist.passport_no
                        .toLowerCase()
                        .includes(searchQuery.value.toLowerCase()) ||
                    namelist.dob
                        .toLowerCase()
                        .includes(searchQuery.value.toLowerCase()) ||
                    namelist.doe
                        .toLowerCase()
                        .includes(searchQuery.value.toLowerCase()) ||
                    namelist.status
                        .toLowerCase()
                        .includes(searchQuery.value.toLowerCase())
                );
            });
        });

        const isSelected = (id) => {
            return selectedNamelists.value.includes(id);
        };

        const toggleSelection = (id) => {
            if (isSelected(id)) {
                selectedNamelists.value = selectedNamelists.value.filter(
                    (selectedId) => selectedId !== id
                );
            } else {
                selectedNamelists.value.push(id);
            }
        };

        const deleteNamelist = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(`/api/namelist/${id}`)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            getNamelists(currentPage.value);
                        })
                        .catch((error) => {
                            console.error("Error deleting namelist:", error);
                        });
                }
            });
        };

        return {
            namelists,
            searchQuery,
            filteredNamelists,
            getNamelists,
            deleteNamelist,
            currentPage,
            perPage,
            selectedNamelists,
            isSelected,
            toggleSelection,
        };
    },
};
</script>
