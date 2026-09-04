<script setup>
import { computed } from 'vue'

const props = defineProps({
  name: { type: String, required: true },
})

const initials = computed(() => {
  if (!props.name) return 'AM'
  const parts = props.name.trim().split(' ')
  if (parts.length >= 2) return (parts[0][0] + parts[1][0]).toUpperCase()
  return props.name.substring(0, 2).toUpperCase()
})

const links = [
  { label: 'About', href: '#about' },
  { label: 'Experience', href: '#experience' },
  { label: 'Tools', href: '#tools' },
  { label: 'Projects', href: '#projects' },
]
</script>

<template>
  <header class="sticky top-4 z-50 px-4 md:px-8">
    <div class="max-w-6xl mx-auto bg-[#0c0d19]/75 backdrop-blur-2xl border border-white/10 rounded-2xl px-5 py-3 flex items-center justify-between shadow-[0_10px_40px_rgba(68,28,153,0.35)] transition-all duration-300">
      <!-- 1. Brand Logo & Initials -->
      <a href="#" class="flex items-center gap-3 group">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 p-[1.5px] shadow-md shadow-indigo-500/20 group-hover:scale-105 transition-transform">
          <div class="w-full h-full bg-[#0c0d19] rounded-[10.5px] flex items-center justify-center font-display font-extrabold text-xs tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-pink-400">
            {{ initials }}
          </div>
        </div>
        <span class="font-display font-bold text-sm md:text-base tracking-tight gradient-name hidden sm:inline-block">
          {{ name }}
        </span>
      </a>

      <!-- 2. Nav Links with Hover Pill -->
      <nav class="flex items-center gap-1 md:gap-2 bg-white/5 p-1 rounded-xl border border-white/5">
        <a
          v-for="link in links"
          :key="link.href"
          :href="link.href"
          class="px-3.5 py-1.5 rounded-lg text-xs md:text-sm font-medium text-slate-300 hover:text-white hover:bg-white/10 transition-all duration-200"
        >
          {{ link.label }}
        </a>
      </nav>

      <!-- 3. Quick Action CTA Button -->
      <a
        href="#contact"
        class="hidden sm:inline-flex items-center justify-center gap-2 text-xs md:text-sm font-semibold px-4 py-2 rounded-xl bg-gradient-to-r from-indigo-900/90 via-purple-900/90 to-pink-950/90 border border-white/15 text-white shadow-lg shadow-purple-950/60 hover:from-indigo-800 hover:via-purple-800 hover:to-pink-900 hover:scale-[1.03] active:scale-95 transition-all"
      >
        <span>Contact</span>
      </a>
    </div>
  </header>
</template>
