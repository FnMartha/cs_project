<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:31 PM
 */

namespace App\Models;


class House
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $ownedBy;
    /**
     * @var string
     */
    private $houseCategory;
    /**
     * @var string
     */
    private $location;
    /**
     * @var float
     */
    private $minPrice;
    /**
     * @var float
     */
    private $maxPrice;
    /**
     * @var  string
     */
    private $imageOne;
    /**
     * @var string
     */
    private $imageTwo;
    /**
     * @var string
     */
    private $imageThree;
    /**
     * @var string
     */
    private $imageFour;
    /**
     * @var string
     */
    private $imageFive;
    /**
     * @var string
     */
    private $status;
    /**
     * @var float
     */
    private $lat;
    /**
     * @var float
     */
    private $lng;
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
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }

    /**
     * @param int $ownedBy
     */
    public function setOwnedBy($ownedBy)
    {
        $this->ownedBy = $ownedBy;
    }

    /**
     * @return string
     */
    public function getHouseCategory()
    {
        return $this->houseCategory;
    }

    /**
     * @param string $houseCategory
     */
    public function setHouseCategory($houseCategory)
    {
        $this->houseCategory = $houseCategory;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return float
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param float $minPrice
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return float
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param float $maxPrice
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return string
     */
    public function getImageOne()
    {
        return $this->imageOne;
    }

    /**
     * @param string $imageOne
     */
    public function setImageOne($imageOne)
    {
        $this->imageOne = $imageOne;
    }

    /**
     * @return string
     */
    public function getImageTwo()
    {
        return $this->imageTwo;
    }

    /**
     * @param string $imageTwo
     */
    public function setImageTwo($imageTwo)
    {
        $this->imageTwo = $imageTwo;
    }

    /**
     * @return string
     */
    public function getImageThree()
    {
        return $this->imageThree;
    }

    /**
     * @param string $imageThree
     */
    public function setImageThree($imageThree)
    {
        $this->imageThree = $imageThree;
    }

    /**
     * @return string
     */
    public function getImageFour()
    {
        return $this->imageFour;
    }

    /**
     * @param string $imageFour
     */
    public function setImageFour($imageFour)
    {
        $this->imageFour = $imageFour;
    }

    /**
     * @return string
     */
    public function getImageFive()
    {
        return $this->imageFive;
    }

    /**
     * @param string $imageFive
     */
    public function setImageFive($imageFive)
    {
        $this->imageFive = $imageFive;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }



}