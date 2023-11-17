<script setup>
import axios from 'axios';
import { reactive, onMounted, ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { useToastr } from '../../toaster';
import { Form } from 'vee-validate';
import flatpickr from "flatpickr";
import 'flatpickr/dist/themes/light.css';


const router = useRouter();
const route = useRoute();
const toastr = useToastr();
const statuses = ref([]);
const form = reactive({
    title: '',
    client_id: '',
    start_time: '',
    end_time: '',
    description: '',
});

const handleSubmit = (values, actions) => {
    if (editMode.value) {
        editAppointment(values, actions);
    } else {
        createAppointment(values, actions);
    }
};

const getStatus = () => {
    axios.get('/api/statuses')
        .then((response) => {
            statuses.value = response.data;
        })
}
const createAppointment = (values, actions) => {
    axios.post('/api/appointments/create', form)
    .then((response) => {
        router.push('/admin/appointments');
        toastr.success('Appointment created successfully!');
    })
    .catch((error) => {
        actions.setErrors(error.response.data.errors);
    })
};

const editAppointment = (values, actions) => {
    axios.put(`/api/appointments/${route.params.id}/edit`, form)
    .then((response) => {
        router.push('/admin/appointments');
        toastr.success('Appointment updated successfully!');
    })
    .catch((error) => {
        actions.setErrors(error.response.data.errors);
    })
};

const clients = ref();
const getClients = () => {
    axios.get('/api/getClients')
    .then((response) => {
        clients.value = response.data;
    })
};

const getAppointment = () => {
    axios.get(`/api/appointments/${route.params.id}/edit`)
    .then(({data}) => {
        form.title = data.title;
        form.client_id = data.client_id;
        form.status_id = data.status_id
        form.start_time = data.start_time;
        form.end_time = data.end_time;
        form.description = data.description;
    })
};

const editMode = ref(false);

onMounted(() => {
    if (route.name === 'admin.appointments.edit') {
        editMode.value = true;
        getAppointment();
    }

    flatpickr(".flatpickr", {
        enableTime: true,
        dateFormat: "Y-m-d h:i K",
        defaultHour: 10,
    });
    getClients();
    getStatus();
});
</script>

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <span v-if="editMode">Edit</span>
                        <span v-else>Create</span>
                        Appointment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">Home</router-link>
                        </li>
                        <li class="breadcrumb-item">
                            <router-link to="/admin/appointments">Appointments</router-link>
                        </li>
                        <li class="breadcrumb-item active">
                            <span v-if="editMode">Edit</span>
                            <span v-else>Create</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <Form @submit="handleSubmit" v-slot:default="{ errors }">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input v-model="form.title" type="text" class="form-control" :class="{ 'is-invalid': errors.title }" id="title" placeholder="Enter Title">
                                            <span class="invalid-feedback">{{ errors.title }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Client Name</label>
                                            <select v-model="form.client_id" id="client" class="form-control" :class="{ 'is-invalid': errors.client_id }">
                                                <option value="">Select One</option>
                                                <option v-for="client in clients" :value="client.id" :key="client.id">{{ client.first_name }} {{ client.last_name }}</option>
                                            </select>
                                            <span class="invalid-feedback" v-if="errors.client_id">Client Name is Required Field. Select One</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start-time">Start Time</label>
                                            <input v-model="form.start_time" type="text" class="form-control flatpickr" :class="{'is-invalid': errors.start_time}" id="start-time">
                                            <span class="invalid-feedback">{{ errors.start_time }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end-time">End Time</label>
                                            <input v-model="form.end_time" type="text" class="form-control flatpickr" :class="{'is-invalid': errors.end_time}" id="end-time">
                                            <span class="invalid-feedback">{{ errors.end_time }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea v-model="form.description" class="form-control" :class="{'is-invalid': errors.description}" id="description" rows="3"
                                        placeholder="Enter Description"></textarea>
                                    <span class="invalid-feedback">{{ errors.description }}</span>
                                </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Status</label>
                                            <select v-model="form.status_id" id="status" class="form-control" :class="{ 'is-invalid': errors.status_id }">
                                                <option value="">Select One</option>
                                                <option v-for="status in statuses" :value="status.id" :key="status.id">{{ status.name }}</option>
                                            </select>
                                            <span class="invalid-feedback" v-if="errors.status">Status is Required Field. Select One</span>
                                        </div>
                                    </div>
                            </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </Form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
