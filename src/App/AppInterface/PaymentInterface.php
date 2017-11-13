<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/13/17
 * Time: 3:33 PM
 */

namespace App\AppInterface;


use App\Models\Payment;

interface PaymentInterface extends  BaseInterface
{
    public function create(Payment $payment);
    public function update(Payment $payment, $id);

}