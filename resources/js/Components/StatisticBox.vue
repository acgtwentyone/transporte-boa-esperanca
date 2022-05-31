<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
  props.active
    ? "flex w-full min-w-min sm:w-1/3 md:w-1/4 flex-col rounded-md shadow-md p-4 bg-white text-sm font-medium text-black transition  duration-150 ease-in-out"
    : "flex w-full min-w-min sm:w-1/3 md:w-1/4 flex-col rounded-md shadow-md p-4 bg-white text-sm font-medium text-black transition duration-150 ease-in-out"
);
</script>

<template>
  <Link :href="href" :class="classes">
    <div class="flex w-full justify-between">
      <slot name="icon" />
      <slot name="total" />
    </div>
    <div v-if="$slots.title" class="mt-5"><slot name="title" /></div>
  </Link>
</template>
