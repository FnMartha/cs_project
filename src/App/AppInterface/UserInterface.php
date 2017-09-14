<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:38 PM
 */

namespace App\AppInterface;


use App\Models\User;

interface UserInterface
{
    public function create(User $user);
    public function update(User $user, $id);
}