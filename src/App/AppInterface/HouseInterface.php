<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:37 PM
 */

namespace App\AppInterface;


use App\Models\House;

/**
 * Interface HouseInterface
 * @package App\AppInterface
 */
interface HouseInterface extends BaseInterface
{
    /**
     * @param House $house
     * @return bool
     */
    public function create(House $house);

    /**
     * @param House $house
     * @param $id
     * @return bool
     */
    public function update(House $house, $id);
}