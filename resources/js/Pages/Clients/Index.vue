<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Clientes
      </h2>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <h1 class="p-4 text-base">Clientes Registrados</h1>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Nome</th>
            <th scope="col" class="px-6 py-3">Morada</th>
            <th scope="col" class="px-6 py-3">Telefone</th>
            <th scope="col" class="px-6 py-3">
              <span class="sr-only"></span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="client in $page.props.clients"
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
            <td class="px-6 py-4 text-right">
              <div class="flex justify-end">
                <a
                  href="#"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline pr-1"
                  ><svg
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
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    /></svg
                ></a>
                <a
                  href="#"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  ><svg
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
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                    /></svg
                ></a>
                <a
                  href="#"
                  class="font-medium text-red-600 dark:text-red-500 hover:underline pr-1"
                  ><svg
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
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    /></svg
                ></a>
              </div>
            </td>
          </tr>
          <tr
            class="relative overflow-x-auto shadow-md sm:rounded-lg"
            v-if="$page.props.clients.length === 0"
          >
            <td class="px-6 py-4">Não há clientes registrados!!!</td>
          </tr>
        </tbody>
      </table>
      <!-- <pagination :links="$page.props.clients.links" /> -->
    </div>
  </BreezeAuthenticatedLayout>
</template>
