<script setup>
import AppLayout from './../../../Layouts/AppLayout.vue';
import CourseDeleteForm from './CourseDeleteForm.vue';

const props = defineProps({
    course: Object
})
</script>


<template>
    <AppLayout title=" Supprimer une formation">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Supprimer une formation
            </h2>
        </template>
        <CourseDeleteForm :course="course"></CourseDeleteForm>
    </AppLayout>
</template>