<script setup>
import { ref, onMounted } from 'vue'
import { getPortfolio } from './api.js'
import { fallbackExperience, fallbackTools } from './data/fallback.js'
import TheNav from './components/TheNav.vue'
import HeroSection from './components/HeroSection.vue'
import AboutSection from './components/AboutSection.vue'
import ExperienceSection from './components/ExperienceSection.vue'
import ToolsSection from './components/ToolsSection.vue'
import ProjectsSection from './components/ProjectsSection.vue'
import ContactSection from './components/ContactSection.vue'
import TheFooter from './components/TheFooter.vue'

const profile = ref(null)
const skills = ref([])
const projects = ref([])
const loading = ref(true)
const experience = ref(fallbackExperience)
const tools = ref(fallbackTools)

onMounted(async () => {
  const data = await getPortfolio()
  profile.value = data.profile
  skills.value = data.skills
  projects.value = data.projects
  loading.value = false
})
</script>

<template>
  <div class="min-h-screen text-white font-body">
    <template v-if="!loading && profile">
      <TheNav :name="profile.name" />
      <main>
        <HeroSection :profile="profile" />
        <AboutSection :profile="profile" :skills="skills" />
        <ExperienceSection :experiences="experience" />
        <ToolsSection :tools="tools" />
        <ProjectsSection :projects="projects" />
        <ContactSection :profile="profile" />
      </main>
      <TheFooter :profile="profile" />
    </template>
    <div v-else class="min-h-screen flex items-center justify-center">
      <p class="text-slate-300 font-body text-sm">Loading…</p>
    </div>
  </div>
</template>