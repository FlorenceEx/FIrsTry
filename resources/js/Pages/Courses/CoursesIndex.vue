<script setup>
import { ref } from 'vue';
import AppLayout from './../../Layouts/AppLayout.vue';

const props = defineProps({
    courses: Array
})

const components = {
    AppLayout
};

const message = ref('Liste des formations');
const sousMessage = ref('Bienvenue dans ton appli :)')
</script>


<template>
    <AppLayout title="Page des formations">
         <!-- en-tête -->
        <template #header>
            <h1 id="h1">{{ message }}</h1>
            <h2 id="h2">{{ sousMessage }} </h2>
        </template>
        <div class="px-8" v-if="courses.length > 0">
            Vos formations :
            <ul>
                <li v-for="course in courses">
                    {{ course.title }}
                </li>
            </ul>
            
        </div>
    </AppLayout>
</template>



<style scoped>
#h1 {
    font-size: 60px;
    text-align: center;
    color: blueviolet;
}
#h2 {
    font-size: 30px;
    text-align: center;
    color: orchid;
}
</style>