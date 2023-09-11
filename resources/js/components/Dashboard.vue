<script setup>
import axios from 'axios';
import { ref, onMounted, reactive, watch } from 'vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import ListAppoinment from '../pages/appointments/ListAppointment.vue';



const users = ref({ 'users': [] });
const appointments = ref({ 'appointment': [] });

const getUsers = () => {
    axios.get(`/api/users`, {
    })
        .then((response) => {
            users.value = response.data.total;
        })
}
const countAppointment = () => {
    axios.get('/api/appointments')
        .then((response) => {
            appointments.value = response.data;
        })
}


onMounted(() => {
    getUsers();
    countAppointment();

})
</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="info-box bg-indigo">
                        <span class="info-box-icon"><i class="fa fa-box"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Appointments</span>
                            <span class="info-box-number"><span class="font-weight-normal">Total: {{ appointments.total }} </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">Total: {{ users }} </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fa fa-cart-arrow-down"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Demands</span>
                            <span class="info-box-number">Total </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fa fa-mail-bulk"></i></span>
                        <router-link to="/admin/messages">
                            <div class="info-box-content">
                                <span class="info-box-text">Contact Messages</span>
                                <span class="info-box-number">Total </span>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>


        </div>
        <ListAppoinment />
        <!-- <div class="card rounded z-depth-0">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="card-title">Appointments</div>
                    <div class="ml-auto">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool z-depth-0" data-card-widget="collapse"
                                id="collapseBtn"><i class="fas fa-window-minimize"></i></button>
                            <button type="button" class="btn btn-tool z-depth-0" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" id="ordersTable">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="font-poppins">
                                <th>Client Name</th>
                                <th>Appointment Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(appointment,index) in appointments.data" :key="appointment.id">
                                <td>
                                    <a class="text-primary font-semibold" href="">{{ index }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-circle" src=""
                                            style="height: 37px; height: 37px; padding: 2px; border: 1px solid #c2c3c4;">
                                        <div class="ml-2">

                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <span class="order-status-badge"></span>
                                </td>
                                <td>
                                    <span class="payment-status-badge "></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="42" class="text-center">No orders found</td>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div> -->
    </div>
</template>
