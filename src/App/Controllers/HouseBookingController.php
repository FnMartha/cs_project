<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:34 PM
 */

namespace App\Controllers;


use App\AppInterface\HouseBookingInterface;
use App\DBManager\DB;
use App\Models\HouseBooking;

class HouseBookingController implements HouseBookingInterface
{
    public function create(HouseBooking $booking)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO house_bookings(client_id, amount_paid, amount_due, house_id, date_booked) 
                    VALUES (:client_id, :amount_paid, :amount_due, :house_id, :date_booked)");

            $stmt->bindValue(":client_id", $booking->getClientId());
            $stmt->bindValue(":amount_paid", $booking->getAmountPaid());
            $stmt->bindValue(":amount_due", $booking->getAmountDue());
            $stmt->bindValue(":house_id", $booking->getHouseId());
            $stmt->bindValue(":date_booked", $booking->getDateBooked());

            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. House Booking No Saved"];
            }


        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public function update(HouseBooking $booking, $id)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("UPDATE house_bookings SET 
                                client_id=:client_id,
                                amount_paid=:amount_paid,
                                amount_due=:amount_due, 
                                house_id=:house_id,
                                date_booked=:date_booked
                                WHERE id=:id
                                ");

            $stmt->bindParam(":id", $id);
            $stmt->bindValue(":client_id", $booking->getClientId());
            $stmt->bindValue(":amount_paid", $booking->getAmountPaid());
            $stmt->bindValue(":amount_due", $booking->getAmountDue());
            $stmt->bindValue(":house_id", $booking->getHouseId());
            $stmt->bindValue(":date_booked", $booking->getDateBooked());

            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. House Booking No Saved"];
            }


        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT * FROM house_bookings WHERE id:=id");
            $stmt->bindParam(":id", $id);
            if($stmt->execute() && $stmt->rowCount() == 1){
                return $stmt->fetchAll();
            }else{
                return [
                    "error"=> "No Data found"
                ];
            }
        }catch (\PDOException $e){
            return [
                "error"=>$e->getMessage()
            ];
        }
    }

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("DELETE FROM house_bookings WHERE id=:id");
            $stmt->bindParam(":id", $id);
            if($stmt->execute()){
                return true;
            }else{
                return [
                    "error" => "Error! Failed to delete the house  try again later"
                ];

            }
        }catch (\PDOException $e){
            return [
                "error"=>$e->getMessage()
            ];
        }
    }


    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT * FROM house_bookings WHERE 1");

            if($stmt->execute() && $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return [
                    "error"=> "No Data found"
                ];
            }
        }catch (\PDOException $e){
            return [
                "error"=>$e->getMessage()
            ];
        }
    }


}