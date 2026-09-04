<script setup>
defineProps({
  experiences: { type: Array, default: () => [] },
})
</script>

<template>
  <section id="experience" class="border-t border-white/10">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28">
      <div v-reveal:up class="inline-block border-b-2 border-pink-500 pb-1 mb-16">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-white">Experience</h2>
      </div>

      <div class="relative space-y-8 pl-8 sm:pl-12">
        <!-- Continuous Timeline Line -->
        <div class="absolute left-2.5 sm:left-4 top-3 bottom-3 w-0.5 bg-gradient-to-b from-pink-500/60 via-purple-500/40 to-transparent"></div>

        <div
          v-for="(item, index) in experiences"
          :key="item.id ?? index"
          v-reveal:up="{ delay: 100 + index * 100 }"
          class="relative group"
        >
          <!-- Timeline Glowing Dot -->
          <div class="absolute -left-[27px] sm:-left-[37px] top-6 w-3.5 h-3.5 rounded-full bg-pink-500 border-2 border-[#0c0d19] shadow-[0_0_12px_rgba(236,72,153,0.8)] group-hover:scale-125 group-hover:bg-purple-400 transition-all duration-300"></div>

          <!-- Glassmorphism Card Container -->
          <div class="bg-[#0c0d19]/80 p-6 md:p-8 rounded-2xl border border-white/10 backdrop-blur-xl shadow-2xl shadow-purple-950/50 hover:border-white/20 transition-all">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
              <span class="text-xs font-bold text-pink-400 uppercase tracking-wider bg-pink-500/10 border border-pink-500/20 px-3.5 py-1 rounded-full">
                {{ item.period }}
              </span>
              <span class="text-xs font-semibold text-slate-300/80 bg-white/5 border border-white/10 px-3 py-1 rounded-lg flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ item.place }}
              </span>
            </div>

            <h3 class="font-display text-xl md:text-2xl font-bold text-white mb-3 group-hover:text-purple-300 transition-colors">
              {{ item.title }}
            </h3>

            <p class="font-montserrat font-normal text-slate-300 leading-relaxed text-sm md:text-base">
              {{ item.description }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>