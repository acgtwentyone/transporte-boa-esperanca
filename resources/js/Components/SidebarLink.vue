<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
  props.active
    ? "flex p-4 rounded-l-2xl hover:rounded-l-2xl active:rounded-l-2xl rounded-l-2xl items-center bg-white hover:bg-white text-sm font-medium leading-5 text-black hover:text-black active:text-black focus:text-black focus:outline-none transition  duration-150 ease-in-out"
    : "flex p-4 rounded-none hover:rounded-l-2xl active:rounded-l-2xl focus-rounded-l-2xl items-center bg-transparent hover:bg-white text-sm font-medium leading-5 text-white hover:text-black active:text-black focus:text-black focus:outline-none transition duration-150 ease-in-out"
);
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
