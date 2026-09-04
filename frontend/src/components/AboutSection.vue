<script setup>
import { computed } from 'vue'

const props = defineProps({
  profile: { type: Object, required: true },
  skills: { type: Array, default: () => [] },
})

const groupedSkills = computed(() => {
  const groups = {}
  for (const skill of props.skills) {
    const category = skill.category || 'Other'
    if (!groups[category]) groups[category] = []
    groups[category].push(skill)
  }
  return groups
})
</script>

<template>
  <section id="about" class="border-t border-white/10">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28 grid md:grid-cols-[minmax(0,1fr)_minmax(0,1.4fr)] gap-12 md:gap-20">
      <div v-reveal:left="{ delay: 100 }">
        <div class="aspect-[4/5] w-full max-w-xs bg-[#0c0d19]/80 rounded-2xl border border-white/15 overflow-hidden shadow-2xl backdrop-blur-xl animate-float">
          <img
            :src="profile.avatar"
            :alt="`Photo of ${profile.name}`"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 "
            onerror="this.style.display='none'"
          />
        </div>
      </div>

      <div v-reveal:right="{ delay: 200 }" class="bg-[#0c0d19]/80 p-8 rounded-2xl border border-white/10 backdrop-blur-xl shadow-2xl shadow-purple-950/50">
        <div v-reveal:up="{ delay: 250 }" class="inline-block border-b-2 border-pink-500 pb-1 mb-6">
          <h2 class="font-display text-3xl md:text-4xl font-bold text-white">About Me</h2>
        </div>
        <p v-reveal:up="{ delay: 300 }" class="font-montserrat font-normal text-slate-300 max-w-xl mb-12 leading-relaxed">{{ profile.bio }}</p>
        <div class="space-y-8">
          <div v-for="(items, category, idx) in groupedSkills" :key="category" v-reveal:up="{ delay: 350 + idx * 100 }">
            <p class="text-xs font-bold text-pink-400 uppercase tracking-wider mb-3">{{ category }}</p>
            <div class="flex flex-wrap gap-2">
              <span
                v-for="skill in items"
                :key="skill.id ?? skill.name"
                class="text-sm font-bold bg-white/10 text-slate-200 border border-white/15 backdrop-blur-sm rounded-full px-4 py-1.5 hover:bg-white/20 hover:text-white hover:border-white/30 hover:scale-105 transition-all cursor-default animate-float"
              >
                {{ skill.name }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
