<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:38 PM
 */

namespace App\AppInterface;


use App\Models\User;

/**
 * Interface UserInterface
 * @package App\AppInterface
 */
interface UserInterface extends BaseInterface
{
    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user);

    /**
     * @param User $user
     * @param $id
     * @return bool
     */
    public function update(User $user, $id);
}