<script setup>
import { reactive, ref, watch } from "vue";
import AppLayout from "./../../Layouts/AppLayout.vue"
import { Link } from "@inertiajs/vue3"
import { router } from "@inertiajs/vue3";

const search = ref(props.filters.search);

watch(search, value => {
    router.get('/users', {search: value}, {preserveState: true, replace: true})
});

const sort = (colonne) => {
    props.filters.column = colonne;
    console.log(props.filters.column)
    props.filters.direction = props.filters.direction === 'asc' ? 'desc' : 'asc';
    console.log(props.filters.direction)
    router.get('/users', {column: colonne, direction: props.filters.direction})
}


const props = defineProps({
    users: Object,
    filters: Object
})

const userFilters = reactive({
    column: props.filters.column,
    direction: props.filters.direction,
})

</script>
<template>
    <AppLayout>
        <template #header>
            <h2 class="font-extrabold text-transparent text-4xl bg-clip-text bg-gradient-to-r from-lime-500 to-emerald-500">
                Ryoba Shinohara</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-slate-300">
                <div class="bg-gradient-to-r from-lime-300 to-emerald-800">
                    <div v-if="users.data.length > 0">
                        <div class="flex justify-between mb-2">
                            <label>
                                Show
                                <select>
                                    <option value="10">10</option>
                                    <option value="10">15</option>
                                    <option value="10">20</option>
                                    <option value="10">25</option>
                                </select>
                                entries
                            </label>
                            <input v-model="search" type="text" placeholder="Rechercher..." class="border px-2 rounded-full" >
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3" @click="sort('name')">Nom</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Edit</th>
                                    <th scope="col" class="px-6 py-3">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users.data"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-lg">
                                        {{ user.name }}</th>
                                    <td class="px-6 py-4">{{ user.email }}</td>
                                    <td class="px-6 py-4">Edit</td>
                                    <td class="px-6 py-4">Delete</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="mt-6">
                            <!-- Pour chaque lien (si il y en a un on click sinon on a juste un span) -->
                            <template v-for="link in users.links">
                                <Link v-if="link.url" :href="link.url" v-html="link.label" class="px-1"/>
                                <span v-else v-html="link.label" class="text-slate-600"></span>
                            </template>

                        </div>
                    </div>
                    <div v-else>
                        Aucun étudiant enregistré !
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>