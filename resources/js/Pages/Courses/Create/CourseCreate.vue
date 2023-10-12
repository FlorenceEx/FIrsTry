<script setup>
import AppLayout from './../../../Layouts/AppLayout.vue';
import CourseCreateForm from './CourseCreateForm.vue';
</script>


<template>
    <AppLayout title=" Créer une formation">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer une formation
            </h2>
        </template>
            <CourseCreateForm/>
    </AppLayout>
</template>
