<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import CreateEdit from '@/Pages/Clients/Partials/CreateEdit.vue';

const client = computed(() => usePage().props.value.client);
</script>

<template>
  <CreateEdit :client="client" />
</template>
