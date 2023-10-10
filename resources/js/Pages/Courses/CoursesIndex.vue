<script setup>
import AppLayout from './../../Layouts/AppLayout.vue';

const props = defineProps({
    courses: Array
})
</script>


<template>
    <AppLayout title=" Page des Formations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des formations
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-8" v-if="courses.length > 0">
                        <ul>
                            <li v-for="course in courses">
                                {{ course.title }}
                            </li>
                        </ul>
                    </div>
                    <div class="p-8" v-else>
                        Il n'y a aucune formation à afficher.
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
