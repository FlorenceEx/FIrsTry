<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps({
    eleve: Object
})
const form = reactive({
    nom: props.eleve.nom,
    prenom: props.eleve.prenom,
    mail: props.eleve.mail,
})

const submitForm = () => {
    console.log("form submitted !")
}
</script>
<template>
    <AppLayout>
        <template #header>
            <h2 class="text-center text-2xl font-bold text-indigo-500">{{ eleve.prenom }} {{ eleve.nom }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gradient-to-bl from-fuchsia-600 to-blue-800 rounded-3xl py-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-white ">
                        <form>
                            <div class="py-4">
                                <label>Nom : </label>
                                <br>
                                <input class="text-black" v-model="form.nom" />
                            </div>
                            <div class="py-4">
                                <label>Prénom : </label>
                                <br>
                                <input class="text-black" v-model="form.prenom" />
                            </div>
                            <div class="py-4">
                                <label>Email : </label>
                                <br>
                                <input class="text-black" v-model="form.mail" />
                            </div>
                            <div class="flex justify-end">
                                <PrimaryButton @click="submitForm()">Submit</PrimaryButton>
                            </div>
                        </form>
                    </div>
                    <div class="text-white bg-pink-300">
                        
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>