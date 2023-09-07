<script setup>
import axios from 'axios';
import { Form } from 'vee-validate';
import {ref, reactive, onMounted} from 'vue';
import { useRouter } from 'vue-router';
import { useToastr } from '../../toaster';
import flatPickr from "flatpickr";
import 'flatpickr/dist/themes/material_blue.css';

const router = useRouter();
const toastr = useToastr();
const clients = ref([]);
const form = reactive({
    title:'',
    client_id:'',
    start_time:'',
    end_time:'',
    description:'',
});
 const handleSubmit = (values , actions) => {
    axios.post('/api/appointment/create', form)
    .then((response)=>{
        router.push('/admin/appointments');
        toastr.success('Appointment Created Sucessfully');
    })
    .catch((error)=>{
        actions.setErrors(error.response.data.errors);
    })
 };

const getClients = () =>{
    axios.get('/api/getClients')
    .then((response) => {
        clients.value = response.data;
        console.log(clients.value);
    });
}
 onMounted(() => {
    flatpickr(".flatpickr",{
        enableTime : true,
        dateFormat: "Y-m-d h:i K",
        defaultHour:10,
    });
    getClients();
 });
</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Appointment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">Home</router-link>
                        </li>
                        <li class="breadcrumb-item">
                            <router-link to="/admin/appointments">Appointments</router-link>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
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
                                            <input v-model="form.title" type="text" :class="{'is-invalid' :errors.title }" class="form-control" id="title" placeholder="Enter Title">
                                            <span class="invalid-feedback">{{ errors.title }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Client Name</label>
                                            <select v-model="form.client_id"  :class="{'is-invalid' : errors.client_id }"  id="client" class="form-control">
                                                <option value="">Choose One</option>
                                                <option v-for="client in clients"  :key="client.id" :value="client.id">{{ client.first_name +' ' + client.last_name }}</option>
                                            </select>
                                        <span class="invalid-feedback" v-if="errors.client_id">Client Name is Required. Choose One.</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Start Time</label>
                                            <input v-model="form.start_time" type="text" class="form-control flatpickr" placeholder="YYYY/MM/DD" :class="{'is-invalid' : errors.start_time }" id="start-time">
                                            <span class="invalid-feedback">{{ errors.start_time }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time">End Time</label>
                                            <input v-model="form.end_time" type="text"  :class="{'is-invalid' : errors.end_time }" placeholder="YYYY/MM/DD" class="form-control flatpickr" id="end-time">
                                         <span class="invalid-feedback">{{ errors.end_time }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea v-model="form.description"  class="form-control"  :class="{'is-invalid' : errors.description }" id="description" rows="3"
                                        placeholder="Enter Description"></textarea>
                                        <span class="invalid-feedback">{{ errors.description }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
