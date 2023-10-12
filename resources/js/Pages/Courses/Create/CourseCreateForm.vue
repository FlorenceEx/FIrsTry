<script setup>
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const submitForm = () => {
    console.log('Form submitted !')
}
const form = useForm({
    title: '',
    description: ''
})
</script>

<template>
        <FormSection @submitted="submitForm()">
            <template #title>
                Créez votre formation
            </template>

            <template #description>
                Description
            </template>

            <template #form>
                <div>
                    <!-- au composant inputlabel on passe un string qu'on appelle Name-->
                    <InputLabel value="Title" />
                    <!-- à InputText on passe un v-model qu'il faut binder à un objet form-->
                    <TextInput v-model="form.title" />
                    <InputLabel value="Description" />
                    <TextInput v-model="form.description" />
                    <InputError :message="form.errors.name" />
                </div>
            </template>

            <template #actions>
                <PrimaryButton>Créer la formation</PrimaryButton>
            </template>
        </FormSection>
</template>