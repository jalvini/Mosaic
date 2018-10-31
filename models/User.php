<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 05:44 PM
 */

class User extends Database
{
    public $firstName;
    public $lastName;
    public $company;
    public $address;
    public $city;
    public $state;
    public $zip;

    public function setUser($firstName, $lastName, $company, $address, $city, $state, $zip){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;

        $stmt = $this->Connect()->prepare("INSERT INTO Orders (FirstName, LastName, Company, Address, City, State, Zip) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$this->firstName, $this->lastName, $this->company, $this->address, $this->city, $this->state, $this->zip]);
    }

}