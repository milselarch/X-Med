<?php

function curlGoogle($keyword) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.google.com/search?hl=en&q=' . urlencode($keyword) . '&btnG=Google+Search&meta=');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FILETIME, true);
    $data = curl_exec($ch);
    echo $data;
    curl_close($ch);
    return $data;
}

// Return goole Search Result
echo curlGoogle($_POST['search']);
