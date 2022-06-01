<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const work = computed(() => usePage().props.value.work);
const client = computed(() => usePage().props.value.client);
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informação do Trabalho
      </h2>
    </template>

    <div class="flex flex-col">
      <div class="block rounded-md p-4 shadow-md">
        <div class="rounded:md shadow-md p-4">
          <div class="p-1">
            <span class="font-bold">Cliente: </span
            ><span class="text-gray-700">{{ client.name }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Morada do Cliente: </span
            ><span class="text-gray-700">{{ client.address }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Telefone do Cliente: </span
            ><span class="text-gray-700">{{ client.phone }}</span>
          </div>
        </div>
        <div class="rounded:md shadow-md p-4 mt-5">
          <div class="p-1">
            <span class="font-bold">Data: </span
            ><span class="text-gray-700">{{ work.date }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Material: </span
            ><span class="text-gray-700">{{ work.material }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Preço: </span
            ><span class="text-gray-700">{{ work.price }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Valor de Frete: </span
            ><span class="text-gray-700">{{ work.freight_value }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Lugar: </span
            ><span class="text-gray-700">{{ work.place }}</span>
          </div>
          <div class="p-1">
            <span class="font-bold">Data do Registro: </span
            ><span class="text-gray-700">{{ work.created_at }}</span>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
