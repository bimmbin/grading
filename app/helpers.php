<?php


function enkrip($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-ctr'));
    $encrypted = openssl_encrypt($data, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $iv);
    $encrypted = base64_encode($iv . $encrypted);
    return $encrypted;
}

function dekrip($encrypted, $key) {
    $encrypted = base64_decode($encrypted);
    $iv = substr($encrypted, 0, openssl_cipher_iv_length('aes-256-ctr'));
    $encrypted = substr($encrypted, openssl_cipher_iv_length('aes-256-ctr'));
    $decrypted = openssl_decrypt($encrypted, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}

?>
