<?php

// Verifica il segreto (opzionale ma consigliato per la sicurezza)
$secret = 'Spicoccio949494!'; // Il segreto che configuri su GitHub

$headers = getallheaders();
$signature = $headers['X-Hub-Signature'];

$payload = file_get_contents('php://input');
$expected_signature = 'sha1=' . hash_hmac('sha1', $payload, $secret);

if ($signature !== $expected_signature) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Invalid signature';
    exit;
}

// Quando il webhook è valido, esegui il deploy
$deployCommand = '/home/mremedik/public_html/api/deploy.sh';

$output = shell_exec($deployCommand);

// Rispondi con successo
header('HTTP/1.1 200 OK');
echo 'Deploy completato!';
