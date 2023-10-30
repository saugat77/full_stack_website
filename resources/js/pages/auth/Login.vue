<script setup>
import axios from 'axios';
import { ref, reactive } from 'vue';
import { useToastr } from '../../toaster.js';

const toaster = useToastr();
const form = reactive({
    email: '',
    password: '',
});
const loading= ref(false);

const handleSubmit = () => {
loading.value = true;

    axios.post('/login', form)
        .then((response) => {
            window.location.href = '/admin/dashboard';
        })
        .catch((error) => {
            toaster.error('Credentials Does not Match!');
        })
        .finally(()=>{
            loading.value = false;
        });
}
const resetForm = () => {
    form.email = '';
    form.password = '';
}
</script>
<template>
    <div class="right-login-box">

        <div id="card" class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1 text-grey">Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form @submit.prevent="handleSubmit">
                    <div class="input-group mb-3">
                        <input v-model="form.email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input v-model="form.password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                        <button type="button" class=" btn btn-danger btn-block" @click="resetForm">Reset</button>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block" :disabled="loading">
                                <div v-if="loading" class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span v-else>Sign In</span>
                            </button>

                        </div>

                    </div>
                </form>
                
                <p class="mb-1 mt-2">
                    <a style="float: right;" href="forgot-password.html">I forgot my password</a>
                </p>
            </div>

        </div>
    </div>
</template>
