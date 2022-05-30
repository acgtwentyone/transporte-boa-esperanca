<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const client = computed(() => usePage().props.value.client);
const works = computed(() => usePage().props.value.works);
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
          <span class="font-bold">Nome: </span
          ><span class="text-gray-700">{{ client.name }}</span>
        </div>
        <div class="p-1">
          <span class="font-bold">Endereco: </span
          ><span class="text-gray-700">{{ client.address }}</span>
        </div>
        <div class="p-1">
          <span class="font-bold">Telefone: </span
          ><span class="text-gray-700">{{ client.phone }}</span>
        </div>
        <div class="p-1">
          <span class="font-bold">Data do Registro: </span
          ><span class="text-gray-700">{{ client.created_at }}</span>
        </div>
      </div>
    </div>
    <div class="flex flex-col rounded-md shadow-md mt-10">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
        Trabalhos realizados com o cliente
      </h2>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Data</th>
            <th scope="col" class="px-6 py-3">Material</th>
            <th scope="col" class="px-6 py-3">Lugar</th>
            <th scope="col" class="px-6 py-3">Valor de Frete</th>
            <th scope="col" class="px-6 py-3">Pago</th>
            <th scope="col" class="px-6 py-3">Valor Dívida</th>
            <th scope="col" class="px-6 py-3">Data da Dívida</th>
            <th scope="col" class="px-6 py-3">Data do Registro</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="work in works"
            :key="work.id"
            class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
            >
              {{ work.date }}
            </th>
            <td class="px-6 py-4">{{ work.material }}</td>
            <td class="px-6 py-4">{{ work.place }}</td>
            <td class="px-6 py-4">{{ work.freight_value }}</td>
            <td class="px-6 py-4">{{ work.paid }}</td>
            <td class="px-6 py-4">{{ work.debt_value }}</td>
            <td class="px-6 py-4">{{ work.debt_date }}</td>
            <td class="px-6 py-4">{{ work.created_at }}</td>
          </tr>
          <tr
            class="relative overflow-x-auto shadow-md sm:rounded-lg"
            v-if="works.length === 0"
          >
            <td class="px-6 py-4">
              Não há trabalhos realizados com este cliente!!!
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </BreezeAuthenticatedLayout>
</template>
