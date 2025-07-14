<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    //
    public function summary()
    {
        try {
            $result = Activity::select(
                'ID',
                'STATUSENABLED',
                'TANGGAL',
                'JENIS',
                'NAMA',
                'NIK',
                'KETERANGAN',
            )
            ->where('STATUSENABLED', true)
            ->where('NIK', Auth::user()->nik)
            ->orderByDesc('TANGGAL')
            ->limit(5)
            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $result,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data Activity.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function all()
    {
        $startDate = '2025-01-01 00:00';
        $endDate = '2025-12-01 00:00';

        try {
            $result = Activity::select(
                    'ID',
                    'STATUSENABLED',
                    'TANGGAL',
                    'JENIS',
                    'NAMA',
                    'NIK',
                    'KETERANGAN',
                )
                ->where('STATUSENABLED', true)
                ->where('NIK', Auth::user()->nik)
                ->whereBetween('TANGGAL', [$startDate, $endDate])
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $result,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data Activity.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
