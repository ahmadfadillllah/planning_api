<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index()
    {
        try {
            $banners = collect([
                'Frame 1.jpg',
                'Frame 2.jpg',
                'Frame 3.jpg',
            ])->map(function ($filename) {
                return [
                    'filename' => $filename,
                    'url' => asset("banner/{$filename}"),
                ];
            });

            return response()->json([
                'status' => 'success',
                'data' => $banners,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data banner.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
