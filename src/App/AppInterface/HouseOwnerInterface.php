<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:39 PM
 */

namespace App\AppInterface;


use App\Models\HouseOwner;

/**
 * Interface HouseOwnerInterface
 * @package App\AppInterface
 */
interface HouseOwnerInterface extends BaseInterface
{
    /**
     * @param HouseOwner $houseOwner
     * @return bool
     */
    public function create(HouseOwner $houseOwner);

    /**
     * @param HouseOwner $houseOwner
     * @param $id
     * @return boolean
     */
    public function update(HouseOwner $houseOwner, $id);
}