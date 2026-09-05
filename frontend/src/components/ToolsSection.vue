<script setup>
import { computed } from 'vue'

const props = defineProps({
  tools: { type: Array, default: () => [] },
})

function getToolIcon(tool) {
  if (tool.icon) return tool.icon
  if (tool.image) return tool.image
  const slug = (tool.name || '').toLowerCase().replace(/[^a-z0-9]/g, '')
  if (slug === 'figma') return '/images/tools/figma.jpg'
  return `/images/tools/${slug}.png`
}

const groupedTools = computed(() => {
  const groups = {}
  for (const tool of props.tools) {
    const category = tool.category || 'Other'
    if (!groups[category]) groups[category] = []
    groups[category].push(tool)
  }
  return groups
})
</script>

<template>
  <section id="tools" class="border-t border-white/10">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28">
      <div v-reveal:up class="inline-block border-b-2 border-pink-500 pb-1 mb-4">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-white">Tools</h2>
      </div>
      <p v-reveal:up="{ delay: 150 }" class="text-slate-300 font-montserrat font-normal max-w-xl mb-12 bg-[#0c0d19]/80 p-5 rounded-xl border border-white/10 backdrop-blur-xl shadow-2xl">
        Applications and software I use daily to design, prototype, and build user interfaces.
      </p>

      <div class="space-y-10">
        <div v-for="(items, category, catIdx) in groupedTools" :key="category" v-reveal:up="{ delay: 200 + catIdx * 100 }">
          <p class="text-xs font-bold text-pink-400 uppercase tracking-wider mb-4">{{ category }}</p>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div
              v-for="(tool, index) in items"
              :key="tool.id ?? tool.name"
              v-reveal:up="{ delay: 250 + index * 60 }"
              class="flex items-center gap-3.5 bg-[#0c0d19]/80 p-4 rounded-xl border border-white/10 backdrop-blur-xl shadow-2xl hover:border-white/25 hover:bg-white/10 hover:scale-[1.03] transition-all cursor-default group"
            >
              <div class="shrink-0 w-10 h-10 rounded-xl bg-white/5 border border-white/15 flex items-center justify-center p-2 group-hover:scale-110 group-hover:border-pink-500/40 transition-all shadow-inner overflow-hidden">
                <img
                  :src="getToolIcon(tool)"
                  :alt="tool.name"
                  class="w-full h-full object-contain"
                />
              </div>
              <span class="text-sm font-bold text-slate-200 group-hover:text-white transition-colors">{{ tool.name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>