<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '370653960:AAHOfTfprI2V2dqo2lveDWBOESBMIqJlY2I';
$BOT_NAME = 'totopo_bot';
$hook_url = 'https://qa-testatmex.com/telegramtest/hook.php';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}