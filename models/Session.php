<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 07:32 PM
 */

class Session
{
    public static function Start(){
        session_start();
    }
    public static function SetSessionName($firstName, $lastName){
        $_SESSION["first_name"] = $firstName;
        $_SESSION["last_name"] = $lastName;
        print_r($_SESSION);
    }

    public static function SessionFirstName(){
        return $_SESSION["first_name"];
    }

    public static function SessionLastName(){
        return $_SESSION["last_name"];
    }
}