<script setup>
import moment from 'moment';
import { ref } from 'vue';
import { useToastr } from '../../toaster.js'
import { all } from 'axios';


// Define props that the parent component is passing
const { user, index, allRoles } = defineProps(['user', 'index', 'allRoles']);
const emit = defineEmits(['editUser','confirmUserDeletion']);
const userIdwhenDeleteing = ref(null);
const toastr = useToastr();

// const getAllRoles =() => {

//     }

// const editUser = (user) =>{
//     emit('editUser',user);
// }

</script>
<template>
    <tr>
        <th scope="row">{{ index + 1 }}</th>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ moment(user.created_at).format('YYYY-MM-DD h:m:s ') }}</td>
        <td >
          <p v-for="role in user.roles">{{ role.name }}</p>
        </td>
        <td>
            <a href="#" @click.prevent="$emit('editUser', user);"><i class="fa fa-edit"></i></a>
            <a href="#" @click.prevent="$emit('confirmUserDeletion', user.id)"><i class="ml-3 text-danger fa fa-trash"></i></a>
        </td>
    </tr>

</template>
