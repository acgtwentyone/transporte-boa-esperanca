<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import StatisticBox from "@/Components/StatisticBox.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";

import ListClient from '@/Pages/Clients/Partials/List.vue';

import {computed} from 'vue';

const total_clients = computed(() => usePage().props.value.total_clients)
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Início</h2>
      <StatisticBox :href="route('clients.index')">
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
          <span>{{total_clients}}</span>
        </template>
        <template #title>
          <span>Clientes</span>
        </template>
      </StatisticBox>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <h1 class="p-4 text-base">Ultimos clientes registrados</h1>
      <ListClient :hasActions="false" :recent="true" />
    </div>
  </BreezeAuthenticatedLayout>
</template>
