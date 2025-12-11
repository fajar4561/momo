<?php 
function encryptDataURL($plaintext, $secret_key = "kunci-rahasia-anda") {
    // Generate key
    $key = hash('sha256', $secret_key, true);

    // Generate IV
    $iv = openssl_random_pseudo_bytes(16);

    // Encrypt
    $encrypted = openssl_encrypt($plaintext, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);

    // Gabungkan IV + encrypted → base64
    $b64 = base64_encode($iv . $encrypted);

    // Ubah ke URL-safe (hilangkan karakter yang dilarang)
    $urlSafe = rtrim(strtr($b64, '+/', '-_'), '=');

    return $urlSafe;
}

function decryptDataURL($ciphertext, $secret_key = "kunci-rahasia-anda") {
    // Kembalikan karakter base64 normal
    $b64 = strtr($ciphertext, '-_', '+/');

    // Tambahkan padding jika hilang
    $pad = strlen($b64) % 4;
    if ($pad > 0) {
        $b64 .= str_repeat('=', 4 - $pad);
    }

    // Base64 decode
    $data = base64_decode($b64);

    // Key
    $key = hash('sha256', $secret_key, true);

    // Ambil IV
    $iv = substr($data, 0, 16);

    // Sisanya adalah ciphertext
    $encrypted = substr($data, 16);

    return openssl_decrypt($encrypted, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
}


?>