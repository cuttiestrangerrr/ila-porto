/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js}'],
  theme: {
    extend: {
      colors: {
        ink: '#004EF5',
        'ink-soft': '#FF0004',
        accent: '#004EF5',
        'accent-red': '#FF0004',
        'accent-soft': 'rgba(0, 78, 245, 0.12)',
        'accent-red-soft': 'rgba(255, 0, 4, 0.12)',
        line: 'rgba(0, 78, 245, 0.2)',
        galaxy: {
          dark: '#1C0942',
          base: '#441C99',
          light: '#6B21A8',
          glow: '#A855F7',
        },
      },
      fontFamily: {
        display: ['"Times New Roman"', 'Times', 'serif'],
        montserrat: ['"Montserrat"', 'sans-serif'],
        body: ['"Montserrat"', '"Times New Roman"', 'Times', 'sans-serif'],
      },
      maxWidth: {
        content: '72rem',
      },
    },
  },
  plugins: [],
}
