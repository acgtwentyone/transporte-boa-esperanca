<script setup>
import { ref } from "vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import BreezeSidebarLink from "@/Components/SidebarLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div>
    <div class="min-h-screen bg-blue-800 p-8">
      <div class="flex">
        <div class="w-3/12 min-w-min flex flex-col justify-between">
          <div class="flex flex-col justify-center">
            <Link
              :href="route('admin.dashboard')"
              class="text-xl text-white p-4"
            >
              <span class="hidden sm:block">Transporte Boa Esperança</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-10 w-10 sm:hidden"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                />
              </svg>
            </Link>
            <hr class="m-4 bg-gray-900 h-0.5 w-100 opacity-25" />
            <BreezeSidebarLink
              href="#"
              :active="route().current('admin.clients')"
            >
              <span class="hidden sm:block">Clientes</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 sm:hidden"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                />
              </svg>
            </BreezeSidebarLink>
            <BreezeSidebarLink
              href="#"
              :active="route().current('admin.works')"
            >
              <span class="hidden sm:block">Trabalhos Realizados</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 sm:hidden"
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
            </BreezeSidebarLink>
            <BreezeSidebarLink
              href="#"
              :active="route().current('admin.invoices')"
            >
              <span class="hidden sm:block">Faturas</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 sm:hidden"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"
                />
                <path
                  d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"
                />
              </svg>
            </BreezeSidebarLink>
            <BreezeSidebarLink
              href="#"
              :active="route().current('admin.fuels')"
            >
              <span class="hidden sm:block">Combustíveis</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 sm:hidden"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                  clip-rule="evenodd"
                />
              </svg>
            </BreezeSidebarLink>
          </div>
          <div class="flex p-2">
            <span class="hidden sm:block text-white text-xs">&#169;&nbsp;2022&#174;&nbsp;Transporte Boa Esperança</span>
            <span class="sm:hidden text-white text-xs">&#169;&nbsp;2022&#174;&nbsp;TBE </span>
          </div>
        </div>
        <div class="w-9/12">
          <nav
            class="bg-white overflow-hidden shadow-sm rounded-t-3xl p-6 border-b border-gray-200"
          >
            <!-- Primary Navigation Menu -->
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="flex justify-between h-16">
                <div class="flex">
                  <!-- Logo -->
                  <div class="shrink-0 flex items-center">
                    <Link :href="route('admin.dashboard')">
                      <BreezeApplicationLogo class="block h-9 w-auto" />
                    </Link>
                  </div>

                  <!-- Navigation Links -->
                  <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <BreezeNavLink
                      :href="route('admin.dashboard')"
                      :active="route().current('admin.dashboard')"
                    >
                      Inicio
                    </BreezeNavLink>
                  </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                  <!-- Settings Dropdown -->
                  <div class="ml-3 relative">
                    <BreezeDropdown align="right" width="48">
                      <template #trigger>
                        <span class="inline-flex rounded-md">
                          <button
                            type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                          >
                            {{ $page.props.auth.user.name }}

                            <svg
                              class="ml-2 -mr-0.5 h-4 w-4"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </button>
                        </span>
                      </template>

                      <template #content>
                        <BreezeDropdownLink
                          :href="route('logout')"
                          method="post"
                          as="button"
                        >
                          Sair
                        </BreezeDropdownLink>
                      </template>
                    </BreezeDropdown>
                  </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                  <button
                    @click="
                      showingNavigationDropdown = !showingNavigationDropdown
                    "
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                  >
                    <svg
                      class="h-6 w-6"
                      stroke="currentColor"
                      fill="none"
                      viewBox="0 0 24 24"
                    >
                      <path
                        :class="{
                          hidden: showingNavigationDropdown,
                          'inline-flex': !showingNavigationDropdown,
                        }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                      />
                      <path
                        :class="{
                          hidden: !showingNavigationDropdown,
                          'inline-flex': showingNavigationDropdown,
                        }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
              :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
              }"
              class="sm:hidden"
            >
              <div class="pt-2 pb-3 space-y-1">
                <BreezeResponsiveNavLink
                  :href="route('admin.dashboard')"
                  :active="route().current('admin.dashboard')"
                >
                  Início
                </BreezeResponsiveNavLink>
              </div>

              <!-- Responsive Settings Options -->
              <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                  <div class="font-medium text-base text-gray-800">
                    {{ $page.props.auth.user.name }}
                  </div>
                  <div class="font-medium text-sm text-gray-500">
                    {{ $page.props.auth.user.email }}
                  </div>
                </div>

                <div class="mt-3 space-y-1">
                  <BreezeResponsiveNavLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                  >
                    Sair
                  </BreezeResponsiveNavLink>
                </div>
              </div>
            </div>
          </nav>

          <!-- Page Heading -->
          <header class="bg-white" v-if="$slots.header">
            <div class="py-6 px-4 sm:px-6 lg:px-8">
              <slot name="header" />
            </div>
          </header>

          <!-- Page Content -->
          <main
            class="bg-white overflow-hidden shadow-sm rounded-b-3xl p-6 border-b border-gray-200"
          >
            <slot />
          </main>
        </div>
      </div>
    </div>
  </div>
</template>
