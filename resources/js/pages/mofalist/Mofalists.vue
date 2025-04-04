<template>
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mofa Name List</h1>
                </div>
                <div v-if="$route.path === '/admin/mofalist'" class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mofa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</template>
