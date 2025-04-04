<script setup>
import Demand from "../pages/frontend/Demand.vue";
import MessageFromChairman from "../pages/frontend/MessageFromChairman.vue";
import CompanyObjective from "../pages/frontend/CompanyObjective.vue";
import ManpowerAvailability from "../pages/frontend/ManpowerAvailability.vue";
import { useToastr } from '../toaster.js';
const toaster = useToastr();
</script>
<template>

    <Demand />
    <MessageFromChairman />
    <CompanyObjective />
    <ManpowerAvailability />
</template>
