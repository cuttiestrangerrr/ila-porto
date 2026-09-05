export const fallbackProfile = {
  name: 'Anabila Maharani Sutomo',
  role: 'UI/UX Designer',
  tagline: 'Crafting clear, intuitive, and user-friendly interfaces.',
  bio: 'University student passionate about UI/UX Design and Frontend Web Development. The projects below were developed as coursework through a systematic process: user research, wireframing, prototyping, and technical implementation into functional web interfaces.',
  location: 'Indonesia',
  email: 'maharanin083@gmail.com',
  avatar: '/images/ila.jpg',
  socials: [
    { label: 'LinkedIn', url: 'https://www.linkedin.com/in/anabila-maharani-sutomo-195873321/' },
    { label: 'Instagram', url: 'https://instagram.com/nana.bilaahh' },
    { label: 'GitHub', url: 'https://github.com/cuttiestrangerrr' },
  ],
}

export const fallbackSkills = [
  { id: 1, name: 'Figma', category: 'Design Tools', level: 5 },
  { id: 2, name: 'User Research', category: 'Research', level: 4 },
  { id: 3, name: 'Wireframing', category: 'Design Process', level: 5 },
  { id: 4, name: 'Prototyping', category: 'Design Process', level: 4 },
  { id: 5, name: 'Design System', category: 'Design Process', level: 4 },
  { id: 6, name: 'HTML & CSS', category: 'Frontend', level: 4 },
  { id: 7, name: 'Vue.js', category: 'Frontend', level: 4 },
]

export const fallbackExperience = [
  {
    id: 1,
    period: 'July 2025 - July 2026',
    title: 'President of Taekwondo Student Activity Unit',
    place: 'Universitas AMIKOM Yogyakarta',
    description:
      'Led and managed over 50+ active members and a core committee of 13 to run weekly training sessions and organizational programs. Oversaw the strategic planning, budgeting, and execution for championship preparations and internal campus events. Coordinated with the university’s student affairs department and external sports federations (like TI/Pengprov) regarding permits, funding, and event registrations.',
  },
  {
    id: 2,
    period: 'September 2024 - August 2025',
    title: 'Member of Student Senate, Organization Commission',
    place: 'Universitas AMIKOM Yogyakarta',
    description:
      'Formulated and revised organizational regulations and policies to ensure structured governance among student bodies. Facilitated mediation and strategic alignment between the university’s student affairs department and various student organizations.',
  },
  {
    id: 3,
    period: 'August 2025 - October 2025',
    title: 'UI/UX Designer',
    place: 'LPK Saitama (Japanese Language & Work Training Center)',
    description:
      'Designed user-centered UI/UX wireframes, user flows, and high-fidelity prototypes for a student learning application. Conducted user research and user testing with students to gather insights, creating an intuitive and seamless learning experience. Created and maintained a consistent design system, including typography, color palettes, and UI components to optimize the application’s visual identity.',
  },
]

export const fallbackTools = [
  { id: 1, name: 'Figma', category: 'Design', icon: '/images/tools/figma.png' },
  { id: 2, name: 'Notion', category: 'Productivity', icon: '/images/tools/notion.png' },
  { id: 3, name: 'VS Code', category: 'Development', icon: '/images/tools/vscode.png' },
  { id: 4, name: 'GitHub', category: 'Development', icon: '/images/tools/github.png' },
  { id: 5, name: 'Google Sheets', category: 'Productivity', icon: '/images/tools/googlesheets.png' },
]

export const fallbackProjects = [
  {
    id: 1,
    title: 'UI/UX Design for SwapIn, a Secondhand Marketplace Platform',
    slug: 'uiux-design-swapin-secondhand-marketplace-platform',
    role: 'UI/UX Designer',
    summary:
      'SwapIn is a mobile application concept designed to connect buyers and sellers of pre-owned goods safely and quickly. This project spans user research through to high-fidelity interface design.',
    cover_image: '/images/projects/SwapIn.png',
    tools: ['Figma'],
    project_url: 'https://www.figma.com/design/xO7u4FIe8eRTPrqPofDU92/SwapIn?node-id=0-1&p=f',
    featured: true,
  },
  {
    id: 2,
    title: 'Web-Based E-Commerce Dashboard',
    slug: 'web-based-ecommerce-dashboard',
    role: 'UI/UX Designer & Frontend',
    summary:
      'A web-based admin dashboard designed to help online store owners monitor products, sales, and orders effortlessly.',
    cover_image: '/images/projects/EmpatBerlian.png',
    tools: ['Figma', 'HTML', 'CSS', 'JavaScript'],
    project_url: 'https://www.figma.com/design/aZweQ83fWt7KNOWf32fFub/UI_EmpatBerlian?node-id=0-1&t=QLwaG3zV24RJb02f-1',
    featured: true,
  },
  {
    id: 3,
    title: 'UI/UX Design for LPK Saitama Learning Management System',
    slug: 'uiux-design-lpk-saitama',
    role: 'UI/UX Designer',
    summary:
      'LPK Saitama is a mobile application .',
    cover_image: '/images/projects/LPKSaitama.png',
    tools: ['Figma'],
    project_url: null,
    featured: false,
  },
  {
    id: 4,
    title: 'Student Financial Tracker App',
    slug: 'student-financial-tracker-app',
    role: 'UI/UX Designer',
    summary:
      'A mobile application concept created to assist university students in tracking daily expenses quickly and efficiently.',
    cover_image: '/images/projects/keuangan.jpg',
    tools: ['Figma', 'Google Forms'],
    project_url: null,
    featured: false,
  },
]
