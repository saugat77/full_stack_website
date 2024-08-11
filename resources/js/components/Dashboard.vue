<script setup>
import axios from 'axios';
import { ref, onMounted, reactive, watch } from 'vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import ListAppoinment from '../pages/appointments/ListAppointment.vue';
import ListDemands from '../pages/demands/ListDemands.vue';



const users = ref({ 'users': [] });
const appointments = ref({ 'appointment': [] });
const contacts = ref({ 'contacts': [] });
const getContacts = () => {

    axios.get('/api/contact/messages').then((response => {
        contacts.value = response.data;
        console.log('contatcs:', response.data.length);
    }))
};
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
const demands = ref([]);
const countDemands = () => {
    axios.get('/api/getDemands')
        .then((response) => {
            demands.value = response.data;
        })
}
onMounted(() => {
    getUsers();
    countAppointment();
    countDemands();
    getContacts();
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
                            <span class="info-box-number"><span class="font-weight-normal">Total: {{ appointments.total }}
                                </span>
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
                            <span class="info-box-number">Total: {{ demands.length }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fa fa-mail-bulk"></i></span>
                        <router-link to="/admin/contact/messages">
                            <div class="info-box-content">
                                <span class="info-box-text">Contact Messages</span>
                                <span class="info-box-number">Total: {{ contacts.length }} </span>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>


        </div>
        <ListAppoinment />
        <ListDemands />
    </div>
</template>
