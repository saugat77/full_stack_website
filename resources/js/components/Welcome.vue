<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';

const demands = ref({ 'demands': [] });
const getDemands= ()=>{
    axios.get('/api/get-demands').then((response => {
        demands.value = response.data;
        console.log('demands:', response.data);
    }))
}
onMounted(()=>{
    getDemands();
});
</script>

<template>
    <h1>heading</h1>
    <div class="grid grid-cols-3 gap-3">
        <div class="bg-red">01</div>
        <div>01</div>
        <div>01</div>
        <div>01</div>
        <div>01</div>
        <div>01</div>
        <div>01</div>
        <!-- ... -->
        <div>09</div>
      </div>
</template>
