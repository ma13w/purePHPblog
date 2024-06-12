<?php
require_once "php/component/general.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['page']) && isset($_GET['time'])){

    $pageName = basename($_GET['page']);

    $postData = [
        'page' => basename($_GET['page']),
        'time' => $_GET['time'],
        'method' => $_SERVER['REQUEST_METHOD'],
        'timestamp' => date('Y-m-d H:i:s')
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $DB_URL."stats/log.json");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    echo $response;

    $data = file_get_contents($DB_URL."stats/views.json");
    $data = json_decode($data, true);
    $data[$pageName] = isset($data[$pageName]) ? intval($data[$pageName]) + 1 : "1";
    $rp = put_request($DB_URL."stats/views.json", json_encode($data));

    echo $rp;


    echo "load.php loaded successfully.";
}


?>