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
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $clientId;
    /**
     * @var float
     */
    private $amountPaid;
    /**
     * @var float
     */
    private $amountDue;
    /**
     * @var int
     */
    private $houseId;
    /**
     * @var \DateTime
     */
    private $dateBooked;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return float
     */
    public function getAmountPaid()
    {
        return $this->amountPaid;
    }

    /**
     * @param float $amountPaid
     */
    public function setAmountPaid($amountPaid)
    {
        $this->amountPaid = $amountPaid;
    }

    /**
     * @return float
     */
    public function getAmountDue()
    {
        return $this->amountDue;
    }

    /**
     * @param float $amountDue
     */
    public function setAmountDue($amountDue)
    {
        $this->amountDue = $amountDue;
    }

    /**
     * @return int
     */
    public function getHouseId()
    {
        return $this->houseId;
    }

    /**
     * @param int $houseId
     */
    public function setHouseId($houseId)
    {
        $this->houseId = $houseId;
    }

    /**
     * @return \DateTime
     */
    public function getDateBooked()
    {
        return $this->dateBooked;
    }

    /**
     * @param \DateTime $dateBooked
     */
    public function setDateBooked($dateBooked)
    {
        $this->dateBooked = $dateBooked;
    }



}