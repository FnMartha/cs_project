<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:33 PM
 */

namespace App\Controllers;


use App\AppInterface\UserInterface;
use App\DBManager\DB;
use App\Models\User;

class UserController implements UserInterface
{
    public function create(User $user)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO users(username, email, password, account_type, phone_number) 
                    VALUES (:username, :email, :password, :account_type, :phone_number)");

            $stmt->bindValue(":username", $user->getUsername());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":account_type", $user->getAccountType());
            $stmt->bindValue(":phone_number", $user->getPhoneNumber());
            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. User Account not Created"];
            }


        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public function update(User $user, $id)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("UPDATE users SET username=:username, 
                                                    email=:email, 
                                                    password=:password,
                                                     account_type=:account_type,
                                                     phone_number=:phone_number
                                                     WHERE id=:id"
            );

            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":username", $user->getUsername());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":account_type", $user->getAccountType());
            $stmt->bindValue(":phone_number", $user->getPhoneNumber());
            $created = $stmt->execute();
            if ($created) {
                return true;
            } else {
                return ['error' => "Error Occurred. User Account not Created"];
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
            $stmt = $conn->prepare("SELECT * FROM users WHERE id:=id");
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
            $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindParam(":id", $id);
            if($stmt->execute()){
                return true;
            }else{
                return [
                    "error" => "Error! Failed to delete the account try again later"
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
            $stmt = $conn->prepare("SELECT * FROM users WHERE 1");

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


}