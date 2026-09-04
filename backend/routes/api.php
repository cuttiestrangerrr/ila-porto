<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PortfolioController;
use Illuminate\Support\Facades\Route;

// Semua data portofolio (profil, skill, proyek) dalam satu payload,
// paling sederhana untuk dikonsumsi oleh frontend Vue.
Route::get('/portfolio', [PortfolioController::class, 'index']);

Route::get('/profile', [PortfolioController::class, 'profile']);
Route::get('/skills', [PortfolioController::class, 'skills']);
Route::get('/projects', [PortfolioController::class, 'projects']);
Route::get('/projects/{project}', [PortfolioController::class, 'show']);

Route::post('/contact', [ContactController::class, 'store']);
