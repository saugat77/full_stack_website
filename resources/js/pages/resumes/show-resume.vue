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
                <button type="button" class="m-2 float-right btn btn-primary">
                    <i class="fa fa-plus-circle mr-1 ">
                    </i>
                    Create New Cv
                </button>
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
                    <th scope="col">Worked At</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <p></p>
                    </td>
                    <td>
                        <!-- <a href="#" @click.prevent="$emit('editUser', user);"><i class="fa fa-edit"></i></a>
                        <a href="#" @click.prevent="$emit('confirmUserDeletion', user.id)"><i
                                class="ml-3 text-danger fa fa-trash"></i></a> -->
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</template>