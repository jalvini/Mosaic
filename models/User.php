<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 05:44 PM
 */

class User  extends UserParent implements UserInterface
{
    public function __construct(){
        $this->user = new UserParent();
    }

    public function setFirstName($firstName){
        $this->user->firstName = $firstName;
    }

    public function setLastName($lastName){
        $this->user->lastName = $lastName;
    }

    public function setCompany($company){
        $this->user->company = $company;
    }

    public function setAddress($address){
        $this->user->address = $address;
    }

    public function setCity($city){
        $this->user->city = $city;
    }

    public function setState($state){
        $this->user->state = $state;
    }

    public function setZip($zip){
        $this->user->zip = $zip;
    }
    public function storeUser(){
        $stmt = Database::getInstance()->prepare("INSERT INTO users (FirstName, LastName, Company, Address, City, State, Zip) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$this->user->firstName, $this->user->lastName, $this->user->company, $this->user->address, $this->user->city, $this->user->state, $this->user->zip]);
    }

    public function getUser(){
        return $this->user;
    }
}