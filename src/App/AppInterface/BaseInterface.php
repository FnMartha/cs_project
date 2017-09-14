<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:36 PM
 */

namespace App\AppInterface;


interface BaseInterface
{
 public static function getId($id);
 public static function delete($id);
 public static function all();

}