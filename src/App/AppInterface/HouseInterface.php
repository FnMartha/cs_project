<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:37 PM
 */

namespace App\AppInterface;


use App\Models\House;

interface HouseInterface extends BaseInterface
{
    public function create(House $house);
    public function update(House $house, $id);
}