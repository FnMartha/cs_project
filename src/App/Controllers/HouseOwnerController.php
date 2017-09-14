<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:34 PM
 */

namespace App\Controllers;


use App\AppInterface\HouseOwnerInterface;
use App\Models\HouseOwner;
use App\DBManager\DB;

class HouseOwnerController implements HouseOwnerInterface
{
    public function create(HouseOwner $houseOwner)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO house_owners(user_id, name, email, phone_number, national_id) 
                    VALUES (:user_id, :name, :email, :phone_number, :national_id)");

            $stmt->bindValue(":user_id", $houseOwner->getUserId());
            $stmt->bindValue(":name", $houseOwner->getName());
            $stmt->bindValue(":email", $houseOwner->getEmail());
            $stmt->bindValue(":phone_number", $houseOwner->getPhoneNumber());
            $stmt->bindValue(":national_id", $houseOwner->getNationalId());
            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. House Owner Not Registered"];
            }


        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public function update(HouseOwner $houseOwner, $id)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("UPDATE house_owners SET user_id=:user_id, name=:name, email=:email, phone_number=:phone_number, national_id=:national_id
                                    WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindValue(":user_id", $houseOwner->getUserId());
            $stmt->bindValue(":name", $houseOwner->getName());
            $stmt->bindValue(":email", $houseOwner->getEmail());
            $stmt->bindValue(":phone_number", $houseOwner->getPhoneNumber());
            $stmt->bindValue(":national_id", $houseOwner->getNationalId());
            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. House Owner Not Registered"];
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
            $stmt = $conn->prepare("SELECT * FROM house_owners WHERE id:=id");
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
            $stmt = $conn->prepare("DELETE FROM house_owners WHERE id=:id");
            $stmt->bindParam(":id", $id);
            if($stmt->execute()){
                return true;
            }else{
                return [
                    "error" => "Error! Failed to delete the house owner try again later"
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
            $stmt = $conn->prepare("SELECT * FROM house_owners WHERE 1");

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