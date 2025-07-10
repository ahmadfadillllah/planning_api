<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function index()
    {
        try {
            $result = Area::select(
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
                'message' => 'Gagal mengambil data Area.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
