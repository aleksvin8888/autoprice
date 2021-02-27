<?php
function message_to_telegram($text) {
    $data = [
        'chat_id' => TELEGRAM_CHATID,
        'text' => $text,
        'parse_mode' => "HTML"
    ];
    // curl_init - Запуск функции 
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api.telegram.org/bot' . 
        TELEGRAM_TOKEN . '/sendMessage' );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_TIMEOUT, 10);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data ); 
 
    $result = curl_exec( $ch );
    // Закрываем соединение с сервером
    curl_close( $ch );
    
    
}