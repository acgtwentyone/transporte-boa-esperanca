<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

import CreateEdit from '@/Pages/Clients/Partials/CreateEdit.vue';

const errors = computed(() => usePage().props.value.errors);
const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
  <CreateEdit />
</template>
