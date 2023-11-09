<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { reactive } from 'vue';

const props = defineProps({
    selectedUser: Object
})

const form = reactive({
    name: props.selectedUser.name,
    email: props.selectedUser.email,
})
</script>

<template>
    <AppLayout>
        <template #header>Fiche utilisateur : <a class="text-indigo-600 text-2xl font-bold">{{ selectedUser.name
        }}</a></template>
        <div class="py-12">
            <div class="grid grid-cols-2 gap-4 justify-stretch space-x-12 max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 bg-slate-300 rounded-2xl">
                <div class="bg-pink-100">
                    <form>
                        <div class="py-4">
                            <label>Name : </label>
                            <input v-model="form.name" />
                        </div>
                        <div class="py-4">
                            <label>Email : </label>
                            <input v-model="form.email" />
                        </div>
                        <div class="flex justify-end">
                            <PrimaryButton>Submit</PrimaryButton>
                        </div>
                    </form>
                </div>
                <div class="bg-cyan-100">
                    <table>
                        <thead>
                            <tr>
                                <th>Formations suivies :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Formation 1</td>
                                <td><button class="bg-red-300 rounded-2xl px-4 py-2">Ne plus suivre</button></td>
                            </tr>
                            <tr>
                                <td>Formation 2</td>
                                <td><button class="bg-red-300 rounded-2xl px-4 py-2">Ne plus suivre</button></td>
                            </tr>
                            <tr>
                                <td>Formation 3</td>
                                <td><button class="bg-red-300 rounded-2xl px-4 py-2">Ne plus suivre</button></td>
                            </tr>
                        </tbody>    
                    </table>
                </div>
                <div></div>
                <div class="bg-purple-100">
                    <table>
                        <thead>
                            <tr>
                                <th>Ajouter une formation :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Formation 4</td>
                                <td><button class="bg-green-300 rounded-2xl px-4 py-2">Ajouter</button></td>
                            </tr>
                            <tr>
                                <td>Formation 5</td>
                                <td><button class="bg-green-300 rounded-2xl px-4 py-2">Ajouter</button></td>
                            </tr>
                            <tr>
                                <td>Formation 6</td>
                                <td><button class="bg-green-300 rounded-2xl px-4 py-2">Ajouter</button></td>
                            </tr>
                            <tr>
                                <td>Formation 7</td>
                                <td><button class="bg-green-300 rounded-2xl px-4 py-2">Ajouter</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </AppLayout>
</template>