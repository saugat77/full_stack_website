<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import Swal from 'sweetalert2';

const resumes = ref([]);
const getAllCv = () => {
    axios.get('/api/get-all-cv').then((response) => {
        resumes.value = response.data;
    })
}
const confirmUserDeletion = (id) => {
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
            axios.delete(`/api/resume/${id}/delete/`)
                .then((response) => {
                    resumes.value = resumes.value.filter(resume => resume.id !== id)

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
const downloadPdf = (id) => {
    console.log(id);
    axios.get(`/api/resume/create-or-download/pdf/${id}`).then((response) => {
        return `/api/resume/create-or-download/pdf/${id}`;
    });
}
onMounted(() => {
    getAllCv();
});
</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Resume</h1>


                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">Home</router-link>
                        </li>
                        <li class="breadcrumb-item">
                            <router-link to="">Resume</router-link>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <router-link to="/admin/resume/create" active-class="active" class="nav-link">
                    <button type="button" class="m-2 float-right btn btn-primary">
                        <i class="fa fa-plus-circle mr-1 ">
                        </i>
                        Create New Cv
                    </button>
                </router-link>
                <!-- <div>
                    <input type="text" class="form-control" v-model="searchQuery" placeholder="Search...">
                </div> -->
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white m-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PP Photo</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Passport Number</th>
                    <th scope="col">Worked As</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(resume, index) in   resumes  " :key="resume.id">
                    <th scope="row"> {{ index + 1 }} </th>
                    <td style="max-width: 10vw;">
                        <img v-if="resume.pp_size_image" class="img-circle elevation-2 mb-2"
                            style="max-height: 50px; max-width:50px;" :src="resume.pp_size_image" alt="">
                    </td>
                    <td> {{ resume.full_name }} </td>
                    <td> {{ resume.father_name }} </td>
                    <td> {{ resume.passport_number }} </td>
                    <td> {{ resume.worked_as }} </td>
                    <td>
                        <router-link :to="'/admin/resume/' + resume.id + '/edit'">
                            <i class="fa fa-edit mr-2"></i>
                        </router-link>
                        <a href="#" @click.prevent="$event => confirmUserDeletion(resume.id)"> <i class=" ml-3 text-danger fa
                            fa-trash"></i></a>

                        <a :href="'/api/resume/create-or-download/pdf/' + resume.id" target="_blank" title="Download">
                            <i class="ml-3 fa fa-download"></i>
                        </a>

                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</template>
