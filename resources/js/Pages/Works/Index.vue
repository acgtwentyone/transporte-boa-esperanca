<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, usePage, Link } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { computed } from "vue";
import ListWorks from "@/Pages/Works/Partials/List.vue";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Trabalhos realizados
        </h2>
        <Link :href="route('works.create')">
          <div
            class="flex bg-transparent rounded-md px-4 py-2 outline-1 hover:bg-blue-700 hover:border-0 hover:text-white focus:text-white focus:outline-none focus:bg-blue-700 outline-blue-700 border-blue-700 border-2"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 mr-2"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            <span>Adicionar Trabalho</span>
          </div>
        </Link>
      </div>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <h1 class="p-4 text-base">Trabalhos Registrados</h1>
      <ListWorks :recent="false" />
    </div>
  </BreezeAuthenticatedLayout>
</template>
