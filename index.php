<?php

$token = '8704126137:AAFKWtfeYJq2A9LVAlJOoM-nMAnmzVhFGhY';
$botUrl = "https://api.telegram.org/bot{$token}";

$update = json_decode(file_get_contents('php://input'), true);

if (!$update) exit;

$chatId = $update['message']['chat']['id'];
$text = $update['message']['text'] ?? '';

if ($text === '/start') {
    $reply = 'Привет! Я работаю 🤖';
} elseif ($text === '/help') {
    $reply = 'Доступные команды: /start, /help';
} else {
    $reply = 'Ты написал: ' . $text;
}

$ch = curl_init("{$botUrl}/sendMessage");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'chat_id' => $chatId,
    'text' => $reply
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
