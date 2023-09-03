import Dashboard from './components/Dashboard.vue';
import Demands from './pages/demands/ListDemands.vue';
import UsersList from './pages/users/UsersList.vue';
import UpdateSetting from './pages/settings/UpdateSettings.vue';
import UpdateProfile from './pages/profile/UpdateProfile.vue';
import Appointments from './pages/appointments/ListAppointment.vue';
export default [

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
        path:'/admin/appointments',
        name: 'admin.appointments',
        component: Appointments,
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
