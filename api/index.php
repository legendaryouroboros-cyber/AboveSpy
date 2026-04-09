<?php

$token = '8570074343:AAFg9TY4HpzIAzH75H5FFV_Nc4W72wW2u_Q';

require_once __DIR__ . '/../src/Roles.php';
require_once __DIR__ . '/../src/Bot.php';
require_once __DIR__ . '/../src/Game.php';
require_once __DIR__ . '/../src/Keyboard.php';


$game = new \src\Game();
$bot = new \src\Bot($game, $token);

$update = json_decode(file_get_contents('php://input'), true);

if ($update) {
    $bot->handle($update);

}