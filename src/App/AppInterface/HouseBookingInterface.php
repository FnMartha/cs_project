<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:39 PM
 */

namespace App\AppInterface;


use App\Models\HouseBooking;

/**
 * Interface HouseBookingInterface
 * @package App\AppInterface
 */
interface HouseBookingInterface extends BaseInterface
{

    /**
     * @param HouseBooking $booking
     * @return bool
     */
    public function create(HouseBooking $booking);

    /**
     * @param HouseBooking $booking
     * @param $id
     * @return bool
     */
    public function update(HouseBooking $booking, $id);
}