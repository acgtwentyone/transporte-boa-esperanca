<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import CreateEdit from '@/Pages/Works/Partials/CreateEdit.vue';

const work = computed(() => usePage().props.value.work);
</script>

<template>
  <CreateEdit :work="work" />
</template>
