<script setup>
import { Head, usePage } from "@inertiajs/inertia-vue3";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { computed } from "vue";

import ListClientWorks from '@/Pages/Works/Partials/List.vue';

const client = computed(() => usePage().props.value.client);
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
    <div class="flex flex-col rounded-md shadow-md mt-8">
      <div class="flex justify-between w-full items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
          Trabalhos realizados com o cliente
        </h2>
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
            <DropdownLink :href="route('works.new_work', client)" as="button">
              Adicionar Trabalho
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
      <ListClientWorks :recent="false" :from_client="1" />
    </div>
  </BreezeAuthenticatedLayout>
</template>
