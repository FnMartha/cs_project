<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 6:12 PM
 */
 require_once __DIR__.'/../vendor/autoload.php';
 use App\Models\User;
 use App\Controllers\UserController;
 function testInsertUser(){
     $user = new User();
     $user->setUsername("test_username");
     $user->setEmail("mail@test.com");
     $user->setPassword("secrete");
     $user->setPhoneNumber("+338499494");
     $user->setAccountType("client");
     $userCtrl = new UserController();
     $created = $userCtrl->create($user);
     if($created === true){
         echo "USER ACCOUNT CREATED";
     }else{
         echo "ERROR USER ACCOUNT NOT CREATED";
     }
 }
 testInsertUser();