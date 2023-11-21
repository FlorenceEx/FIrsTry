<script setup>
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps({
    eleve: Object
})
const form = useForm({
    nom: props.eleve.nom,
    prenom: props.eleve.prenom,
    mail: props.eleve.mail,
})


const submitForm = () => {
    console.log("form submitted !")
    console.log(form.prenom)
    form.post(route("eleveUpdate", {eleve: props.eleve.id}))
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
                    <div class="text-white">
                        <FormSection @submitted="submitForm()">
                            <template #form>
                                <div class="grid grid-rows-1">
                                    <div class="p-2 m-2">
                                        <label class="font-bold">Nom : </label>
                                        <input class="text-black" type="text" v-model="form.nom" />
                                    </div>
                                    <div class="p-2 m-2">
                                        <label class="font-bold">Prenom : </label>
                                        <input class="text-black" type="text" v-model="form.prenom" />
                                    </div>
                                    <div class="p-2 m-2">
                                        <label class="font-bold">Mail : </label>
                                        <input class="text-black" type="text" v-model="form.mail" />
                                    </div>
                                </div>
                            </template>
                            <template #actions>
                                <PrimaryButton>Enregistrer</PrimaryButton>
                            </template>
                        </FormSection>
                    </div>
                    <div class="text-white bg-pink-300">

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>