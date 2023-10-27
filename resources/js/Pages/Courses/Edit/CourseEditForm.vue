<script setup>
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    course: Object
})

const submitForm = () => {
    console.log('Form submitted !')

    form.put(route('course.update', {course: props.course.id}), {
        //empêche de revenir en haut de la page au rechargement
        preserveScroll: true
    })
}

const form = useForm({
    title: props.course.title,
    description: props.course.description
})
</script>

<template>
        <FormSection @submitted="submitForm()">
            <template #title>
                Éditez votre formation
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
                <PrimaryButton>Mettre à jour la formation</PrimaryButton>
            </template>
        </FormSection>
</template>