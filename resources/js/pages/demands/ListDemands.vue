<script setup>
import axios from 'axios';
import { reactive, onMounted, ref } from 'vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { object } from 'yup';

const demands = ref({ 'demands': [] });
const selectedDemandStatus = ref();
const getDemands = (active) => {
    selectedDemandStatus.value = active;
    const params = {};
    if (active) {
        params.active = active;
    }

    axios.get('/api/getDemands',{
        params:params
    })
        .then((response) => {
            demands.value = response.data;


        })
};




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
                <div v-if="$route.path === '/admin/demands'" class="col-sm-6">
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

                        <div class="btn-group">
                            <button @click="getDemands(0)" type="button" class="btn"
                                :class="[selectedDemandStatus === 0 ? 'btn-secondary' : 'btn-default']">
                                <span class="mr-1">All</span>
                                <span class="badge badge-pill badge-info">{{ demands.total }}</span>
                            </button>

                            <div class="btn-group">
                                <!-- Use v-for to generate buttons for each status -->
                                <button type="button" class="btn" :class="[selectedDemandStatus === 1 ? 'btn-secondary' : 'btn-default']"
                                 @click="getDemands(1)">

                                    <span class="mr-1">Active</span>
                                    <span class="badge badge-pill" :class="`badge-primary `">
                                    </span>
                                </button>
                                <button type="button" class="btn" @click="getDemands(2)" :class="[selectedDemandStatus === 2 ? 'btn-secondary' : 'btn-default']">
                                    <span class="mr-1">Inactive</span>

                                </button>
                            </div>
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
                                    <tr v-for="(demand, index) in demands" :key="demand.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ demand.name }}</td>
                                        <td>{{ demand.country }}</td>
                                        <td>{{ demand.salary }}</td>
                                        <td>{{ demand.number_of_people_needed }}</td>

                                        <td>
                                            <span v-if="demand.active == true" class=" text-success">Active</span>
                                            <span v-else class="text-danger">Inactive</span>
                                        </td>
                                        <td style="max-width: 10vw;">
                                            <img v-if="demand.image" class="profile-user-img" style="max-height: 50px; max-width:50px;" :src="demand.image" alt="">
                                        </td>


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
