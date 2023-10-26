<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';
import FormSection from '@/Components/FormSection.vue';

const showModal = ref(false);
const selectedMovie = ref(null);
const selectMovie = (movie) => {
    selectedMovie.value = movie;
    showModal.value = true;
}
const props = defineProps({
    movies: Array,
})
</script>

<template>
    <AppLayout title="Films">
        <template #header>
            <h2
                class="font-bold text-transparent text-4xl bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-500 text-center">
                Films
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-indigo-300 rounded-3xl">
                <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                        <tr>
                            <th
                                class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Titre</th>
                            <th
                                class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Réalisateur</th>
                            <th
                                class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Synopsis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="movie in movies">
                            <td
                                @click="selectMovie(movie)"
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                {{ movie.titre }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                {{ movie.realisateur }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                {{ movie.synopsis }}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        <Modal :show="showModal" @close="showModal = false">
<FormSection>
    <template #title>
            {{selectedMovie.titre}}
        </template>
        
        <template #description>
            A movie from {{ selectedMovie.realisateur }}
        </template>

        <template #form>
            <div class="col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Synopsis</label>
                <input :value="selectedMovie.synopsis" type="text" id="name" name="name" class="mt-1 p-2 w-full">
            </div>
        </template>
</FormSection>
        </Modal>
</AppLayout></template>