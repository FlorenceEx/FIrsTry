<script setup>
import { ref } from 'vue';
import AppLayout from './../../Layouts/AppLayout.vue';
import CourseModal from "./CourseModal.vue";

const selectedCourse = ref(null);

const showModal = ref(false);

const selectCourse = (course) => {
    selectedCourse.value = course;
    showModal.value = true;
}
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
                <div class="bg-blue-200 rounded-3xl">
                    <div class="p-8" v-if="courses.length > 0">
                        <ul class="py-4">
                            <li class="py-6 mx-8 px-6 my-2 bg-white rounded shadow" v-for="course in courses">
                                <div class="hover:font-bold text-3xl text">{{ course.title }}</div>
                                <div class="text-sm text-gray-400">Mis en ligne par {{ course.user.name }}, {{ course.episodes_count }} épisodes</div>
                                <div class="text-sm text-slate-700">{{ course.description }}</div>
                                <button id="showModal" @click="selectCourse(course)">Voir les détails</button>
                                <!-- <div class="bg-sky-600 text-white px-2 py-2 mx-80 my-2 text-center hover:bg-sky-800">Voir la formation</div> -->
                            </li>
                        </ul>
                    </div>
                    <div class="py-6 mx-8 px-6 my-2 bg-white rounded shadow" v-else>
                        Il n'y a aucune formation à afficher.
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
<Teleport to="body">
    <CourseModal :show="showModal" :selectedCourse="selectedCourse" @close= "showModal = false"/>
</Teleport>
</template>
