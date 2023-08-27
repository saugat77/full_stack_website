<script setup>
import moment from 'moment';
import {ref} from 'vue';
import { useToastr } from '../../toaster.js'


defineProps({
    user: Object,
    index:Number
});
const emit = defineEmits(['userDeleted' , 'editUser']);
const userIdwhenDeleteing = ref(null);
const toastr = useToastr();

// const editUser = (user) =>{
//     emit('editUser',user);
// }



const deleteUser = () => {
    axios.delete(`/api/users/delete/${userIdwhenDeleteing.value}`)
    .then(() => {
        $('#deleteUserModal').modal('hide');
        toastr.success('User deleted successfully!');
        emit('userDeleted',userIdwhenDeleteing.value);

    });
}

const confirmUserDeletion = (user) =>{
    userIdwhenDeleteing.value = user.id;
    $('#deleteUserModal').modal('show');
}

const displayRoles = (rolesArray) => {
    return rolesArray.map(role => role.name).join(', ');
       }

</script>
<template>
        <tr >
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ moment(user.created_at).format('YYYY-MM-DD h:m:s ') }}</td>
                        <td v-if="user.roles" v-for="(role) in user.roles">{{ role.name }}</td>
                        <td>
                            <a href="#" @click.prevent="$emit('editUser',user);"><i class="fa fa-edit"></i></a>
                            <a href="#" @click.prevent="confirmUserDeletion(user)"><i class="ml-3 text-danger fa fa-trash"></i></a>
                        </td>
                    </tr>
                      <!-- For delete -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                           <span>Delete User</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure, You want to delete?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" @click.prevent="deleteUser" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>
</template>
