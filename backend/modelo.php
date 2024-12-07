<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Dotenv\Dotenv;

// Carregar o arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Acessar a chave do ambiente
$apiKey = $_ENV['OPENAI_API_KEY'];

$client = new Client();

$response = $client->post('https://api.openai.com/v1/chat/completions', [
    'json' => [
        'model' => 'gpt-3.5-turbo', 
        'messages' => [
            ['role' => 'system', 'content' => 'O que é Inteligência Artificial?']
        ],
    ],
    'headers' => [
        'Authorization' => 'Bearer ' . $apiKey,
    ]
]);

$data = json_decode($response->getBody()->getContents(), true);

// Exibir a resposta da API
echo 'Resposta: ' . $data['choices'][0]['message']['content'] . PHP_EOL;
?>