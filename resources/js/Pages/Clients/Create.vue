<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Registrar Cliente
      </h2>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <h1 class="p-4 text-base">Preencha os campos</h1>
    </div>
  </BreezeAuthenticatedLayout>
</template>
