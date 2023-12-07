<script setup>

import axios from 'axios';
import { ref, onMounted } from 'vue';

const contacts = ref([]);

const getContacts = () => {

    axios.get('/api/contact/messages').then((response => {
        contacts.value = response.data;
        console.log(contacts.value);
    }))
};
onMounted(() => {
    getContacts();
});

</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(contact, index) in contacts" :key="contact.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ contact.name }}</td>
                                    <td>{{ contact.email }}</td>
                                    <td>{{ contact.phone }}</td>
                                    <td>{{ contact.description }}</td>
                                    <td>{{ contact.address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
