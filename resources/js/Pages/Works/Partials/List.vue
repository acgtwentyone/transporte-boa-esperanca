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

const items = computed(() => usePage().props.value.works);
const data = computed(() =>
  !props.recent ? usePage().props.value.works.data : usePage().props.value.works
);
</script>

<template>
  <div class="flex flex-col">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Data</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Material</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Lugar</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">
            Valor de Frete
          </th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Pago</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap">Preço</th>
          <th scope="col" class="px-6 py-3 whitespace-nowrap" v-if="hasActions">
            <span class="sr-only"></span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="work in data"
          :key="work.id"
          class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700"
        >
          <th
            scope="row"
            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
          >
            {{ work.date }}
          </th>
          <td class="px-6 py-4 whitespace-nowrap">{{ work.material }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ work.place }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ work.freight_value }}</td>
          <th
            v-if="work.paid"
            scope="row"
            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
          >
            <span class="px-3 py-2 rounded-sm bg-green-500 text-white"
              >Pago</span
            >
          </th>
          <th
            v-else
            scope="row"
            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
          >
            <span class="px-3 py-2 rounded-sm bg-red-500 text-white"
              >Não Pago</span
            >
          </th>
          <td class="px-6 py-4 whitespace-nowrap">{{ work.price }}</td>
          <td class="px-6 py-4 text-right" v-if="hasActions">
            <div class="flex justify-end">
              <Link :href="route('works.show', work)">
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
              <Link
                :href="
                  route('works.edit_work', { work: work })
                "
              >
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
              <ConfirmDialog :confirmUrl="route('works.destroy', work)">
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
                <template #title> Apagar registro ? </template>
                <template #content>
                  <span
                    >Não será possivel accessar este registro após realizar esta
                    operação.</span
                  >
                </template>
                <template #confirm>
                  <Link
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                    :href="route('works.destroy', work)"
                    method="delete"
                    as="button"
                  >
                    Confirmar
                  </Link>
                </template>
              </ConfirmDialog>
            </div>
          </td>
        </tr>
        <tr
          class="relative overflow-x-auto shadow-md sm:rounded-lg"
          v-if="items.length === 0"
        >
          <td class="px-6 py-4">Não há trabalhos registrados!!!</td>
        </tr>
      </tbody>
    </table>
    <pagination :links="items.links" />
  </div>
</template>
