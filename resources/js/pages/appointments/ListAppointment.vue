<script setup>
import axios from 'axios';
import { ref, onMounted, computed } from 'vue';
import moment from 'moment';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import Swal from 'sweetalert2';

const appointments = ref({ data: [] });
const statuses = ref([]);
const selectedStatus = ref();
var allStatusCount = 0;

const getAppointments = (status) => {
    selectedStatus.value = status;
    const params = {};
    if (status) {
        params.status = status;
    }
    axios.get('/api/appointments', {
        params: params,
    })

        .then((response) => {
            appointments.value = response.data;

        });
}
const getStatus = () => {
    axios.get('/api/statuses')
        .then((response) => {
            statuses.value = response.data;
            console.log(statuses.value);

            statuses.value.forEach(status => {
                allStatusCount += status.appointments_count;
            });
        })
}
const deleteAppointment = (id) => {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'ml-2 btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: false,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/appointments/${id}/delete`)
                .then((response) => {
                    appointments.value.data = appointments.value.data.filter(appointment => appointment.id !== id)
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                })
                .catch((error) => {
                    // Handle error if the delete request fails
                    console.error('Error deleting appointment:', error);
                });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'The Process is cancelled :)',
                'error'
            )
        }
    })
}


onMounted(() => {
    getAppointments();
    getStatus();
})
</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Appointments</h1>
                </div>
                <div v-if="$route.path === '/admin/appointments'" class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
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
                            <router-link v-if="$route.path === '/admin/appointments'" to="/admin/appointments/create">
                                <button class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Add New
                                    Appointment</button>
                            </router-link>
                        </div>
                        <div class="btn-group">
                            <button @click="getAppointments()" type="button" class="btn"
                                :class="[typeof selectedStatus === 'undefined' ? 'btn-secondary' : 'btn-default']">
                                <span class="mr-1">All</span>
                                <span class="badge badge-pill badge-info">{{ allStatusCount }}</span>
                            </button>

                            <div class="btn-group">
                                <!-- Use v-for to generate buttons for each status -->
                                <button v-for="status in statuses" :key="status.id" @click="getAppointments(status.id)"
                                    type="button" class="btn"
                                    :class="[selectedStatus === status.id ? 'btn-secondary' : 'btn-default']">
                                    <span class="mr-1">{{ status.name }}</span>
                                    <span class="badge badge-pill" :class="`badge-${status.color}`">{{
                                        status.appointments_count }}
                                    </span>
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(appointment, index) in appointments.data" :key="appointment.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ appointment.title }}</td>
                                        <td>{{ appointment.client.first_name + ' ' + appointment.client.last_name }}</td>
                                        <td>{{ moment(appointment.start_time).format('YYYY-MM-DD h:m A') }}</td>
                                        <td>{{ moment(appointment.end_time).format('YYYY-MM-DD h:m A') }}</td>

                                        <td>
                                            <span class="badge" :class="`badge-${appointment.status.color}`">{{
                                                appointment.status.name }}</span>
                                        </td>
                                        <td>
                                            <router-link :to="'/admin/appointments/' + appointment.id + '/edit'">
                                                <i class="fa fa-edit mr-2"></i>
                                            </router-link>


                                            <a href="#" @click.prevent="$event => deleteAppointment(appointment.id)">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Bootstrap4Pagination :data="appointments" @pagination-change-page="getAppointments" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
