<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import StatisticBox from "@/Components/StatisticBox.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";

import ListClient from "@/Pages/Clients/Partials/List.vue";
import ListWorks from "@/Pages/Works/Partials/List.vue";
import ListInvoices from "@/Pages/Invoices/Partials/List.vue";
import ListFuels from "@/Pages/Fuels/Partials/List.vue";

import { computed } from "vue";

const total_clients = computed(() => usePage().props.value.total_clients);
const total_works = computed(() => usePage().props.value.total_works);
const total_invoices = computed(() => usePage().props.value.total_invoices);
const total_fuels = computed(() => usePage().props.value.total_fuels);
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <div class="block sm:flex sm:flex-wrap">
        <StatisticBox :href="route('clients.index')" class="mb-4 mr-4">
          <template #icon>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
              />
            </svg>
          </template>
          <template #total>
            <span>{{ total_clients }}</span>
          </template>
          <template #title>
            <span>Clientes</span>
          </template>
        </StatisticBox>
        <StatisticBox :href="route('clients.index')" class="mb-4 mr-4">
          <template #icon>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
              />
            </svg>
          </template>
          <template #total>
            <span>{{ total_works }}</span>
          </template>
          <template #title>
            <span>Trabalhos</span>
          </template>
        </StatisticBox>
        <StatisticBox :href="route('invoices.index')" class="mb-4 mr-4">
          <template #icon>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"
              />
              <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
            </svg>
          </template>
          <template #total>
            <span>{{ total_invoices }}</span>
          </template>
          <template #title>
            <span>Faturas</span>
          </template>
        </StatisticBox>
        <StatisticBox :href="route('fuels.index')" class="mb-4 mr-4">
          <template #icon>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                clip-rule="evenodd"
              />
            </svg>
          </template>
          <template #total>
            <span>{{ total_fuels }}</span>
          </template>
          <template #title>
            <span>Combustíveis</span>
          </template>
        </StatisticBox>
      </div>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <div class="flex justify-between items-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight p-4">
          Ultimos Clientes Registrados
        </h1>
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="inline-flex rounded-md cursor-pointer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                />
              </svg>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="route('clients.index')" as="button">
              Ver Todos
            </DropdownLink>
            <DropdownLink :href="route('clients.create')" as="button">
              Adicionar Cliente
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
      <ListClient :hasActions="false" :recent="true" />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
      <div class="flex justify-between items-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight p-4">
          Ultimos Trabalhos Registrados
        </h1>
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="inline-flex rounded-md cursor-pointer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                />
              </svg>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="route('works.index')" as="button">
              Ver Todos
            </DropdownLink>
            <DropdownLink :href="route('works.create')" as="button">
              Adicionar Trabalho
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
      <ListWorks :hasActions="false" :recent="true" />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
      <div class="flex justify-between items-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight p-4">
          Ultimas Faturas Registrados
        </h1>
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="inline-flex rounded-md cursor-pointer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                />
              </svg>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="route('invoices.index')" as="button">
              Ver Todos
            </DropdownLink>
            <DropdownLink :href="route('invoices.create')" as="button">
              Adicionar Fatura
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
      <ListInvoices :hasActions="false" :recent="true" />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
      <div class="flex justify-between items-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight p-4">
          Últimos Combustíveis Registrados
        </h1>
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="inline-flex rounded-md cursor-pointer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                />
              </svg>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="route('fuels.index')" as="button">
              Ver Todos
            </DropdownLink>
            <DropdownLink :href="route('fuels.create')" as="button">
              Adicionar Combustível
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
      <ListFuels :hasActions="false" :recent="true" />
    </div>
  </BreezeAuthenticatedLayout>
</template>
