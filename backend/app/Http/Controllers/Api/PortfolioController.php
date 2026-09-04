<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;

class PortfolioController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'profile' => config('profile'),
            'skills' => Skill::orderBy('order')->orderBy('id')->get(),
            'projects' => Project::orderByDesc('featured')->orderBy('order')->orderBy('id')->get(),
        ]);
    }

    public function profile(): JsonResponse
    {
        return response()->json(config('profile'));
    }

    public function skills(): JsonResponse
    {
        return response()->json(
            Skill::orderBy('order')->orderBy('id')->get()
        );
    }

    public function projects(): JsonResponse
    {
        return response()->json(
            Project::orderByDesc('featured')->orderBy('order')->orderBy('id')->get()
        );
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project);
    }
}
