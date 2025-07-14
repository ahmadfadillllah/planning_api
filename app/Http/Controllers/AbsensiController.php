<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    //
    public function index()
    {
        try {
            $result = Absensi::select(
                'ID_Absen as CODE',
                'Jam_MasukFgr as MASUK',
                'Jam_PulangFgr as PULANG',
            )
            ->where('NIK', Auth::user()->nik)
            ->where('Tahun', Carbon::now()->year)
            ->where('Bulan', Carbon::now()->month)
            ->where('Tgl', Carbon::now()->day)
            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $result,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data absensi harian.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
