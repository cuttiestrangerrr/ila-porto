<script setup>
defineProps({
  experiences: { type: Array, default: () => [] },
})
</script>

<template>
  <section id="pengalaman" class="border-t border-line">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28">
      <h2 v-reveal class="font-display text-3xl md:text-4xl mb-16">Pengalaman</h2>

      <div class="relative">
        <div class="absolute left-0 top-2 bottom-2 w-px bg-line hidden sm:block"></div>

        <div class="flex flex-col gap-12">
          <div
            v-for="(item, index) in experiences"
            :key="item.id"
            v-reveal="index * 80"
            class="relative sm:pl-10"
          >
            <span
              class="hidden sm:block absolute left-0 top-1.5 -translate-x-1/2 w-2.5 h-2.5 rounded-full bg-accent"
            ></span>

            <p class="text-sm text-ink-soft mb-2">{{ item.period }}</p>
            <h3 class="font-display text-xl md:text-2xl mb-1">{{ item.title }}</h3>
            <p class="text-sm text-ink-soft mb-3">{{ item.place }}</p>
            <p class="text-ink-soft max-w-xl">{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>