<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/15/17
 * Time: 9:46 AM
 */

require_once __DIR__.'/../vendor/autoload.php';

$ipn = new \App\Controllers\MpesaIPN();
$ipn->run();