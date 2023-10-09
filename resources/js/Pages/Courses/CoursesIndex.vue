<template>
    <div>
        <h1 id="h1">{{ message }}</h1>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const message = ref('Salut Flo !');
</script>

<style scoped>
#h1{
    font-size: 60px;
    text-align: center;
    color:blueviolet;
}
</style>