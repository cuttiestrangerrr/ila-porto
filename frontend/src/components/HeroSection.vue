<script setup>
defineProps({
  profile: { type: Object, required: true },
})
</script>

<template>
  <section class="max-w-content mx-auto px-6 md:px-10 pt-16 pb-20 md:pt-24 md:pb-28 text-center flex flex-col items-center justify-center">
    <!-- 2. Giant Centered Name Typography (Uniform Color) -->
    <div v-reveal:up="{ delay: 150 }" class="max-w-4xl mx-auto mb-6">
      <h1 class="font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold tracking-tight gradient-name leading-tight drop-shadow-[0_10px_35px_rgba(0,180,255,0.2)]">
        {{ profile.name }}
      </h1>
    </div>

    <!-- 3. Subheading Role (ALL-CAPS TRACKING-WIDE) -->
    <h2
      v-reveal:up="{ delay: 250 }"
      class="text-xs md:text-sm font-bold uppercase tracking-[0.25em] text-slate-300 mt-2 mb-6"
    >
      {{ profile.role }} — {{ profile.location }}
    </h2>

    <!-- 4. Bio Description -->
    <p
      v-reveal:up="{ delay: 350 }"
      class="font-montserrat font-normal max-w-xl mx-auto text-slate-300 text-sm md:text-base leading-relaxed text-center mb-10"
    >
      {{ profile.bio }}
    </p>

    <!-- 6. Centered Social Links -->
    <div
      v-reveal:up="{ delay: 550 }"
      class="flex items-center justify-center gap-3 text-slate-300"
    >
      <a
        v-for="social in profile.socials"
        :key="social.label"
        :href="social.url"
        target="_blank"
        rel="noopener"
        class="w-40 h-8 rounded-full border border-white/15 bg-black/5 flex items-center justify-center text-xs font-bold hover:border-white/40 hover:text-white hover:bg-white/15 transition-all"
        :title="social.label"
      >
        {{ social.label}}
      </a>
    </div>
    <div class="fade-in-up-delay-2 mt-10 flex flex-wrap items-center">
      <a :href="`mailto:${profile.email}`" class="underline-link text-pink-400">
        {{ profile.email }}
      </a>
    </div>
  </section>
</template>
