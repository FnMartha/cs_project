<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/15/17
 * Time: 10:53 AM
 */

namespace App\Controllers;


class Mpesa
{
    private $_apiUsername;
    private $_apiKey;
    private $_productName;
    private $_currencyCode = 'KES';
    private $_mode;

    public function __construct($mode = "live")
    {
        if ($mode == "sandbox") {
            $this->_apiKey = "some api prod";
            $this->_apiUsername = "username prod";
            $this->_productName = 'Product';
            $this->_mode = $mode;
        } else {
            $this->_apiKey = "Some sandbox api key";
            $this->_apiUsername = "sandbox username";
            $this->_productName = 'Product';
            $this->_mode = $mode;
        }

    }

    public function checkout(array $postData)
    {
        $metadata = array(
            "house_id" => $postData['houseId'],
            "action_type"=>"booking"
        );
        $gateway = new AfricasTalkingGateway($this->_apiUsername, $this->_apiKey, $this->_mode);
        try {

            $transactionId = $gateway->initiateMobilePaymentCheckout(
                $this->_productName,
                $postData['phone_number'],
                $this->_currencyCode,
                $postData['amount'],
                $metadata
            );

            return $transactionId;

        } catch (AfricasTalkingGatewayException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }
}