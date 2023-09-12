import Dashboard from './components/Dashboard.vue';
import Demands from './pages/demands/ListDemands.vue';
import DemandForm from './pages/demands/DemandForm.vue';
import UsersList from './pages/users/UsersList.vue';
import UpdateSetting from './pages/settings/UpdateSettings.vue';
import UpdateProfile from './pages/profile/UpdateProfile.vue';
import Appointments from './pages/appointments/ListAppointment.vue';
import AppointmentForm from './pages/appointments/AppointmentForm.vue';
import Login from './pages/auth/Login.vue';
export default [
    {
        path:'/login',
        name: 'login',
        component: Login,
    },
    {
        path:'/admin/dashboard',
        name: 'admin.dashboard',
        component: Dashboard,
    },
    {
        path:'/admin/demands',
        name: 'admin.demands',
        component: Demands,
    },
    {
        path:'/admin/demands/create',
        name: 'admin.demands.create',
        component: DemandForm,
    },
    {
        path:'/admin/demands/:id/edit',
        name: 'admin.demands.edit',
        component: DemandForm,
    },
    {
        path:'/admin/appointments',
        name: 'admin.appointments',
        component: Appointments,
    },
    {
        path:'/admin/appointments/create',
        name: 'admin.appointments.create',
        component: AppointmentForm,
    },
    {
        path:'/admin/appointments/:id/edit',
        name: 'admin.appointments.edit',
        component: AppointmentForm,
    },
    {
        path:'/admin/settings',
        name: 'admin.settings',
        component: UpdateSetting,
    },
    {
        path:'/admin/users',
        name: 'admin.users',
        component: UsersList,
    },
    {
        path:'/admin/profile',
        name: 'admin.profile',
        component: UpdateProfile,
    }

]
