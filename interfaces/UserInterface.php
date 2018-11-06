<?php
/**
 * Author: Joseph Alvini
 * Date: 11/05/18
 * Time: 02:55 PM
 */

interface UserInterface
{
    public function setFirstName($firstName);
    public function setLastName($lastName);
    public function setCompany($company);
    public function setAddress($address);
    public function setCity($city);
    public function setState($state);
    public function setZip($zip);

    public function storeUser();
    public function getUser();

}