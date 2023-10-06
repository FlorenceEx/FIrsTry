<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
</script>

<template>
    <AppLayout title="Page de Florence">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $page.props.msg }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <FormSection>
                        <template #title>
                            Mon premier formulaire
                        </template>

                        <template #description>
                            j'ai pas d'idées
                        </template>


                        <template #form>
                            <!-- Token Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full"
                                    autofocus />
                            </div>
                        </template>

                        <template #actions>
                            <PrimaryButton>
                                Créer
                            </PrimaryButton>
                        </template>
                    </FormSection>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
