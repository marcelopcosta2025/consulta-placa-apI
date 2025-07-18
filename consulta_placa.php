<?php
header('Content-Type: application/json');

if (!isset($_GET['placa'])) {
    echo json_encode(['erro' => 'Informe a placa']);
    exit;
}

$placa = strtoupper(trim($_GET['placa']));
$url = "https://anycar.com.br/consulta-placa/$placa";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

if (!$response) {
    echo json_encode(['erro' => 'Não foi possível consultar']);
    exit;
}

// Ajuste o parsing conforme a estrutura do site
$marca = $modelo = $cor = $ano = '';

if (preg_match('/Marca:\s*<[^>]+>([^<]+)/i', $response, $m)) {
    $marca = trim($m[1]);
}
if (preg_match('/Modelo:\s*<[^>]+>([^<]+)/i', $response, $m)) {
    $modelo = trim($m[1]);
}
if (preg_match('/Cor:\s*<[^>]+>([^<]+)/i', $response, $m)) {
    $cor = trim($m[1]);
}
if (preg_match('/Ano Fab\/Mod:\s*<[^>]+>([^<]+)/i', $response, $m)) {
    $ano = trim($m[1]);
}

echo json_encode([
    'placa' => $placa,
    'marca' => $marca,
    'modelo' => $modelo,
    'cor' => $cor,
    'ano' => $ano
]);
?>