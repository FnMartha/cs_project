<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/13/17
 * Time: 3:21 PM
 */

namespace App\Models;


class Payment
{
    private $id;
    private $txnId;
    private $mpesaCode;
    private $houseId;
    private $amount;
    private $phoneNumber;
    private $status;
    private $createdAt;
    private $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * @param mixed $txnId
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;
    }

    /**
     * @return mixed
     */
    public function getMpesaCode()
    {
        return $this->mpesaCode;
    }

    /**
     * @param mixed $mpesaCode
     */
    public function setMpesaCode($mpesaCode)
    {
        $this->mpesaCode = $mpesaCode;
    }

    /**
     * @return mixed
     */
    public function getHouseId()
    {
        return $this->houseId;
    }

    /**
     * @param mixed $houseId
     */
    public function setHouseId($houseId)
    {
        $this->houseId = $houseId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}