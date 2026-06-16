<?php
use App\Http\Controllers\Api\PesertaApiController;

Route::get('/v1/peserta', [PesertaApiController::class, 'index']);

public function index() {
    $peserta = Peserta::all();
    return response()->json([
        'status' => 'success',
        'message' => 'Data peserta berhasil dimuat',
        'data' => $peserta
    ], 200);
}