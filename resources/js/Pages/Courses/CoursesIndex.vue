<template>
    <AppLayout title="Page des formations">
         <!-- en-tête -->
        <template #header>
            <h1 id="h1">{{ message }}</h1>
            <h2 id="h2">{{ sousMessage }} </h2>
        </template>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import AppLayout from './../../Layouts/AppLayout.vue';

const components = {
    AppLayout
};

const message = ref('Salut Flo !');
const sousMessage = ref('Bienvenue dans ton appli :)')
</script>

<style scoped>
#h1 {
    font-size: 60px;
    text-align: center;
    color: blueviolet;
}
#h2 {
    font-size: 30px;
    text-align: center;
    color: orchid;
}
</style>