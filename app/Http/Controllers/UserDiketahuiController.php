<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDiketahuiController extends Controller
{
    //
    public function index()
    {
        try {

            $result = DB::table('CONF_MAPPING_VERIFIER as mf')
            ->leftJoin('users as us', 'mf.USER_ID', 'us.id')
            ->select(
                'mf.STATUSENABLED',
                'mf.id as ID',
                'us.nik as NIK',
                'us.name as NAME',
                'us.role as ROLE'
            )->where('mf.STATUSENABLED', true)->get();

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

}

