<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const client = computed(() => usePage().props.value.client);

console.log(client);
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informação de Cliente
      </h2>
    </template>

    <div class="flex flex-col">
      <div class="block rounded-md p-4 shadow-md">
        <div class="p-1">
          <span class="font-bold">Nome: </span><span>{{ client.name }}</span>
        </div>
        <div class="p-1">
          <span class="font-bold">Endereco: </span><span>{{ client.address }}</span>
        </div>
        <div class="p-1">
          <span class="font-bold">Telefone: </span><span>{{ client.phone }}</span>
        </div>
        <div class="p-1">
          <span class="font-bold">Data do Registro: </span><span>{{ client.created_at }}</span>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
