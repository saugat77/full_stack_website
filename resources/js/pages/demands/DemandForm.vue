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
const file = ref();
const imageStatus = ref(false);

const form = reactive({
    name: '',
    description: '',
    salary: '',
    country: '',
    number_of_people_needed: '',
    active: '',
    image: null,
});

const pictureUrl = ref(null);
const imageUpload = (event) => {
  file.value = event.target.files[0];
  imageStatus.value = true;

  pictureUrl.value = URL.createObjectURL(file.value);
  console.log(pictureUrl.value);
  form.image = file.value;


};

const handleSubmit = (values, actions) => {
    if (editMode.value) {
        editDemand(values, actions);
    } else {
        createDemand(values, actions);
    }
};

const createDemand = (values, actions) => {
    const formData = new FormData();
    formData.append('image',file.value);
    formData.append('name',form.name);
    formData.append('description',form.description);
    formData.append('salary',form.salary);
    formData.append('country',form.country);
    formData.append('number_of_people_needed',form.number_of_people_needed);
    formData.append('active',form.active);
    axios.post('/api/demands/create', formData)
    .then((response) => {
        router.push('/admin/demands');
        toastr.success('Demand created successfully!');
    })
    .catch((error) => {
        actions.setErrors(error.response.data.errors);
    })
};

const editDemand = (values, actions) => {
    console.log(form.image);
    axios.post(`/api/demands/${route.params.id}/update`, form,{
        headers: {
            'Content-Type': 'multipart/form-data', // Set the content type for files
        }
    })

    .then((response) => {
        router.push('/admin/demands');
        toastr.success('Demand updated successfully!');
    })
    .catch((error) => {
        actions.setErrors(error.response.data.errors);
    })
};
const getDemand = () => {
    axios.get(`/api/demands/${route.params.id}/show`)
    .then(({data}) => {
        form.name = data.name;
        form.salary = data.salary;
        form.country = data.country
        form.active = data.active;
        form.number_of_people_needed = data.number_of_people_needed;
        form.description = data.description;
        form.image = imageStatus.value == true ? pictureUrl.value : data.image;
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
                            <Form enctype="multipart/form-data" @submit="handleSubmit" v-slot:default="{ errors }">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Demand Title</label>
                                            <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" id="name" placeholder="Enter Name" autocapitalize="on" autocomplete="name">
                                            <span class="invalid-feedback">{{ errors.name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input v-model="form.country" type="text" class="form-control" :class="{ 'is-invalid': errors.country }" id="country" placeholder="Enter Country" autocomplete="country">
                                            <span class="invalid-feedback">{{ errors.country }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input v-model="form.salary" type="text" class="form-control" placeholder="Salary" :class="{'is-invalid': errors.salary}" id="salary" autocomplete="salary">
                                            <span class="invalid-feedback">{{ errors.salary }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="people">Vacancies</label>
                                            <input v-model="form.number_of_people_needed" type="text" placeholder="No. Of Vacancy Available" class="form-control" :class="{'is-invalid': errors.number_of_people_needed}" id="people">
                                            <span class="invalid-feedback">{{ errors.number_of_people_needed }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="image">Image</label><br>
                                            <img class="profile-user-img" style="margin-left: 10%; width:30%;"  :src="imageStatus == true ? pictureUrl : form.image">
                                            <input name="image" type="file" @change="imageUpload"  class="form-control" :class="{'is-invalid': errors.image}" id="image">
                                            <span class="invalid-feedback">{{ errors.image }}</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="active">Status</label>
                                            <select v-model="form.active" id="active" class="form-control" :class="{ 'is-invalid': errors.active }">
                                                <option value="">Select One</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <span class="invalid-feedback" v-if="errors.active">Status is Required Field. Select One</span>
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
