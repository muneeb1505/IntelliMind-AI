<?php

require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$data = json_decode(file_get_contents("php://input"));
$text = $data->text;
$domain = $data->domain; // Get selected domain

$client = new Client("AIzaSyBIjN3hHgU_Gr4lSZZvAAutvLc2PEeM--o");

// Modify the prompt to be specific to the domain
$prompt = "You are a chatbot specialized in the '$domain' domain. Answer the following query: $text";

$response = $client->geminiPro15()->generateContent(
    new TextPart($prompt)
);

echo $response->text();
?>
