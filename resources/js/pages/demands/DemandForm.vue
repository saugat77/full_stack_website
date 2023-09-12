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
const form = reactive({
    name: '',
    description: '',
    salary: '',
    country: '',
    number_of_people_needed: '',
    active: '',
    image: '',
});

const handleSubmit = (values, actions) => {
    if (editMode.value) {
        editDemand(values, actions);
    } else {
        createDemand(values, actions);
    }
};

const createDemand = (values, actions) => {
    axios.post('/api/demands/create', form)
    .then((response) => {
        router.push('/admin/Demands');
        toastr.success('Demand created successfully!');
    })
    .catch((error) => {
        actions.setErrors(error.response.data.errors);
    })
};

const editDemand = (values, actions) => {
    axios.put(`/api/demands/${route.params.id}/edit`, form)
    .then((response) => {
        router.push('/admin/Demands');
        toastr.success('Demand updated successfully!');
    })
    .catch((error) => {
        actions.setErrors(error.response.data.errors);
    })
};
const getDemand = () => {
    axios.get(`/api/Demands/${route.params.id}/edit`)
    .then(({data}) => {
        form.name = data.name;
        form.salary = data.salary;
        form.country = data.country
        form.active = data.active;
        form.number_of_people_needed = data.number_of_people_needed;
        form.description = data.description;
        form.image = data.image;
    })
};

const editMode = ref(false);

onMounted(() => {
    if (route.name === 'admin.demands.edit') {
        editMode.value = true;
        getDemand();
    }

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
                        Demand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">Home</router-link>
                        </li>
                        <li class="breadcrumb-item">
                            <router-link to="/admin/Demands">Demands</router-link>
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
                                            <label for="title">Demand Title</label>
                                            <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" id="name" placeholder="Enter Name">
                                            <span class="invalid-feedback">{{ errors.name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Country</label>
                                            <input v-model="form.country" type="text" class="form-control" :class="{ 'is-invalid': errors.country }" id="country" placeholder="Enter Country">
                                            <span class="invalid-feedback">{{ errors.country }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start-time">Salary</label>
                                            <input v-model="form.salary" type="text" class="form-control" placeholder="Salary" :class="{'is-invalid': errors.salary}" id="salary">
                                            <span class="invalid-feedback">{{ errors.salary }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end-time">Vacancies</label>
                                            <input v-model="form.number_of_people_needed" type="text" placeholder="No. Of Vacancy Available" class="form-control" :class="{'is-invalid': errors.number_of_people_needed}" id="people">
                                            <span class="invalid-feedback">{{ errors.number_of_people_needed }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="end-time">Image</label>
                                            <input v-on="form.image" type="file"  class="form-control" :class="{'is-invalid': errors.image}" id="people">
                                            <span class="invalid-feedback">{{ errors.image }}</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Status</label>
                                            <select v-model="form.status" id="status" class="form-control" :class="{ 'is-invalid': errors.status }">
                                                <option value="">Select One</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="invalid-feedback" v-if="errors.status">Status is Required Field. Select One</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea v-model="form.description" class="form-control" :class="{'is-invalid': errors.description}" id="description" rows="3"
                                        placeholder="Enter Description"></textarea>
                                    <span class="invalid-feedback">{{ errors.description }}</span>
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
