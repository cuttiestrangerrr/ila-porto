<script setup>
import { reactive, ref } from 'vue'
import { sendContactMessage } from '../api.js'

defineProps({
  profile: { type: Object, required: true },
})

const form = reactive({ name: '', email: '', message: '' })
const status = ref('idle') // idle | sending | sent | error
const errorMessage = ref('')

// Interactive 3D Card Tilt & Cursor Spotlight
const transformLeft = ref('perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1,1,1)')
const transformRight = ref('perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1,1,1)')
const spotlightLeft = ref({ x: 50, y: 50, opacity: 0 })
const spotlightRight = ref({ x: 50, y: 50, opacity: 0 })

function handleMouseMove(e, target) {
  const rect = e.currentTarget.getBoundingClientRect()
  const x = e.clientX - rect.left
  const y = e.clientY - rect.top
  const centerX = rect.width / 2
  const centerY = rect.height / 2
  const rotateX = ((y - centerY) / centerY) * -5
  const rotateY = ((x - centerX) / centerX) * 5

  if (target === 'left') {
    transformLeft.value = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.01, 1.01, 1.01)`
    spotlightLeft.value = { x: (x / rect.width) * 100, y: (y / rect.height) * 100, opacity: 1 }
  } else {
    transformRight.value = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.01, 1.01, 1.01)`
    spotlightRight.value = { x: (x / rect.width) * 100, y: (y / rect.height) * 100, opacity: 1 }
  }
}

function handleMouseLeave(target) {
  if (target === 'left') {
    transformLeft.value = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)'
    spotlightLeft.value.opacity = 0
  } else {
    transformRight.value = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)'
    spotlightRight.value.opacity = 0
  }
}

async function handleSubmit() {
  status.value = 'sending'
  errorMessage.value = ''
  try {
    await sendContactMessage({ ...form })
    status.value = 'sent'
    form.name = ''
    form.email = ''
    form.message = ''
  } catch (err) {
    status.value = 'error'
    errorMessage.value = err.message || 'An error occurred, please try again.'
  }
}
</script>

<template>
  <section id="contact" class="border-t border-white/10 relative overflow-hidden">
    <!-- Ambient Floating Background Orbs -->
    <div class="absolute top-1/4 left-10 w-80 h-80 bg-pink-600/15 rounded-full blur-[100px] pointer-events-none animate-contact-orb-1"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-600/15 rounded-full blur-[120px] pointer-events-none animate-contact-orb-2"></div>

    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28 relative z-10">
      <div v-reveal:contact class="text-center max-w-xl mx-auto mb-16">
        <div class="inline-block border-b-2 border-pink-500 pb-1 mb-4">
          <h2 class="font-display text-3xl md:text-5xl font-bold text-white tracking-tight">Get in Touch</h2>
        </div>
        <p class="text-slate-300 font-montserrat font-normal text-base md:text-lg">
          Have a project in mind or want to collaborate? Feel free to reach out anytime!
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-10 md:gap-12 items-stretch">
        <!-- Left Info Card with 3D Tilt & Spotlight -->
        <div
          v-reveal:contact="{ delay: 150 }"
          @mousemove="e => handleMouseMove(e, 'left')"
          @mouseleave="() => handleMouseLeave('left')"
          :style="{ transform: transformLeft }"
          class="relative bg-[#0c0d19]/85 p-8 md:p-10 rounded-3xl border border-white/15 backdrop-blur-2xl shadow-[0_20px_60px_rgba(40,10,70,0.5)] transition-transform duration-200 ease-out flex flex-col justify-between overflow-hidden group"
        >
          <!-- Radial Spotlight Overlay -->
          <div
            class="pointer-events-none absolute -inset-px rounded-3xl transition-opacity duration-300 z-0"
            :style="{
              opacity: spotlightLeft.opacity,
              background: `radial-gradient(500px circle at ${spotlightLeft.x}% ${spotlightLeft.y}%, rgba(236, 72, 153, 0.18), transparent 60%)`
            }"
          />

          <div class="relative z-10">
            <h3 class="font-display text-2xl md:text-3xl font-bold text-white mb-4 leading-tight">
              Let's create something extraordinary together.
            </h3>

            <p class="text-slate-300 font-montserrat text-sm md:text-base leading-relaxed mb-8">
              Whether you need UI/UX design, wireframing, frontend development, or just want to connect, I'm always open to new conversations.
            </p>
          </div>

          <!-- Social Links Grid / List -->
          <div class="relative z-10 flex flex-col gap-3.5">
            <a
              :href="`mailto:${profile.email}`"
              class="flex items-center justify-between bg-white/5 border border-white/10 rounded-xl px-5 py-3.5 hover:border-pink-500/40 hover:bg-pink-500/10 hover:scale-[1.02] transition-all group/item"
            >
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-pink-500/20 text-pink-400 flex items-center justify-center font-bold text-xs">
                  ✉️
                </div>
                <span class="text-xs sm:text-sm font-bold text-white group-hover/item:text-pink-300 transition-colors">{{ profile.email }}</span>
              </div>
              <span class="text-pink-400 group-hover/item:translate-x-1 transition-transform">&rarr;</span>
            </a>

            <div class="grid grid-cols-2 gap-3">
              <a
                v-for="social in profile.socials"
                :key="social.label"
                :href="social.url"
                target="_blank"
                rel="noopener"
                class="flex items-center justify-between bg-white/5 border border-white/10 rounded-xl px-4 py-3 hover:border-purple-500/40 hover:bg-purple-500/10 hover:scale-[1.02] transition-all group/sub"
              >
                <span class="text-xs font-bold text-slate-200 group-hover/sub:text-purple-300 transition-colors">{{ social.label }}</span>
                <span class="text-xs text-purple-400 group-hover/sub:translate-x-0.5 group-hover/sub:-translate-y-0.5 transition-transform">&nearr;</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Form Card with 3D Tilt & Spotlight -->
        <form
          v-reveal:contact="{ delay: 250 }"
          @mousemove="e => handleMouseMove(e, 'right')"
          @mouseleave="() => handleMouseLeave('right')"
          :style="{ transform: transformRight }"
          @submit.prevent="handleSubmit"
          class="relative flex flex-col gap-6 bg-[#0c0d19]/85 p-8 md:p-10 rounded-3xl border border-white/15 backdrop-blur-2xl shadow-[0_20px_60px_rgba(40,10,70,0.5)] transition-transform duration-200 ease-out overflow-hidden group"
        >
          <!-- Radial Spotlight Overlay -->
          <div
            class="pointer-events-none absolute -inset-px rounded-3xl transition-opacity duration-300 z-0"
            :style="{
              opacity: spotlightRight.opacity,
              background: `radial-gradient(500px circle at ${spotlightRight.x}% ${spotlightRight.y}%, rgba(168, 85, 247, 0.18), transparent 60%)`
            }"
          />

          <div class="relative z-10 flex flex-col gap-5">
            <div class="flex flex-col gap-2">
              <label for="name" class="text-xs font-bold text-pink-400 uppercase tracking-wider">Your Name</label>
              <input
                id="name"
                v-model="form.name"
                type="text"
                required
                placeholder="Enter your name"
                class="bg-white/5 border border-white/15 rounded-xl px-4 py-3.5 text-white font-medium text-sm focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 transition-all placeholder-slate-500"
              />
            </div>

            <div class="flex flex-col gap-2">
              <label for="email" class="text-xs font-bold text-pink-400 uppercase tracking-wider">Your Email</label>
              <input
                id="email"
                v-model="form.email"
                type="email"
                required
                placeholder="name@example.com"
                class="bg-white/5 border border-white/15 rounded-xl px-4 py-3.5 text-white font-medium text-sm focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 transition-all placeholder-slate-500"
              />
            </div>

            <div class="flex flex-col gap-2">
              <label for="message" class="text-xs font-bold text-pink-400 uppercase tracking-wider">Message</label>
              <textarea
                id="message"
                v-model="form.message"
                rows="4"
                required
                placeholder="Tell me about your project or idea..."
                class="bg-white/5 border border-white/15 rounded-xl px-4 py-3.5 text-white font-medium text-sm focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 transition-all placeholder-slate-500 resize-none"
              ></textarea>
            </div>

            <button
              type="submit"
              :disabled="status === 'sending'"
              class="relative overflow-hidden bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 border border-white/20 text-white font-bold text-sm px-8 py-4 rounded-xl shadow-xl shadow-purple-950/80 hover:shadow-pink-500/25 hover:scale-[1.02] active:scale-95 transition-all disabled:opacity-50 cursor-pointer flex items-center justify-center gap-3 mt-2 group/btn"
            >
              <span v-if="status === 'sending'" class="flex items-center gap-2">
                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Sending Message…
              </span>
              <span v-else class="flex items-center gap-2">
                Send Message
              </span>
            </button>

            <div v-if="status === 'sent'" class="p-3.5 bg-emerald-500/10 border border-emerald-500/30 rounded-xl text-emerald-400 text-xs font-bold flex items-center gap-2">
              <span>✨</span>
              <span>Thank you! Your message has been sent successfully.</span>
            </div>

            <div v-if="status === 'error'" class="p-3.5 bg-rose-500/10 border border-rose-500/30 rounded-xl text-rose-400 text-xs font-bold flex items-center gap-2">
              <span>⚠️</span>
              <span>{{ errorMessage }}</span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

