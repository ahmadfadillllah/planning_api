<?php

namespace App\Http\Controllers;

use App\Models\KLKHFuelStation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KLKHFuelStationController extends Controller
{

    public function index(Request $request)
    {
        try {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');

            if (!$startDate || !$endDate) {
                // Default ke hari ini jika tidak ada input
                $startDate = Carbon::now()->toDateString();
                $endDate = $startDate;
            }

            $user = Auth::user();
            $nik = $user->nik;
            $role = $user->role;

            $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
                ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')
                ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
                ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
                ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
                ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
                ->select(
                    'fs.ID',
                    'fs.UUID',
                    'fs.PIC as NIK_PIC',
                    'us1.name as NAMA_PIC',
                    DB::raw('CONVERT(varchar, fs.CREATED_AT, 120) as TANGGAL_PEMBUATAN'),
                    'fs.STATUSENABLED',
                    'ar.KETERANGAN as PIT',
                    'sh.KETERANGAN as SHIFT',
                    'fs.PENGAWAS as NIK_PENGAWAS',
                    'fs.VERIFIED_PENGAWAS as VERIFIED_PENGAWAS',
                    'fs.VERIFIED_DATETIME_PENGAWAS as VERIFIED_DATETIME_PENGAWAS',
                    'fs.CATATAN_VERIFIED_PENGAWAS as CATATAN_VERIFIED_PENGAWAS',
                    'us2.name as NAMA_PENGAWAS',
                    'fs.DIKETAHUI as NIK_DIKETAHUI',
                    'fs.VERIFIED_DIKETAHUI as VERIFIED_DIKETAHUI',
                    'fs.VERIFIED_DATETIME_DIKETAHUI as VERIFIED_DATETIME_DIKETAHUI',
                    'fs.CATATAN_VERIFIED_DIKETAHUI as CATATAN_VERIFIED_DIKETAHUI',
                    'us3.name as NAMA_DIKETAHUI',
                    'fs.DATE',
                    DB::raw("CONVERT(VARCHAR(5), fs.TIME, 108) as TIME"),
                )
                ->where('fs.STATUSENABLED', true)
                ->whereBetween(DB::raw('CONVERT(varchar, fs.DATE, 23)'), [$startDate, $endDate]);

            // 🔐 Filter berdasarkan role user login
            $fuelStation->where(function ($query) use ($nik) {
                $query->where('fs.PIC', $nik)
                    ->orWhere('fs.PENGAWAS', $nik)
                    ->orWhere('fs.DIKETAHUI', $nik);
            });
            $fuelStation->orderBy('fs.CREATED_AT', 'desc');

            $result = $fuelStation->get();

            return response()->json([
                'status' => 'success',
                'data' => $result,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data Fuel Station.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $dataToInsert = [
                'PIC' => Auth::user()->nik,
                'UUID' => (string) Uuid::uuid4()->toString(),
                'STATUSENABLED' => true,
                'PIT_ID' => $data['PIT'],
                'SHIFT_ID' => $data['SHIFT'],
                'DATE' => $data['DATE'],
                'TIME' => $data['TIME'],
                'PERMUKAAN_TANAH_RATA_CHECK' => $data['PERMUKAAN_TANAH_RATA_CHECK'],
                'PERMUKAAN_TANAH_RATA_NOTE' => $data['PERMUKAAN_TANAH_RATA_NOTE'] ?? null,
                'PERMUKAAN_TANAH_LICIN_CHECK' => $data['PERMUKAAN_TANAH_LICIN_CHECK'],
                'PERMUKAAN_TANAH_LICIN_NOTE' => $data['PERMUKAAN_TANAH_LICIN_NOTE'] ?? null,
                'LOKASI_JAUH_LINTASAN_CHECK' => $data['LOKASI_JAUH_LINTASAN_CHECK'],
                'LOKASI_JAUH_LINTASAN_NOTE' => $data['LOKASI_JAUH_LINTASAN_NOTE'] ?? null,
                'TIDAK_CECERAN_B3_CHECK' => $data['TIDAK_CECERAN_B3_CHECK'],
                'TIDAK_CECERAN_B3_NOTE' => $data['TIDAK_CECERAN_B3_NOTE'] ?? null,
                'PARKIR_FUELTRUCK_CHECK' => $data['PARKIR_FUELTRUCK_CHECK'],
                'PARKIR_FUELTRUCK_NOTE' => $data['PARKIR_FUELTRUCK_NOTE'] ?? null,
                'PARKIR_LV_CHECK' => $data['PARKIR_LV_CHECK'],
                'PARKIR_LV_NOTE' => $data['PARKIR_LV_NOTE'] ?? null,
                'LAMPU_KERJA_CHECK' => $data['LAMPU_KERJA_CHECK'],
                'LAMPU_KERJA_NOTE' => $data['LAMPU_KERJA_NOTE'] ?? null,
                'FUEL_GENSET_CHECK' => $data['FUEL_GENSET_CHECK'],
                'FUEL_GENSET_NOTE' => $data['FUEL_GENSET_NOTE'] ?? null,
                'AIR_BERSIH_TANDON_CHECK' => $data['AIR_BERSIH_TANDON_CHECK'],
                'AIR_BERSIH_TANDON_NOTE' => $data['AIR_BERSIH_TANDON_NOTE'] ?? null,
                'SOP_JSA_CHECK' => $data['SOP_JSA_CHECK'],
                'SOP_JSA_NOTE' => $data['SOP_JSA_NOTE'] ?? null,
                'SAFETY_POST_CHECK' => $data['SAFETY_POST_CHECK'],
                'SAFETY_POST_NOTE' => $data['SAFETY_POST_NOTE'] ?? null,
                'RAMBU_APD_CHECK' => $data['RAMBU_APD_CHECK'],
                'RAMBU_APD_NOTE' => $data['RAMBU_APD_NOTE'] ?? null,
                'PERLENGKAPAN_KERJA_CHECK' => $data['PERLENGKAPAN_KERJA_CHECK'],
                'PERLENGKAPAN_KERJA_NOTE' => $data['PERLENGKAPAN_KERJA_NOTE'] ?? null,
                'APAB_APAR_CHECK' => $data['APAB_APAR_CHECK'],
                'APAB_APAR_NOTE' => $data['APAB_APAR_NOTE'] ?? null,
                'P3K_EYEWASH_CHECK' => $data['P3K_EYEWASH_CHECK'],
                'P3K_EYEWASH_NOTE' => $data['P3K_EYEWASH_NOTE'] ?? null,
                'INSPEKSI_APAR_CHECK' => $data['INSPEKSI_APAR_CHECK'],
                'INSPEKSI_APAR_NOTE' => $data['INSPEKSI_APAR_NOTE'] ?? null,
                'FORM_CHECKLIST_REFUELING_CHECK' => $data['FORM_CHECKLIST_REFUELING_CHECK'],
                'FORM_CHECKLIST_REFUELING_NOTE' => $data['FORM_CHECKLIST_REFUELING_NOTE'] ?? null,
                'TEMPAT_SAMPAH_CHECK' => $data['TEMPAT_SAMPAH_CHECK'],
                'TEMPAT_SAMPAH_NOTE' => $data['TEMPAT_SAMPAH_NOTE'] ?? null,
                'MINEPERMIT_CHECK' => $data['MINEPERMIT_CHECK'],
                'MINEPERMIT_NOTE' => $data['MINEPERMIT_NOTE'] ?? null,
                'SIMPER_OPERATOR_CHECK' => $data['SIMPER_OPERATOR_CHECK'],
                'SIMPER_OPERATOR_NOTE' => $data['SIMPER_OPERATOR_NOTE'] ?? null,
                'PADLOCK_CHECK' => $data['PADLOCK_CHECK'],
                'PADLOCK_NOTE' => $data['PADLOCK_NOTE'] ?? null,
                'WADAH_PENAMPUNG_CHECK' => $data['WADAH_PENAMPUNG_CHECK'],
                'WADAH_PENAMPUNG_NOTE' => $data['WADAH_PENAMPUNG_NOTE'] ?? null,
                'WHEEL_CHOCK_CHECK' => $data['WHEEL_CHOCK_CHECK'],
                'WHEEL_CHOCK_NOTE' => $data['WHEEL_CHOCK_NOTE'] ?? null,
                'RADIO_KOMUNIKASI_CHECK' => $data['RADIO_KOMUNIKASI_CHECK'],
                'RADIO_KOMUNIKASI_NOTE' => $data['RADIO_KOMUNIKASI_NOTE'] ?? null,
                'APD_STANDAR_CHECK' => $data['APD_STANDAR_CHECK'],
                'APD_STANDAR_NOTE' => $data['APD_STANDAR_NOTE'] ?? null,
                'ADDITIONAL_NOTES' => $data['ADDITIONAL_NOTES'] ?? null,
                'DIKETAHUI' => $data['DIKETAHUI'] ?? null,
            ];

            if (Auth::user()->role == 'FOREMAN' || Auth::user()->role == 'SUPERVISOR') {
                $dataToInsert['PENGAWAS'] = Auth::user()->nik;
                $dataToInsert['VERIFIED_DATETIME_PENGAWAS'] = Carbon::now();
                $dataToInsert['VERIFIED_PENGAWAS'] = Auth::user()->nik;
            }

            KLKHFuelStation::create($dataToInsert);

            return response()->json([
                'status' => 'success',
                'message' => 'KLKH Fuel Station berhasil dibuat',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal membuat KLKH Fuel Station',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = KLKHFuelStation::where('ID', $id)->update([
                'STATUSENABLED' => false,
                'DELETED_BY' => Auth::user()->nik,
            ]);

            if ($deleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'KLKH Fuel Station berhasil dihapus',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data tidak ditemukan atau gagal dihapus.',
                ], 404);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function download($id)
    {
        $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
        ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')

        ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
        ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
        ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
        ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
        ->select(
            'fs.*',
            'fs.STATUSENABLED',
            'ar.KETERANGAN as PIT',
            'sh.KETERANGAN as SHIFT',
            'us2.name as NAMA_PENGAWAS',
            'us3.name as NAMA_DIKETAHUI',
        )
        ->where('fs.STATUSENABLED', true)
        ->where('fs.ID', $id)->first();

        if($fuelStation == null){
            return redirect()->back()->with('info', 'Maaf, data tidak ditemukan');
        }else {
            $item = $fuelStation;

            $qrTempFolder = storage_path('app/qr-temp');
            if (!File::exists($qrTempFolder)) {
                File::makeDirectory($qrTempFolder, 0755, true);
            }

            if($item->VERIFIED_PENGAWAS != null){
                $fileName = 'VERIFIED_PENGAWAS' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)->format('png')->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_PENGAWAS)]), $filePath);
                $item->VERIFIED_PENGAWAS = $filePath;
            }else{
                $item->VERIFIED_PENGAWAS == null;
            }

            if($item->VERIFIED_DIKETAHUI != null){
                $fileName = 'VERIFIED_DIKETAHUI' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)->format('png')->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_DIKETAHUI)]), $filePath);
                $item->VERIFIED_DIKETAHUI = $filePath;
            }else{
                $item->VERIFIED_DIKETAHUI == null;
            }

        }

        // return view('klkh.fuelStation.download', compact('fuelStation'));

        $pdf = PDF::loadView('klkh.fuelStation.download', compact('fuelStation'));
        return $pdf->download('KLKH Fuel Station.pdf');
    }
}
