<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const defineProps = ({
   hasActions: {
     type: Boolean,
     default: true
   }
});

const clients = computed(() => usePage().props.value.clients);
</script>

<template>
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead
      class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
    >
      <tr>
        <th scope="col" class="px-6 py-3">Nome</th>
        <th scope="col" class="px-6 py-3">Morada</th>
        <th scope="col" class="px-6 py-3">Telefone</th>
        <th scope="col" class="px-6 py-3" v-if="hasActions">
          <span class="sr-only"></span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="client in clients"
        :key="client.id"
        class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700"
      >
        <th
          scope="row"
          class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
        >
          {{ client.name }}
        </th>
        <td class="px-6 py-4">{{ client.address }}</td>
        <td class="px-6 py-4">{{ client.phone }}</td>
        <td class="px-6 py-4 text-right" v-if="hasActions">
          <div class="flex justify-end">
            <slot name="actions" />
          </div>
        </td>
      </tr>
      <tr
        class="relative overflow-x-auto shadow-md sm:rounded-lg"
        v-if="clients.length === 0"
      >
        <td class="px-6 py-4">Não há clientes registrados!!!</td>
      </tr>
    </tbody>
  </table>
</template>
