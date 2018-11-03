<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 05:44 PM
 */

class User extends Person
{
    public $company;
    public $address;
    public $city;
    public $state;
    public $zip;

    public function __construct($firstName, $lastName, $company, $address, $city, $state, $zip){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }

    public function setUser(){
        $stmt = Database::getInstance()->prepare("INSERT INTO users (FirstName, LastName, Company, Address, City, State, Zip) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$this->firstName, $this->lastName, $this->company, $this->address, $this->city, $this->state, $this->zip]);
    }

}