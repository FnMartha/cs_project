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
 private $id;
 private $ownedBy;
 private $houserCategory;
 private $location;
 private $minPrice;
 private $maxPrice;
 private $imageOne;
 private $imageTwo;
 private $imageThree;
 private $imageFour;
 private $imageFive;
 private $status;

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
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }

    /**
     * @param mixed $ownedBy
     */
    public function setOwnedBy($ownedBy)
    {
        $this->ownedBy = $ownedBy;
    }

    /**
     * @return mixed
     */
    public function getHouserCategory()
    {
        return $this->houserCategory;
    }

    /**
     * @param mixed $houserCategory
     */
    public function setHouserCategory($houserCategory)
    {
        $this->houserCategory = $houserCategory;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param mixed $maxPrice
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return mixed
     */
    public function getImageOne()
    {
        return $this->imageOne;
    }

    /**
     * @param mixed $imageOne
     */
    public function setImageOne($imageOne)
    {
        $this->imageOne = $imageOne;
    }

    /**
     * @return mixed
     */
    public function getImageTwo()
    {
        return $this->imageTwo;
    }

    /**
     * @param mixed $imageTwo
     */
    public function setImageTwo($imageTwo)
    {
        $this->imageTwo = $imageTwo;
    }

    /**
     * @return mixed
     */
    public function getImageThree()
    {
        return $this->imageThree;
    }

    /**
     * @param mixed $imageThree
     */
    public function setImageThree($imageThree)
    {
        $this->imageThree = $imageThree;
    }

    /**
     * @return mixed
     */
    public function getImageFour()
    {
        return $this->imageFour;
    }

    /**
     * @param mixed $imageFour
     */
    public function setImageFour($imageFour)
    {
        $this->imageFour = $imageFour;
    }

    /**
     * @return mixed
     */
    public function getImageFive()
    {
        return $this->imageFive;
    }

    /**
     * @param mixed $imageFive
     */
    public function setImageFive($imageFive)
    {
        $this->imageFive = $imageFive;
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


}