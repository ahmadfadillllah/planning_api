<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FCMTokenController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $dataToUpdate = [
                'fcm_token' => $data['fcm_token'],
            ];

            User::where('id', Auth::user()->id)->update($dataToUpdate);

            return response()->json([
                'status' => 'success',
                'message' => 'FCM Token berhasil di update',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'FCM Token gagal di update',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
