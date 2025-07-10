<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    //
    public function index()
    {
        try {
            $result = Shift::select(
                'ID',
                'STATUSENABLED',
                'KETERANGAN',
            )
            ->where('STATUSENABLED', true)
            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $result,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data Shift.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
