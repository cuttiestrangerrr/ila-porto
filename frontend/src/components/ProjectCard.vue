<script setup>
defineProps({
  project: { type: Object, required: true },
  reverse: { type: Boolean, default: false },
})
</script>

<template>
  <article
    class="grid md:grid-cols-2 gap-8 md:gap-14 items-center py-12 border-b border-white/10 last:border-b-0"
  >
    <div
      v-reveal:[reverse?'right':'left']
      class="aspect-[4/3] bg-[#0c0d19]/80 border border-white/15 rounded-2xl overflow-hidden shadow-2xl hover:border-pink-500/50 transition-all backdrop-blur-xl animate-glow"
      :class="reverse ? 'md:order-2' : 'md:order-1'"
    >
      <img
        :src="project.cover_image"
        :alt="project.title"
        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
        onerror="this.style.display='none'"
      />
    </div>

    <div v-reveal:[reverse?'left':'right'] :class="reverse ? 'md:order-1' : 'md:order-2'" class="bg-[#0c0d19]/80 p-6 md:p-8 rounded-2xl border border-white/10 backdrop-blur-xl shadow-2xl shadow-purple-950/50">
      <div class="flex items-center gap-2 mb-2">
        <p class="text-xs font-bold text-pink-400 uppercase tracking-wider">{{ project.role }}</p>
      </div>

      <h3 class="font-display text-2xl md:text-[1.7rem] font-bold text-white mb-3 hover:text-purple-300 transition-colors">
        {{ project.title }}
      </h3>
      <p class="font-montserrat font-normal text-slate-300 mb-5 leading-relaxed">{{ project.summary }}</p>

      <div class="flex flex-wrap gap-2 mb-6">
        <span
          v-for="tool in project.tools"
          :key="tool"
          class="text-xs text-slate-200 font-semibold bg-white/10 border border-white/15 backdrop-blur-sm rounded-full px-3.5 py-1"
        >
          {{ tool }}
        </span>
      </div>

      <a
        v-if="project.project_url"
        :href="project.project_url"
        target="_blank"
        rel="noopener"
        class="inline-flex items-center gap-2 text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors group"
      >
        Visit Project <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
      </a>
    </div>
  </article>
</template>
