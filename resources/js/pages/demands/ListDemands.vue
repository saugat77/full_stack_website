<script setup>
import axios from 'axios';
import { reactive, onMounted, ref } from 'vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';

const demands = ref({'demands':[]});

const getDemands = () => {
    axios.get('/api/getDemands')
        .then((response) => {
            demands.value = response.data;
            console.log(demands.value)
        })
}

onMounted(() => {
    getDemands();
})
</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Demands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Demands</li>
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
                            <router-link v-if="$route.path === '/admin/demands'" to="/admin/demands/create">
                                <button class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Add New
                                    Demand</button>
                            </router-link>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">No. of Vacancies</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(demand,index) in demands.data" :key="demand.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ demand.name }}</td>
                                        <td>{{ demand.country }}</td>
                                        <td>{{ demand.salary }}</td>
                                        <td>{{ demand.number_of_people_needed }}</td>

                                        <td>
                                            <span v-if="demand.active == true" class=" text-success">Active</span>
                                            <span v-else class="text-danger">Inactive</span>
                                        </td>
                                        <img class="img-circle" :src="`${demand.image}`" alt="">


                                        <td>
                                            <router-link :to="'/admin/demands/' + demand.id + '/edit'">
                                                <i class="fa fa-edit mr-2"></i>
                                            </router-link>


                                            <a href="#" @click.prevent="$event => deleteDemand(appointment.id)">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Bootstrap4Pagination :data="demands" @pagination-change-page="getDemands" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
