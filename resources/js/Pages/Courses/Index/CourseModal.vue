<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { router } from '@inertiajs/vue3';

const saveChange = () => {
  console.log("form submitted")
  router.put(route('course.update', {course: props.selectedCourse.id}))
}

const props = defineProps({
  show: Boolean,
  selectedCourse: Object,
})

</script>

<template>
  <Transition name="modal">
    <div v-if="show" class="modal-mask">
      <div class="container mx-auto my-auto px-8 py-6 bg-slate-50">
        <div class="modal-header">
          <slot name="header">Fiche formation : {{ selectedCourse.title }}</slot>
        </div>

        <div class="modal-body">
          <FormSection @submitted="saveChange()">
            <template #title>
              {{ selectedCourse.title }}
            </template>
            <template #form>
              <div class="col-span-6 sm:col-span-6">
                <InputLabel value="Description" />
                <textarea class="w-full h-auto" v-model="selectedCourse.description"></textarea>
              </div>
            </template>
            <template #actions>
              <PrimaryButton>Enregistrer</PrimaryButton>
            </template>
          </FormSection>
        </div>

        <div class="modal-footer">
          <slot name="footer">
            <button class="modal-default-button" @click="$emit('close')">OK</button>
          </slot>
        </div>
      </div>
    </div>
  </Transition>
</template>

<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  transition: opacity 0.3s ease;
}

.modal-container {
  width: 300px;
  margin: auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}
</style>
