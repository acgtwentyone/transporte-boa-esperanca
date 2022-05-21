<script setup>
defineProps(["message"]);
</script>

<template>
  <p class="text-sm text-red-600" v-show="message">
    {{ message }}
  </p>
</template>
