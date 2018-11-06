<?php
/**
 * Created by PhpStorm.
 * User: Joseph Alvini
 * Date: 11/05/18
 * Time: 02:58 PM
 */

class UserBuilder
{
    public static function create(UserInterface $set, $first, $last, $company, $address, $city, $state, $zip){
        $set->setFirstName($first);
        $set->setLastName($last);
        $set->setCompany($company);
        $set->setAddress($address);
        $set->setCity($city);
        $set->setState($state);
        $set->setZip($zip);
        $set->storeUser();
        return $set->getUser();
    }

    public static function read(){

    }
}