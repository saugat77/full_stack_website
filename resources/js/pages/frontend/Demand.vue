<script setup>
import axios from "axios";
import { ref, onMounted, onBeforeUnmount  } from "vue";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

// Define the function before using it
const calculateItemsToShow = () => {
    const width = window.innerWidth;
    if (width > 1200) return 4.95;
    if (width > 992) return 3;
    if (width > 768) return 2;
    return 1;
};
const demands = ref({ demands: [] });
const getDemands = () => {
    axios.get("/api/get-demands").then((response) => {
        demands.value = response.data;
        console.log("demands:", demands.value);
    });
};
onMounted(() => {
    getDemands();
});
// Responsive items to show in carousel
const itemsToShow = ref(calculateItemsToShow());

const handleResize = () => {
    itemsToShow.value = calculateItemsToShow();
};

onMounted(() => {
    window.addEventListener("resize", handleResize);
});

onBeforeUnmount(() => {
    window.removeEventListener("resize", handleResize);
});
</script>

<template>
    <div class="mt-1">
        <h1 class="bg-yellow-500 text-white rounded-lg p-2 mb-2 text-center">
            Demands
        </h1>
        <carousel
            :autoplay="2000"
            :items-to-show="itemsToShow"
            :wrap-around="true"
            :transition="500"
        >
            <slide v-for="demand in demands" :key="demand.id">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative h-64 w-full">
                        <img
                            class="absolute inset-0 w-full h-full object-cover"
                            :src="demand.image"
                            alt="Card image cap"
                        />
                    </div>
                    <div class="p-4">
                        <h5 class="text-lg text-capitalize font-bold">
                            {{ demand.name }}
                        </h5>
                        <p class="mt-2 text-capitalize text-gray-600">
                            {{ demand.description }}
                        </p>
                        <p class="mt-2 text-gray-600">
                            Salary: {{ demand.salary }}
                        </p>
                        <p class="mt-2 text-capitalize text-gray-600">
                            Country: {{ demand.country }}
                        </p>
                        <p class="mt-2 text-gray-600">
                            Vacancies: {{ demand.number_of_people_needed }}
                        </p>
                    </div>
                    <div class="p-4 bg-gray-100">
                        <small class="text-gray-500">{{
                            demand.updated_at
                        }}</small>
                    </div>
                </div>
            </slide>
            <template #addons>
                <navigation />
                <pagination />
            </template>
        </carousel>
    </div>
</template>
<style scoped>
.carousel__slide {
    padding: 5px;
}

.carousel__viewport {
    perspective: 2000px;
}

.carousel__track {
    transform-style: preserve-3d;
}

.carousel__slide--sliding {
    transition: 0.5s;
}

.carousel__slide {
    opacity: 0.9;
    transform: rotateY(-20deg) scale(0.9);
}

.carousel__slide--active ~ .carousel__slide {
    transform: rotateY(20deg) scale(0.9);
}

.carousel__slide--prev {
    opacity: 1;
    transform: rotateY(-10deg) scale(0.95);
}

.carousel__slide--next {
    opacity: 1;
    transform: rotateY(10deg) scale(0.95);
}

.carousel__slide--active {
    opacity: 1;
    transform: rotateY(0) scale(1.1);
}
</style>
