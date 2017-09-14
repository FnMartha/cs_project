<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:39 PM
 */

namespace App\AppInterface;


use App\Models\HouseBooking;

interface HouseBookingInterface extends BaseInterface
{

    public function create(HouseBooking $booking);
    public function update(HouseBooking $booking, $id);
}