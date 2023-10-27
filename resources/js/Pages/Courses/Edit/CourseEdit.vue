<script setup>
import AppLayout from './../../../Layouts/AppLayout.vue';
import CourseEditForm from './CourseEditForm.vue';

const props = defineProps({
    course: Object
})
</script>


<template>
    <AppLayout title=" Éditer une formation">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Éditer une formation
            </h2>
        </template>
            <CourseEditForm :course="course"/>
    </AppLayout>
</template>
