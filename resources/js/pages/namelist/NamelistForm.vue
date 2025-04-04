<script>

</script>
<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <span v-if="editMode">Edit</span>
                        <span v-else>Create</span>
                        Demand
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard"
                                >Home</router-link
                            >
                        </li>
                        <li class="breadcrumb-item">
                            <router-link to="/admin/namelist"
                                >Demands</router-link
                            >
                        </li>
                        <li class="breadcrumb-item active">
                            <span v-if="editMode">Edit</span>
                            <span v-else>Create</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <Form
                                enctype="multipart/form-data"
                                @submit="handleSubmit"
                                v-slot:default="{ errors }"
                            >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"
                                                >Full Name</label
                                            >
                                            <input
                                                v-model="form.fullname"
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': errors.fullname,
                                                }"
                                                id="name"
                                                placeholder="Enter Full Name"
                                                autocapitalize="on"
                                                autocomplete="name"
                                            />
                                            <span class="invalid-feedback">{{
                                                errors.fullname
                                            }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Passport Number </label>
                                            <input
                                                v-model="form.passport_no"
                                                type="text"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid':
                                                        errors.passport_no,
                                                }"
                                                id="passport_no."
                                                placeholder="Enter Passport No."
                                                autocomplete="country"
                                            />
                                            <span class="invalid-feedback">{{
                                                errors.passport_no
                                            }}</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </Form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
