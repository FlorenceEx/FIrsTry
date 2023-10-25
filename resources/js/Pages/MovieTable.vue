<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Films">
        <template #header>
            <h2
                class="font-bold text-transparent text-4xl bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-500 text-center">
                Films
            </h2>
        </template>
        <div class="py-12 bg-pink-500">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-pink-300">
                <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                        <tr>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Titre</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Réalisateur</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Synopsis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                Pulp Fiction</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                Quentin Tarantino</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                L'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers
                                trois histoires qui s'entremêlent. Dans un restaurant, un couple de jeunes braqueurs,
                                Pumpkin et Yolanda, discutent des risques que comporte leur activité. Deux truands, Jules
                                Winnfield et son ami Vincent Vega, qui revient d'Amsterdam, ont pour mission de récupérer
                                une mallette au contenu mystérieux et de la rapporter à Marsellus Wallace.</td>
                        </tr>
                        <tr>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                Le cinquième élément</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                Luc Besson</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-600">
                                Egypte, 1914. Des extraterrestres récupèrent quatre pierres magiques, symboles des quatre
                                éléments, jadis confiées à des prêtres. Avant de partir, les extraterrestres promettent que
                                dans 300 ans, ils rapporteront les précieux cailloux. Au XXIIIe siècle, alors qu'ils font
                                route vers la Terre, ils sont anéantis par la planète du Mal. Les habitants de ce monde
                                maléfique, les Mangalores, s'emparent des pierres et foncent vers la Terre.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>