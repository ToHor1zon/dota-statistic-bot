<?php

namespace App\Services;

use GuzzleHttp\Client;

class QraphQLService {
  public static function get(string $query): array
  {

    $client = new Client();
    
    $response = $client->post(config('api.stratz_url'), [
      'headers' => [
        'Authorization' => 'Bearer ' . config('api.stratz_token'),
      ],
      'json' => [
          'query' => "{$query}",
      ],
    ]);

    $body = $response->getBody();
    $data = json_decode($body, true)['data'];

    return $data;
  }
}