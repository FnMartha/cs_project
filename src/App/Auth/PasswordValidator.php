<?php


namespace App\Auth;


trait PasswordValidator
{

    public static function passwordValidator($password, $length = 8)
    {
        $isValid = true;
        if (strlen($password) < $length) {
            $isValid = false;
        }
        if (!preg_match("#[0-9]+#", $password)) {
            $isValid = false;
        }
        if (!preg_match("#[a-z]+#", $password)) {
            $isValid = false;
        }
        if (!preg_match("#[A-Z]+#", $password)) {
            $isValid = false;
        }
        if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)) {
            $isValid = false;
        }
        return $isValid;
    }
}