<script setup>
import { usePage, Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

import ConfirmDialog from "@/Components/ConfirmDialog.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
  hasActions: {
    type: Boolean,
    default: true,
  },
  recent: {
    type: Boolean,
    default: false,
  },
});

const items = computed(() => usePage().props.value.invoices);
const data = computed(() =>
  !props.recent
    ? usePage().props.value.invoices.data
    : usePage().props.value.invoices
);
</script>

<template>
  <div class="flex flex-col">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">
            Data da Fatura
          </th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Observação</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Cliente</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">
            Data do Registro
          </th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap" v-if="hasActions">
            <span class="sr-only"></span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="invoice in data"
          :key="invoice.id"
          class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700"
        >
          <th
            scope="row"
            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
          >
            {{ invoice.date }}
          </th>
          <td class="px-6 py-4">{{ invoice.obs }}</td>
          <td class="px-6 py-4">{{ invoice.client }}</td>
          <td class="px-6 py-4">{{ invoice.created_at }}</td>

          <td class="px-6 py-4 text-right" v-if="hasActions">
            <div class="flex justify-end">
              <Link :href="route('invoices.show', invoice)">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 mr-1 text-blue-600"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                  />
                </svg>
              </Link>
              <Link :href="route('invoices.edit', invoice)">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 mr-1 text-blue-700"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                  />
                </svg>
              </Link>
              <ConfirmDialog :confirmUrl="route('invoices.destroy', invoice)">
                <template #trigger>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-red-700 cursor-pointer"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                  </svg>
                </template>
                <template #title> Apagar registro da fatura ? </template>
                <template #content>
                  <span
                    >Não será possivel obter os registros da fatura após
                    realizar esta operação.</span
                  >
                </template>
                <template #confirm>
                  <Link
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                    :href="route('invoices.destroy', invoice)"
                    method="delete"
                    as="button"
                  >
                    Confirmar
                  </Link>
                </template>
              </ConfirmDialog>
              <Link :href="route('invoices.edit', invoice)">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 mr-1 text-blue-700 cursor-pointer"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                    clip-rule="evenodd"
                  />
                </svg>
              </Link>
            </div>
          </td>
        </tr>
        <tr
          class="relative overflow-x-auto shadow-md sm:rounded-lg"
          v-if="items.length === 0"
        >
          <td class="px-6 py-4">Não há faturas registrados!!!</td>
        </tr>
      </tbody>
    </table>
    <pagination :links="items.links" />
  </div>
</template>
