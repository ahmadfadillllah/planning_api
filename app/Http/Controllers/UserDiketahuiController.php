<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDiketahuiController extends Controller
{
    //
    public function index()
    {
        try {
            $result = User::whereIn('role', [
                'SUPERINTENDENT',
                'PJS. SUPERINTENDENT',
                'SUPERVISOR',
                'STAFF'
            ])
            ->select(
                'nik as NIK',
                'name as NAMA',
                'role as ROLE'
            )
            ->where('statusenabled', true)
            ->get();

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

