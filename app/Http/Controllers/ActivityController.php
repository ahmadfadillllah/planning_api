<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
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

    public function all(Request $request)
    {
        $bulan = $request->input('bulan');

        if (!$bulan) {
            $bulan = Carbon::now()->month;
        }

        $tahun = Carbon::now()->year;

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
                ->whereMonth('TANGGAL', $bulan)
                ->whereYear('TANGGAL', $tahun)
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
