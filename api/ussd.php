<?php
session_start();
$houses = \App\Controllers\HouseController::all();
require_once __DIR__.'/../vendor/autoload.php';
$response = "";
    // Reads the variables sent via POST from our gateway
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];
    if ( $text == "" ) {

        // This is the first request. Note how we start the response with CON
        $response = "CON Welcome To Smart Keja \nPlease reply with \n";
        $response .="1. House to rent";
        $response .="2. House to buy";
        $response .="0. Exit";
    }

    if ($text == '1'){
        $response = "CON please Respond with\n";
        foreach ($houses as $house):
            $response .="{$house['id']} for {$house['house_category']} At {$house['location']}";
        endforeach;

    }
    if ($text == '2'){
        $response = "END The service is underway please try again later";
    }
    if($text == '0'){
        $response = "END thankyou for using smart keja";
    }


    header('Content-type: text/plain');
    echo $response;
    // DONE!!!
    ?>