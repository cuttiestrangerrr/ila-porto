<script setup>
import ProjectCard from './ProjectCard.vue'

defineProps({
  projects: { type: Array, default: () => [] },
})
</script>

<template>
  <section id="projects" class="border-t border-white/10">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28">
      <div v-reveal:up class="inline-block border-b-2 border-pink-500 pb-1 mb-4">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-white">Projects</h2>
      </div>
      <p v-reveal:up="{ delay: 150 }" class="text-slate-300 font-montserrat font-normal max-w-xl mb-16 bg-[#0c0d19]/80 p-5 rounded-xl border border-white/10 backdrop-blur-xl shadow-2xl">
       The following collection of projects represents coursework completed through a comprehensive process, from user research to implementation ready interface design.
      </p>

      <div>
        <ProjectCard
          v-for="(project, index) in projects"
          :key="project.id ?? project.slug"
          :project="project"
          :reverse="index % 2 === 1"
        />
      </div>
    </div>
  </section>
</template>
