<script setup>
import { ref, watch } from "vue";
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';

const props = defineProps({
    eleves: Object,
    filters: Object
})

const search = ref(props.filters.search);

watch(search, value => {
    router.get('/eleves', { search: value }, { preserveState: true, replace: true })
});

const sort = (colonne) => {
    props.filters.column = colonne;
    props.filters.direction = props.filters.direction === 'asc' ? 'desc' : 'asc';
    router.get('/eleves', {column: colonne, direction: props.filters.direction})
}

const selectEleve = (eleve) => {
    console.log(eleve.id)
    router.get('/eleve/'+eleve.id+'/edit')
}

const storeEleve = () => {
    router.get('/eleve/new')
}
</script>
<template>
    <AppLayout>
        <template #header>
            <h2>Élèves</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gradient-to-bl from-fuchsia-600 to-blue-800 rounded-3xl py-6">
                <div v-if="eleves.data.length > 0">
                    <div class="flex justify-between mb-2">
                        <button
                            class="text-white text-xl bg-transparent border-2 m-6 p-2 rounded-full hover:border-4 hover:text-2xl"
                            @click="storeEleve()">Nouvel élève</button>
                        <input v-model="search" type="text" placeholder="Rechercher..." class="border p-2 m-6 rounded-full">
                    </div>
                    <div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3" @click="sort('nom')">Nom</th>
                                    <th scope="col" class="px-6 py-3" @click="sort('prenom')">Prénom</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3"></th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="eleve in eleves.data"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{
                                            eleve.nom }}</td>
                                    <td class="px-6 py-4"> {{ eleve.prenom }}</td>
                                    <td class="px-6 py-4"> {{ eleve.mail }}</td>
                                    <td class="px-6 py-4"><button class="border-2 border-white text-white bg-blue-400 px-6 py-2 rounded-full" @click="selectEleve(eleve)">Edit</button></td>
                                    <td class="px-6 py-4"><button class="border-2 border-white text-white bg-red-400 px-6 py-2 rounded-full">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="mt-6">
                            <!-- Pour chaque lien (si il y en a un on click sinon on a juste un span) -->
                            <template v-for="link in eleves.links">
                                <Link v-if="link.url" :href="link.url" v-html="link.label" class="px-1 text-white" />
                                <span v-else v-html="link.label" class="text-white"></span>
                            </template>
                        </div>
                    </div>

                </div>
                <div class="flex justify-center p-6" v-else>
                    <div class="grid grid-rows-1">
                        <div class="my-2 mx-2">
                            <a class="rounded-full px-4 py-2 mx-80 bg-gradient-to-br from-slate-200 to-teal-500 text-2xl">Vous
                                n'avez enregistré aucun élève !</a>
                        </div>
                        <div class="flex justify-center my-2 mx-2">
                            <button
                                class="border-2 border-zinc-950 rounded-3xl py-2 px-4 bg-gradient-to-br from-slate-200 to-teal-500"
                                @click="storeEleve()">Ajouter un élève</button>
                        </div>
                </div>

            </div>
        </div>
    </div>
</AppLayout></template>