<?php
declare(strict_types = 1);
include 'hitlibs/basics.php';
use \unreal4u\TelegramAPI\TgLog;
// @TODO Change to use \unreal4u\Telegram\Methods\{GetMe, SendMessage}; once PSR-12 is definitive
//use \unreal4u\TelegramAPI\Telegram\Methods\GetMe;
use \unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
/* $tgLog = new TgLog('326166502:AAGzrfOGaWYcioJXW3_jr1dri3he__oeHFw');
$getMe = new GetMe();
$userInformation = $tgLog->performApiRequest($getMe);
printf(
    'This bot is called <strong>%s</strong> (username %s) and has id <strong>%d</strong>%s',
    $userInformation->first_name,
    $userInformation->username,
    $userInformation->id,
    PHP_EOL
); */
$sendMessage = new SendMessage();
$sendMessage->chat_id = A_USER_CHAT_ID;
$sendMessage->text = 'Hello world to the user... now revamped!';
$tgLog->performApiRequest($sendMessage);
$sendMessage = new SendMessage();
$sendMessage->chat_id = A_GROUP_CHAT_ID;
$sendMessage->text = 'And this is an hello the the group... from scratch :D';
$tgLog->performApiRequest($sendMessage);