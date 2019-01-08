<?php
function getData($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function translate($text){
	$url = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20181111T154835Z.84fa38c6217fc7a8.794f29ab919005ea1fc6d78841dcda5f4bb57e68&text=$text&lang=en&format=plain";
    $data = json_decode(file_get_contents($url), true);
    return $data["text"][0];
}

var_dump(translate('Привет'));