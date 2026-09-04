<?php

// Data profil pemilik portofolio. Ubah nilai di bawah ini sesuai dirimu.
// File ini sengaja dipisah dari database supaya gampang diedit langsung.

return [
    'name' => env('PROFILE_NAME', 'Anabila Maharani Sutomo'),
    'role' => env('PROFILE_ROLE', 'UI/UX Designer'),
    'tagline' => 'Crafting clear, intuitive, and user-friendly interfaces.',
    'bio' => 'University student passionate about UI/UX Design and Frontend Web Development. '
        .'The projects below were developed as coursework through a systematic process: '
        .'user research, wireframing, prototyping, and technical implementation into functional web interfaces.',
    'location' => 'Indonesia',
    'email' => 'maharanin083@email.com',
    'avatar' => '/images/avatar.jpg',
    'resume_url' => null,
    'socials' => [
        ['label' => 'LinkedIn', 'url' => 'https://linkedin.com/in/username'],
        ['label' => 'Instagram', 'url' => 'https://instagram.com/username'],
        ['label' => 'GitHub', 'url' => 'https://github.com/username'],
    ],
];
