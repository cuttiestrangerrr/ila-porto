<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Figma', 'category' => 'Design Tool', 'level' => 5, 'order' => 1],
            ['name' => 'Adobe XD', 'category' => 'Design Tool', 'level' => 4, 'order' => 2],
            ['name' => 'User Research', 'category' => 'Research', 'level' => 4, 'order' => 3],
            ['name' => 'Wireframing', 'category' => 'Design Process', 'level' => 5, 'order' => 4],
            ['name' => 'Prototyping', 'category' => 'Design Process', 'level' => 4, 'order' => 5],
            ['name' => 'Design System', 'category' => 'Design Process', 'level' => 3, 'order' => 6],
            ['name' => 'HTML & CSS', 'category' => 'Frontend', 'level' => 4, 'order' => 7],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'level' => 3, 'order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        $projects = [
            [
                'title' => 'Campus Library App Redesign',
                'slug' => 'campus-library-app-redesign',
                'role' => 'UI/UX Designer',
                'summary' => 'Redesigned the digital book borrowing flow to be faster and easier for new students to navigate.',
                'description' => 'Final project for Human-Computer Interaction course. Started with interviews of 8 students, followed by creating user flows, wireframes, and interactive prototypes in Figma. Usability testing showed borrowing task completion time dropped from an average of 2 minutes to 45 seconds.',
                'cover_image' => '/images/projects/perpustakaan.jpg',
                'gallery' => ['/images/projects/perpustakaan-1.jpg', '/images/projects/perpustakaan-2.jpg'],
                'tools' => ['Figma', 'Maze', 'Notion'],
                'project_url' => null,
                'repo_url' => null,
                'featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Local MSME Showcase Website',
                'slug' => 'local-msme-showcase-website',
                'role' => 'UI/UX Designer & Frontend',
                'summary' => 'Designed and built a website to help local small businesses showcase products online.',
                'description' => 'Group project for Web Programming course. Responsible for business owner needs research, interface design, and frontend implementation using HTML, CSS, and JavaScript.',
                'cover_image' => '/images/projects/umkm.jpg',
                'gallery' => ['/images/projects/umkm-1.jpg'],
                'tools' => ['Figma', 'HTML', 'CSS', 'JavaScript'],
                'project_url' => null,
                'repo_url' => null,
                'featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Student Financial Tracker App',
                'slug' => 'student-financial-tracker-app',
                'role' => 'UI/UX Designer',
                'summary' => 'Mobile app concept designed to assist university students in tracking daily expenses quickly.',
                'description' => 'Independent case study practicing end-to-end design: student financial survey, information architecture, high-fidelity mockups, and interactive prototype in Figma.',
                'cover_image' => '/images/projects/keuangan.jpg',
                'gallery' => [],
                'tools' => ['Figma', 'Google Forms'],
                'project_url' => null,
                'repo_url' => null,
                'featured' => false,
                'order' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
