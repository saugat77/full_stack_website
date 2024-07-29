import './bootstrap';

import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';
import "vue3-carousel/dist/carousel.css";
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from 'vue-router';
import Routes from './routes.js';
import Login from './pages/auth/Login.vue';
import Welcome from './components/Welcome.vue';
const app = createApp({});
const frontend = createApp({});
const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});



app.use(router);
app.component('Login', Login);
app.mount('#app');
frontend.component('Welcome', Welcome);
frontend.mount('#frontend');
// Create a new Vue instance
