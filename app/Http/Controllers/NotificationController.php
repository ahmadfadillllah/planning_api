<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\FirebaseService;

class NotificationController extends Controller
{
    //
    public function sendNotification(Request $request, FirebaseService $firebase)
    {
        $deviceToken = $request->fcm_token;
        $title = $request->title;
        $body  = $request->body;

        $result = $firebase->sendNotification($deviceToken, $title, $body);

        return response()->json($result);
    }

    public function sendCampaign(Request $request)
    {
        $title = $request->input('title', 'Judul Notifikasi');
        $body  = $request->input('body', 'Isi Notifikasi');
        $topic = $request->input('topic', 'all'); // bisa topic atau segment

        // Lokasi file service account JSON
        $serviceAccountPath = public_path('storage/planner-app-140d2-firebase-adminsdk-fbsvc-b4111a1275.json');

        // Auth client
        $client = new Client();
        $client->setAuthConfig($serviceAccountPath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $accessToken = $client->fetchAccessTokenWithAssertion()['access_token'];

        // Project ID (lihat di service account JSON → project_id)
        $projectId = 'planner-app-140d2';

        // Endpoint Notification Composer API
        $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

        // Payload notifikasi
        $message = [
            'message' => [
                'topic' => $topic,
                'notification' => [
                    'title' => $title,
                    'body'  => $body,
                ],
                'android' => [
                    'priority' => 'high',
                ],
                'apns' => [
                    'payload' => [
                        'aps' => [
                            'sound' => 'default',
                        ],
                    ],
                ],
            ],
        ];

        // Kirim request
        $response = Http::withToken($accessToken)
            ->post($url, $message);

        return response()->json([
            'status' => $response->status(),
            'body'   => $response->json(),
        ]);
    }
}
