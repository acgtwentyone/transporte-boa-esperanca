<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, usePage, Link } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { computed } from "vue";
import ListWorks from "@/Pages/Works/Partials/List.vue";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Trabalhos realizados
        </h2>
      </div>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <h1 class="p-4 text-base">Trabalhos Registrados</h1>
      <ListWorks :recent="false" :from_client="false" />
    </div>
  </BreezeAuthenticatedLayout>
</template>
