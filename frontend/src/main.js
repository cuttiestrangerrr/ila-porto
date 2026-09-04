import { createApp } from 'vue'
import App from './App.vue'
import './style.css'

const app = createApp(App)

// Custom v-reveal directive with continuous scroll re-trigger support
app.directive('reveal', {
  mounted(el, binding) {
    const variant = binding.arg || 'up'
    const delay = binding.value?.delay || 0

    el.classList.add(`reveal-${variant}`)
    if (delay) {
      el.style.transitionDelay = `${delay}ms`
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            el.classList.add('active')
          } else {
            // Re-trigger animation when scrolling out and back in
            el.classList.remove('active')
          }
        })
      },
      { threshold: 0.1, rootMargin: '0px 0px -20px 0px' }
    )

    observer.observe(el)
  },
})

// Continuous global scroll reveal observer for any element with reveal classes
if (typeof window !== 'undefined') {
  const observeAllRevealElements = () => {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('active')
          } else {
            entry.target.classList.remove('active')
          }
        })
      },
      { threshold: 0.1, rootMargin: '0px 0px -20px 0px' }
    )

    const observeNodes = () => {
      const targetElements = document.querySelectorAll(
        '.reveal, .reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-contact'
      )
      targetElements.forEach((el) => observer.observe(el))
    }

    setTimeout(observeNodes, 150)
  }

  window.addEventListener('DOMContentLoaded', observeAllRevealElements)
}

app.mount('#app')
