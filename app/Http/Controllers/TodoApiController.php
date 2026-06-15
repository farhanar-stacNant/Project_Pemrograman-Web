<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\JsonResponse;

class TodoApiController extends Controller
{
    /*Mengembalikan Data Statistik dalam Format yang Disepakati (To-Do)*/
    public function getStats(): JsonResponse
    {
        $total = Todo::count();
        $completed = Todo::where('is_done', true)->count();
        $pending = Todo::where('is_done', false)->count();

        return response()->json([
            'status' => 'success',
            'data' => [
                'total' => $total,
                'completed' => $completed,
                'pending' => $pending,
            ]
        ]);
    }
}
