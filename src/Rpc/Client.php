<?php

namespace Sui\Rpc;

use GuzzleHttp\Client as GuzzleHttpClient;
use Exception;

class Client
{

  protected GuzzleHttpClient $client;

  protected string $url;

  public function __construct(string $url, array $headers = [])
  {
    $this->url = $url;

    if (!$headers['Content-Type']) {
      $headers['Content-Type'] = 'application/json';
    }

    $this->client = new GuzzleHttpClient(['headers' => $headers]);
  }

  public function request(string $method, mixed $id = null, array $params = [])
  {
    $payload = [
      'jsonrpc' => '2.0',
      'method' => $method,
      'params' => $params,
      'id' => $id ?: uniqid(),
    ];

    $response = $this->client->request('POST', $this->url, ['json' => $payload]);
    $statusCode = $response->getStatusCode();

    if ($statusCode < 200 || $statusCode > 299) {
      return new Exception("");
    }

    $responseBody = (string) $response->getBody();
    return json_decode($responseBody, true)['result'] ?: $responseBody;
  }
}
