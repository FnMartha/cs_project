<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:39 PM
 */

namespace App\AppInterface;


use App\Models\HouseOwner;

interface HouseOwnerInterface
{
    public function create(HouseOwner $houseOwner);
    public function update(HouseOwner $houseOwner, $id);
}