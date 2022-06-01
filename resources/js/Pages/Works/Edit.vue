<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import CreateEdit from '@/Pages/Works/Partials/CreateEdit.vue';

const work = computed(() => usePage().props.value.work);
const from_client = computed(() => usePage().props.value.from_client);
</script>

<template>
  <CreateEdit :work="work" :from_client="from_client"  />
</template>
