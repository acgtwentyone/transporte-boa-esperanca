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
        Informação de Cliente
      </h2>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <span>Nome: </span>
      <span>Antonio Correia Goncalves </span>
    </div>
  </BreezeAuthenticatedLayout>
</template>
