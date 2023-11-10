<script setup>
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    nom: "",
    prenom: "",
    naissance: "",
    mail: "",
    password: "secret"

})

const submitForm = () => {
    console.log("form submitted")
    form.post(route("eleveStore"))
}

</script>
<template>
    <AppLayout>
        <template #header>
            <h2>Enregistrer un nouvel élève</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-slate-200 rounded-3xl py-6">
                <FormSection @submitted="submitForm()">
                    <template #title>Titre</template>
                    <template #description>Description blablabla</template>
                    <template #form>
                        <div class="grid grid-rows-1">
                            <div class="bg-pink-100 p-2 m-2">
                                <label>Nom : </label>
                                <input type="text" v-model="form.nom" placeholder="Nom..." />
                            </div>
                            <div class="bg-pink-100 p-2 m-2">
                                <label>Prenom : </label>
                                <input type="text" v-model="form.prenom" placeholder="Prenom..." />
                            </div>
                            <div class="bg-pink-100 p-2 m-2">
                                <label>Naissance : </label>
                                <input type="date" v-model="form.naissance" />
                            </div>
                            <div class="bg-pink-100 p-2 m-2">
                                <label value="Name">Mail : </label>
                                <input type="text" v-model="form.mail" placeholder="mail..." />
                            </div>
                        </div>
                    </template>
                    <template #actions>
                        <PrimaryButton >Enregistrer</PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>
</template>