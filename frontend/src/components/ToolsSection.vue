<script setup>
import { computed } from 'vue'

const props = defineProps({
  tools: { type: Array, default: () => [] },
})

function initials(name) {
  return name
    .split(' ')
    .map((word) => word[0])
    .slice(0, 2)
    .join('')
    .toUpperCase()
}

const groupedTools = computed(() => {
  const groups = {}
  for (const tool of props.tools) {
    const category = tool.category || 'Lainnya'
    if (!groups[category]) groups[category] = []
    groups[category].push(tool)
  }
  return groups
})
</script>

<template>
  <section id="tools" class="border-t border-line">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28">
      <h2 v-reveal class="font-display text-3xl md:text-4xl mb-4">Tools yang dipakai</h2>
      <p v-reveal class="text-ink-soft max-w-xl mb-16">
        Aplikasi dan software yang biasa saya pakai sehari-hari untuk mendesain dan membangun antarmuka.
      </p>

      <div class="space-y-10">
        <div v-for="(items, category) in groupedTools" :key="category">
          <p class="text-sm text-ink-soft mb-4">{{ category }}</p>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div
              v-for="(tool, index) in items"
              :key="tool.id"
              v-reveal="index * 60"
              class="flex items-center gap-3 border border-line rounded-xl px-4 py-3.5"
            >
              <span
                class="shrink-0 w-9 h-9 rounded-full bg-accent-soft text-accent font-display text-sm flex items-center justify-center"
              >
                {{ initials(tool.name) }}
              </span>
              <span class="text-sm">{{ tool.name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>