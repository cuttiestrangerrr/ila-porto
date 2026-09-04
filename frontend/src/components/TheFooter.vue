<script setup>
defineProps({
  profile: { type: Object, required: true },
})

const year = new Date().getFullYear()
</script>

<template>
  <footer class="border-t border-white/10 bg-[#0c0d19]/80 backdrop-blur-xl">
    <div class="max-w-content mx-auto px-6 md:px-10 py-8 flex flex-col md:flex-row gap-2 md:gap-0 justify-between text-sm font-medium text-slate-400">
      <p>© {{ year }} {{ profile.name }}</p>
      <p>UI/UX Designer Portfolio</p>
    </div>
  </footer>
</template>
