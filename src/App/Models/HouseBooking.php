<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:32 PM
 */

namespace App\Models;


class HouseBooking
{
    private $id;
    private $clientId;
    private $amountPaid;
    private $amountDue;
    private $houseId;
    private $dateBooked;

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
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getAmountPaid()
    {
        return $this->amountPaid;
    }

    /**
     * @param mixed $amountPaid
     */
    public function setAmountPaid($amountPaid)
    {
        $this->amountPaid = $amountPaid;
    }

    /**
     * @return mixed
     */
    public function getAmountDue()
    {
        return $this->amountDue;
    }

    /**
     * @param mixed $amountDue
     */
    public function setAmountDue($amountDue)
    {
        $this->amountDue = $amountDue;
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
    public function getDateBooked()
    {
        return $this->dateBooked;
    }

    /**
     * @param mixed $dateBooked
     */
    public function setDateBooked($dateBooked)
    {
        $this->dateBooked = $dateBooked;
    }

}