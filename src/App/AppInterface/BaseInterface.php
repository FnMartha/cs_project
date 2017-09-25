<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:36 PM
 */

namespace App\AppInterface;


/**
 * Interface BaseInterface
 * @package App\AppInterface
 */
interface BaseInterface
{
    /**
     * @param $id
     * @return array
     */
    public static function getId($id);

    /**
     * @param $id
     * @return bool
     */
    public static function delete($id);

    /**
     * @return array
     */
    public static function all();

}