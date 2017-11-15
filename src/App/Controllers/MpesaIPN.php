<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/15/17
 * Time: 2:59 PM
 */

namespace App\Controllers;


use App\Models\Payment;

class MpesaIPN
{
    public function run(){
       $data = json_decode(file_get_contents('php://input'), true);
       if (!empty($data)){
           $status = $data['status'];
           if (strtolower($status) == 'success'){
               //transaction was completed successfull

               $payment = new Payment();
               $payment->setAmount($data['value']);
               $payment->setPhoneNumber($data['source']);
               $payment->setHouseId($data['requestMetadata']['house_id']);
               $payment->setTxnId($data['transactionId']);
               $payment->setStatus('paid');
               $payment->setMpesaCode("N/A");

               // check if the transaction was created before
               $paymentId = PaymentController::getId($data['transactionId']);
               if (!isset($paymentId['error']) && sizeof($paymentId > 0)){
                   PaymentController::completeTxn($data['transactionId']);
                   return true;
               }else{
                   //payment does not exist in the database so we create a new entry
                   $paymentCtrl = new PaymentController();
                   $paymentCtrl->create($payment);
                   return true;
               }
           }
       }
       return false;
    }

}