import { fallbackProfile, fallbackSkills, fallbackProjects } from './data/fallback.js'

const BASE_URL = import.meta.env.VITE_API_URL || 'http://localhost:8000/api'

async function safeFetch(path, fallbackValue) {
  try {
    const res = await fetch(`${BASE_URL}${path}`)
    if (!res.ok) throw new Error(`Request gagal: ${res.status}`)
    return await res.json()
  } catch (err) {
    console.warn(`[api] gagal ambil ${path}, memakai data cadangan.`, err.message)
    return fallbackValue
  }
}

export function getPortfolio() {
  return Promise.all([
    safeFetch('/profile', fallbackProfile),
    safeFetch('/skills', fallbackSkills),
    safeFetch('/projects', fallbackProjects),
  ]).then(([profile, skills, projects]) => ({ profile, skills, projects }))
}

export async function sendContactMessage(payload) {
  const res = await fetch(`${BASE_URL}/contact`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload),
  })

  const data = await res.json().catch(() => ({}))

  if (!res.ok) {
    const firstError = data?.errors ? Object.values(data.errors)[0]?.[0] : null
    throw new Error(firstError || data?.message || 'Failed to send message.')
  }

  return data
}
