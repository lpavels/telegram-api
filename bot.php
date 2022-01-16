<?php

$GET_INPUT = file_get_contents('php://input');

require_once 'config.php';
require_once 'functions.php';


$event = json_decode($GET_INPUT,1);

if (mb_strtolower($event['message']['text']) == 'привет'){
    $autoAnswer = 'Привет, человек';
}else{
    $autoAnswer = 'Команда не знакома.';
}

getTelegramApi('sendMessage',
[
    'text' => $autoAnswer,
    'chat_id' => $event['message']['chat']['id']
]);