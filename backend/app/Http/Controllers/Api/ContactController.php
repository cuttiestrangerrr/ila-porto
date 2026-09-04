<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Simpan pesan dari form kontak.
     *
     * Untuk versi sederhana ini pesan hanya dicatat ke log Laravel
     * (storage/logs/laravel.log). Kalau mau, ganti isi method ini
     * dengan Mail::send(...) untuk mengirim email, atau simpan ke
     * tabel "messages" di database.
     */
    public function store(ContactRequest $request): JsonResponse
    {
        $data = $request->validated();

        Log::info('Pesan baru dari form kontak portofolio', $data);

        return response()->json([
            'message' => 'Terima kasih, pesanmu sudah terkirim!',
        ], 201);
    }
}
