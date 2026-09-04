<script setup>
defineProps({
  name: { type: String, required: false },
})
</script>

<template>
  <span class="font-bold text-white">{{ name }}</span>
</template>
