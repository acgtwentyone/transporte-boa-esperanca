<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import StatisticBox from "@/Components/StatisticBox.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";

import ListClient from "@/Pages/Clients/Partials/List.vue";
import ListWorks from "@/Pages/Works/Partials/List.vue";

import { computed } from "vue";

const total_clients = computed(() => usePage().props.value.total_clients);
const total_works = computed(() => usePage().props.value.total_works);
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <div class="flex flex-wrap">
        <StatisticBox :href="route('clients.index')" class="mr-0 sm:mr-4">
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
        <StatisticBox :href="route('clients.index')" class="mt-4 sm:mt-0">
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
                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"
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
      </div>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <div class="flex justify-between items-center">
        <h1 class="p-4 text-base">Ultimos clientes registrados</h1>
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <div class="flex justify-between items-center">
        <h1 class="p-4 text-base">Ultimos trabalhos registrados</h1>
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
  </BreezeAuthenticatedLayout>
</template>
