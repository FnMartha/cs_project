<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 7/16/17
 * Time: 5:32 PM
 */

require_once __DIR__.'/../../vendor/autoload.php';

use App\Controller\UserController;
use App\Controller\ReferralTreeController;
use App\Services\SendEmail;

$vendorEmail = "info@asilie-learning.co.ke";
$data = json_decode(file_get_contents('php://input'), true);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $approved = UserController::approveMpesaCode($data['id']);
    if($approved === true ){

        $user = UserController::getUserByPhone($data['phoneNumber']);
        $txn = UserController::getMpesaTxn($data['id']);


        if (!empty($txn['referredBy'])) {
            $refTree = ReferralTreeController::createReferralTree($user['id'], $user['userReferralCode'], $txn['referredBy']);
        } elseif (empty($txn['referredBy'])) {
            $refTree = ReferralTreeController::createReferralTree($user['id'], $user['userReferralCode']);
        }
        ReferralTreeController::createReferralCodeEarning($user['id'], $user['userReferralCode']);
        ReferralTreeController::createReferralCodeCounts($user['userReferralCode']);
        $updated = ReferralTreeController::updateReferralTree($user['userReferralCode']);
        ReferralTreeController::debitAccounts($user['userReferralCode']);
        ReferralTreeController::updateTotalEarning();
        UserController::updatePaymentStatus($user['id']);
        UserController::approveAccount($user['id']);


        print_r(json_encode(
            array(
                "statusCode"=> 200,
                "message"=>"Payment Approved Successfully"
            )
        ));

        global $vendorEmail;
        $mail = new SendEmail($user['email'], $vendorEmail);
        $mail->setSubject("Asili Africa Payment Approval");
        $mail->setMessage("Your Payment Has been successfully processed. You can now access your account");
        $mail->setVendor("Asili Elearning");
        $mail->send();

    }elseif (isset($approved['error'])){
        print_r(json_encode(
            array(
                "statusCode"=> 500,
                "message"=> $approved['error']
            )
        ));
    } else{
        print_r(json_encode(
            array(
                "statusCode"=> 500,
                "message"=> "Internal Server error occurred.."
            )
        ));
    }
}