<script setup>
import axios from 'axios';
import { ref, onMounted, reactive, watch } from 'vue';
import { Form, Field } from 'vee-validate';
import * as yup from 'yup';
import UserListShow from './UserListShow.vue';
import { debounce } from 'lodash';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { useToastr } from '../../toaster.js'


const users = ref({ 'data': [] });
const editing = ref(false);
const formValues = ref();
const form = ref(null);
const allRoles = ref([]);
const toastr = useToastr();
const userIdwhenDeleteing = ref(null);

const getUsers = (page = 1) => {
    axios.get(`/api/users?page=${page}`, {
        params: {
            query: searchQuery.value
        }
    })
        .then((response) => {
            users.value = response.data;
            console.log();
        })
}


const userCreateSchema = yup.object({
    name: yup.string().required(),
    email: yup.string().email().required(),
    password: yup.string().min(6).required(),
    confirm_password: yup.string().required().oneOf([yup.ref('password')], 'Passwords do not match'),
});
const userEditSchema = yup.object({
    name: yup.string().required(),
    email: yup.string().email().required(),
    password: yup.string().notRequired().test('password', 'Passwords must be be minimum of 8 characters', function (value) {
        if (!!value) {
            const schema = yup.string().min(8);
            return schema.isValidSync(value);
        }
        return true;
    }),
    roles: yup.string().required(),
    // confirm_password: yup.string().required().oneOf([yup.ref('password')], 'Passwords do not match'),
});


const createUser = (values, { resetForm, setErrors }) => {
    axios.post('/api/users/create', values)
        .then((response) => {
            console.log("User creation response:", response.data);
            users.value.data.unshift(response.data);
            $('#UserFormModel').modal('hide');
            // resetForm();
            toastr.success('User Added Successfully!');

        })
        .catch((error) => {
            console.log(error);
            if (error.response.data.errors) {

                setErrors(error.response.data.errors);
            }
            console.error("Error creating user:", error);
        });

};
const addUser = () => {
    formValues.value = {
        id: '',
        name: '',
        email: '',
        roles: ''

    };
    editing.value = false;
    $('#UserFormModel').modal('show');

}
var singleRoleName;

const editUser = (user) => {
    form.value.resetForm();
    editing.value = true;
    $('#UserFormModel').modal('show');

    formValues.value = {
        id: user.id,
        name: user.name,
        email: user.email,
        arrayRole: user.roles,
        roles: [] // Initialize the roles array
    };


    for (const rolesName of formValues.value.arrayRole) {
        singleRoleName = rolesName.name;
        formValues.value.roles.push(singleRoleName); // Push role name into roles array
    }
    console.log("Single Role Name:", formValues.value.roles);
};
const updateUser = (values, { setErrors }) => {
    axios.put('/api/users/edit/' + formValues.value.id, values)
        .then((response) => {
            const index = users.value.findIndex(user => user.id === response.data.id);
            users.value[index] = response.data;
            $('#UserFormModel').modal('hide');
            window.location.reload();

            toastr.success('User Updated Successfully!');

            resetForm();

        }).catch((error) => {
            console.log(error)
            if (error.response.data.errors) {

                setErrors(error.response.data.errors);
            }

        })
}



const handleSubmit = (values, actions) => {
    if (editing.value) {
        updateUser(values, actions);
    }
    else {
        createUser(values, actions);
    }
};

const getAllRoles = () => {
    axios.get('/api/allroles') // Adjust the endpoint as needed
        .then((response) => {
            allRoles.value = response.data;
        })
        .catch((error) => {
            console.error(error);
        });

}
const searchQuery = ref(null);

watch(searchQuery, debounce(() => {
    getUsers();
}, 300));

const deleteUser = () => {
    axios.delete(`/api/users/delete/${userIdwhenDeleteing.value}`)
        .then(() => {
            $('#deleteUserModal').modal('hide');
            toastr.success('User deleted successfully!');
            users.value.data = users.value.data.filter(user => user.id !== userIdwhenDeleteing.value);
        });
}

const confirmUserDeletion = (id) => {
    userIdwhenDeleteing.value = id;
    $('#deleteUserModal').modal('show');
}


onMounted(() => {
    getUsers();
    getAllRoles();
})
</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <button type="button" @click="addUser" class="m-2 float-right btn btn-primary">
                    <i class="fa fa-plus-circle mr-1 ">
                    </i>
                    Add New User
                </button>
                <div>
                    <input type="text" class="form-control" v-model="searchQuery" placeholder="Name Search...">
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="UserFormModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span v-if="editing">Edit User</span>
                            <span v-else>Add New User</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form ref="form" @submit="handleSubmit" :validation-schema="editing ? userEditSchema : userCreateSchema"
                        v-slot="{ errors }" :initial-values="formValues">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <Field name="name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }"
                                    placeholder="Enter full name" />
                                <span class="invalid-feedback">{{ errors.name }}</span>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <Field name="email" type="email" class="form-control"
                                    :class="{ 'is-invalid': errors.email }" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" />
                                <span class="invalid-feedback">{{ errors.email }}</span>


                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <Field type="password" name="password" class="form-control"
                                    :class="{ 'is-invalid': errors.password }" placeholder="Password" />
                                <span class="invalid-feedback">{{ errors.password }}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <Field type="password" name="confirm_password" class="form-control"
                                    :class="{ 'is-invalid': errors.confirm_password }" placeholder="Password" />
                                <span class="invalid-feedback">{{ errors.confirm_password }}</span>

                            </div>
                            <div>
                                <div v-if="editing" class="form-group">
                                    <label for="exampleInputPassword1">Roles</label>
                                    <Field name="roles" as="select" class="form-control"
                                        :class="{ 'is-invalid': errors.roles }">
                                        <option value="">Select One</option>
                                        <option v-for="role in allRoles" :key="role.id" :value="role.id"
                                            :selected="role.name == singleRoleName">{{ role.name }}</option>
                                    </Field>
                                    <span class="invalid-feedback">{{ errors.roles }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-white m-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Registered Date</th>
                        <th scope="col">Role</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody v-if="users.data.length > 0">
                    <UserListShow v-for="(user, index) in users.data" :key="user.id" :user=user :index=index
                        @edit-user="editUser" @confirm-user-deletion="confirmUserDeletion" />
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="6" class="text-center">
                            No Any result Found.....
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <Bootstrap4Pagination :data="users" @pagination-change-page="getUsers" />


    </div>
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
