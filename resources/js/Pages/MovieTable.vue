<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

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
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Titre</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Réalisateur</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Synopsis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="movie in movies">
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">{{ movie.titre }}</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">{{ movie.realisateur }}</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">{{ movie.synopsis }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>