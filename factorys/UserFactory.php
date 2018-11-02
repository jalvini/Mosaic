<?php
/**
 * User: Joseph Alvini
 * Date: 11/01/18
 * Time: 11:22 PM
 */
class UserFactory
{
    public static function create($firstName, $lastName, $company, $address, $city, $state, $zip){
     return new User($firstName, $lastName, $company, $address, $city, $state, $zip);
    }
}