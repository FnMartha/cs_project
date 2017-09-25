<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:33 PM
 */

namespace App\Controllers;


use App\AppInterface\HouseInterface;
use App\DBManager\DB;
use App\Models\House;

/**
 * Class HouseController
 * @package App\Controllers
 */
class HouseController implements HouseInterface
{
    /**
     * @param House $house
     * @return array|bool
     */
    public function create(House $house)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO houses(owned_by, house_category, location, min_price, max_price, image1, image2, image3, image4, image5, status) 
                    VALUES (:owned_by, :house_category, :location, :min_price, :max_price, :image1, :image2, :image3, :image4, :image5, :status)");

            $stmt->bindValue(":owned_by", $house->getOwnedBy());
            $stmt->bindValue(":house_category", $house->getHouseCategory());
            $stmt->bindValue(":location", $house->getLocation());
            $stmt->bindValue(":min_price", $house->getMinPrice());
            $stmt->bindValue(":max_price", $house->getMaxPrice());
            $stmt->bindValue(":image1", $house->getImageOne());
            $stmt->bindValue(":image2", $house->getImageTwo());
            $stmt->bindValue(":image3", $house->getImageThree());
            $stmt->bindValue(":image4", $house->getImageFour());
            $stmt->bindValue(":image5", $house->getImageFive());
            $stmt->bindValue(":status", $house->getStatus());
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

    /**
     * @param House $house
     * @param $id
     * @return array|bool
     */
    public function update(House $house, $id)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("UPDATE houses SET owned_by=:owned_by, house_category=:house_category, location=:location, min_price=:min_price,
                                            max_price=:max_price, image1=:image1,
                                            image2=:image2, image3=:image3, 
                                            image4=:image4, image5=:image5, 
                                            status=:status WHERE id=:id "
            );
            $stmt->bindParam(":id",$id);
            $stmt->bindValue(":owned_by", $house->getOwnedBy());
            $stmt->bindValue(":house_category", $house->getHouseCategory());
            $stmt->bindValue(":location", $house->getLocation());
            $stmt->bindValue(":min_price", $house->getMinPrice());
            $stmt->bindValue(":max_price", $house->getMaxPrice());
            $stmt->bindValue(":image1", $house->getImageOne());
            $stmt->bindValue(":image2", $house->getImageTwo());
            $stmt->bindValue(":image3", $house->getImageThree());
            $stmt->bindValue(":image4", $house->getImageFour());
            $stmt->bindValue(":image5", $house->getImageFive());
            $stmt->bindValue(":status", $house->getStatus());
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

    /**
     * @param $id
     * @return array
     */
    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT * FROM houses WHERE id:=id");
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

    /**
     * @param $id
     * @return array|bool
     */
    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("DELETE FROM houses WHERE id=:id");
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

    /**
     * @return array
     */
    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT * FROM houses WHERE 1");

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