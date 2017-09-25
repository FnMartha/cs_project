<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 6:12 PM
 */
 require_once __DIR__.'/../vendor/autoload.php';
// use App\Models\User;
// use App\Controllers\UserController;
// use App\Models\House;
// use App\Controllers\HouseController;
// function testCreateUser(){
//     $user = new User();
//     $user->setUsername("test_username".rand(0, 100));
//     $user->setEmail("mail@test.com");
//     $user->setPassword("secrete");
//     $user->setPhoneNumber("+338499494");
//     $user->setAccountType("client");
//     $userCtrl = new UserController();
//     $created = $userCtrl->create($user);
//     if($created === true){
//         echo "USER ACCOUNT CREATED";
//     }else{
//         echo "ERROR USER ACCOUNT NOT CREATED";
//     }
// }
//
// function testGetUsers(){
//     $users = UserController::all();
//     print_r($users);
// }
//
// function testCreateHouse($i){
//
//     $house = new House();
//     $house->setOwnedBy($i);
//     $house->setHouseCategory("1_BEDROOM");
//     $house->setLocation("NGONG");
//     $house->setMinPrice(2000);
//     $house->setMaxPrice(8000);
//     $house->setImageOne(null);
//     $house->setImageTwo(null);
//     $house->setImageThree(null);
//     $house->setImageFour(null);
//     $house->setImageFive(null);
//     $house->setStatus("available");
//     $houseCtrl =  new HouseController();
//
//     $created = $houseCtrl->create($house);
//
//     if ($created === true){
//         echo "HOUSE CREATED";
//     }else{
//         echo "error in creating house";
//     }
// }
//
//
//
// for ($i=0; $i<=4;$i++ ){
//     testCreateHouse($i);
// }
//
// testGetUsers();