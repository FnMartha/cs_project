<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:33 PM
 */

namespace App\Controllers;


use App\AppInterface\AgentInterface;
use App\DBManager\DB;
use App\Models\Agent;

/**
 * Class AgentController
 * @package App\Controllers
 */
class AgentController implements AgentInterface
{

    /**
     * @param Agent $agent
     * @return array|bool
     */
    public function create(Agent $agent)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO agents(user_id, name, email, phone_number) 
                    VALUES (:user_id, :name, :email, :phone_number)");

            $stmt->bindValue(":user_id", $agent->getUserId());
            $stmt->bindValue(":name", $agent->getName());
            $stmt->bindValue(":email", $agent->getEmail());
            $stmt->bindValue(":phone_number", $agent->getPhoneNumber());


            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. Agent not registered"];
            }


        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    /**
     * @param Agent $agent
     * @param $id
     * @return array|bool
     */
    public function update(Agent $agent, $id)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("UPDATE agents SET user_id=:user_id, name=:name, email=:email, phone_number=:phone_number WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindValue(":user_id", $agent->getUserId());
            $stmt->bindValue(":name", $agent->getName());
            $stmt->bindValue(":email", $agent->getEmail());
            $stmt->bindValue(":phone_number", $agent->getPhoneNumber());


            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. Agent not registered"];
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
            $stmt = $conn->prepare("SELECT * FROM agents WHERE id:=id");
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
            $stmt = $conn->prepare("DELETE FROM agents WHERE id=:id");
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
            $stmt = $conn->prepare("SELECT * FROM agents WHERE id:=id");
            $stmt->bindParam(":id", $id);
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