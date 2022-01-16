<?php

function printAnswer($str)
{
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

function getTelegramApi($method, $options = null)
{
    $str_requesr = API_URL . TOKEN . '/' . $method;

    if ($options)
    {
        $str_requesr .= '?' . http_build_query($options);
    }
    $request = file_get_contents($str_requesr);

    return json_decode($request, 1);
}

function setHook($set)
{
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    printAnswer(
        getTelegramApi('setWebhook',
            [
                'url'=>$set ? $url : ''
            ])
    );
    exit();
}

function getHookInfo()
{
    printAnswer(
        getTelegramApi('getWebhookInfo')
    );
    exit();
}

function getMe()
{
    printAnswer(
        getTelegramApi('getMe')
    );
    exit();
}

//setHook(1);
//getHookInfo();
//getMe();
