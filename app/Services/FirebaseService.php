<?php

namespace App\Services;

use Google\Client;
use Illuminate\Support\Facades\Http;

class FirebaseService
{
    private $client;
    private $projectId;

    public function __construct()
    {
        $serviceAccountPath = public_path('storage/planner-app-140d2-firebase-adminsdk-fbsvc-b4111a1275.json');

        $this->client = new Client();
        $this->client->setAuthConfig($serviceAccountPath);
        $this->client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $json = json_decode(file_get_contents($serviceAccountPath), true);
        $this->projectId = $json['project_id'];
    }

    private function getAccessToken()
    {
        return $this->client->fetchAccessTokenWithAssertion()['access_token'];
    }

    public function sendNotification($deviceToken, $title, $body)
    {
        $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)->post($url, [
            "message" => [
                "token" => $deviceToken,
                "notification" => [
                    "title" => $title,
                    "body"  => $body,
                ],
            ]
        ]);

        // return $response->json();
    }
}
