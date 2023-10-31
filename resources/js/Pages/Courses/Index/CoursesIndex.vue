<script setup>
import { ref } from 'vue';
import AppLayout from './../../../Layouts/AppLayout.vue';
import CourseModal from "./CourseModal.vue";
import { Link, router } from '@inertiajs/vue3';

const selectedCourse = ref(null);
const showModal = ref(false);

const selectCourse = (course) => {
    selectedCourse.value = course;
    showModal.value = true;
}

const destroyCourse = (course) => {
    if (confirm("Voulez-vous supprimer cette formation ?")) {
        router.delete(route('course.supprimer', { course: course.id }))
    }
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
                <div class="container my-6 mx-auto">
                    <Link class="px-4 py-4 rounded-full bg-blue-100" :href="route('course.create')">Créer une nouvelle
                    formation</Link>
                </div>
                <div class="bg-blue-200 rounded-3xl">
                    <div class="p-8" v-if="courses.length > 0">
                        <ul class="py-4">
                            <li class="py-6 mx-8 px-6 my-2 bg-white rounded shadow" v-for="course in courses">
                                <div class="hover:font-bold text-3xl text">
                                    <Link :href="route('course.edit', { course: course.id })">{{ course.title }}</Link>
                                </div>
                                <div class="text-sm text-gray-400">Mis en ligne par {{ course.user.name }}, {{
                                    course.episodes_count }} épisodes</div>
                                <div class="text-sm text-slate-700">{{ course.description }}</div>
                                <div class="flex justify-between">
                                    <button id="showModal" @click="selectCourse(course)">Voir les
                                        détails</button>
                                    <button id="deleteCourse" class="text-2xl text-red-600"
                                        @click="destroyCourse(course)">Supprimer</button>
                                </div>
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
        <CourseModal v-if="selectedCourse" :show="showModal" :selectedCourse="selectedCourse" @close="showModal = false" />
    </Teleport>
</template>
