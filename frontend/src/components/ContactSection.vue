<script setup>
import { reactive, ref } from 'vue'
import { sendContactMessage } from '../api.js'

defineProps({
  profile: { type: Object, required: true },
})

const form = reactive({ name: '', email: '', message: '' })
const status = ref('idle') // idle | sending | sent | error
const errorMessage = ref('')

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
  <section id="contact" class="border-t border-white/10">
    <div class="max-w-content mx-auto px-6 md:px-10 py-20 md:py-28 grid md:grid-cols-2 gap-14">
      <div v-reveal:left="{ delay: 100 }" class="bg-[#0c0d19]/80 p-8 rounded-2xl border border-white/10 backdrop-blur-xl shadow-2xl shadow-purple-950/50 flex flex-col justify-between">
        <div>
          <div v-reveal:up="{ delay: 150 }" class="inline-block border-b-2 border-pink-500 pb-1 mb-4">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-white">Get in Touch</h2>
          </div>
          <p v-reveal:up="{ delay: 200 }" class="text-slate-300 font-medium max-w-sm mb-8">
            Open for collaboration, internships, or discussing design.
          </p>
        </div>
        <div v-reveal:up="{ delay: 250 }" class="flex flex-col gap-3 text-sm font-bold">
          <a :href="`mailto:${profile.email}`" class="underline-link w-fit text-indigo-300 hover:text-white font-semibold">{{ profile.email }}</a>
          <a
            v-for="social in profile.socials"
            :key="social.label"
            :href="social.url"
            target="_blank"
            rel="noopener"
            class="underline-link w-fit text-slate-300 hover:text-pink-400 transition-colors"
          >
            {{ social.label }}
          </a>
        </div>
      </div>

      <form
        v-reveal:right="{ delay: 200 }"
        @submit.prevent="handleSubmit"
        class="flex flex-col gap-6 bg-[#0c0d19]/80 p-8 rounded-2xl border border-white/10 backdrop-blur-xl shadow-2xl shadow-purple-950/50"
      >
        <div v-reveal:up="{ delay: 250 }" class="flex flex-col gap-1.5">
          <label for="name" class="text-sm font-bold text-slate-200">Name</label>
          <input
            id="name"
            v-model="form.name"
            type="text"
            required
            class="field-underline text-white font-semibold"
          />
        </div>
        <div v-reveal:up="{ delay: 300 }" class="flex flex-col gap-1.5">
          <label for="email" class="text-sm font-bold text-slate-200">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            required
            class="field-underline text-white font-semibold"
          />
        </div>
        <div v-reveal:up="{ delay: 350 }" class="flex flex-col gap-1.5">
          <label for="message" class="text-sm font-bold text-slate-200">Message</label>
          <textarea
            id="message"
            v-model="form.message"
            rows="4"
            required
            class="field-underline resize-none text-white font-semibold"
          ></textarea>
        </div>

        <button
          v-reveal:up="{ delay: 400 }"
          type="submit"
          :disabled="status === 'sending'"
          class="bg-gradient-to-r from-indigo-900/90 via-purple-900/90 to-pink-950/90 border border-white/20 text-white font-bold px-8 py-3.5 rounded-full shadow-lg shadow-purple-950/80 hover:from-indigo-800 hover:via-purple-800 hover:to-pink-900 hover:scale-[1.03] active:scale-95 transition-all disabled:opacity-50 cursor-pointer w-fit mt-2 animate-glow"
        >
          {{ status === 'sending' ? 'Sending…' : 'Send Message' }}
        </button>

        <p v-if="status === 'sent'" class="text-sm font-bold text-emerald-400">Thank you! Your message has been sent.</p>
        <p v-if="status === 'error'" class="text-sm font-bold text-rose-400">{{ errorMessage }}</p>
      </form>
    </div>
  </section>
</template>
