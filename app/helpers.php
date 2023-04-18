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

function manipulateSection($section) {
    //get the first number
    $firstnum = substr($section, 0, 1);

    //check if its act
    $ifAct = substr($section, 1, 1);

    //conditional if its act
    if ($ifAct == 'A') {
        // dd('this is act');

        //replace it with space and the firstnumber
        $replaced = str_replace('-', 'h '.$firstnum, $section);
        //dont read the firstnumber on the result of replace
        $seksyon = substr($replaced, 1);

        return $seksyon;
    } 
    /////////else
    
    //replace it with space and the firstnumber
    $replaced = str_replace('-', ' '.$firstnum, $section);
    //dont read the firstnumber on the result of replace
    $seksyon = substr($replaced, 1);

    return $seksyon;
}

?>
