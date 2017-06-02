<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '370653960:AAHOfTfprI2V2dqo2lveDWBOESBMIqJlY2I';
$BOT_NAME = 'totopo_bot';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // log telegram errors
    // echo $e;
}