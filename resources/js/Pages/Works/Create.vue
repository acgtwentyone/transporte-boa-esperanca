<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

import CreateEdit from '@/Pages/Works/Partials/CreateEdit.vue';

const errors = computed(() => usePage().props.value.errors);
const client = computed(() => usePage().props.value.client);
const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
  <CreateEdit :client="client" :from_client="true"/>
</template>
