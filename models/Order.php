<?php
/**
 * Author: Joseph Alvini
 * Date: 10/30/18
 * Time: 08:29 AM
 */

class Order extends Database
{
    protected $orderItem;
    protected $orderPrice;
    protected $firstName;
    protected $lastName;

    public function setOrder($orderItem, $orderPrice, $firstName, $lastName){
        $this->orderItem = $orderItem;
        $this->orderPrice = $orderPrice;
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        $stmt = $this->Connect()->prepare("INSERT INTO Orders (Item, Price, FirstName, LastName) VALUES (?,?,?,?)");
        $stmt->execute([$this->orderItem, $this->orderPrice, $this->firstName, $this->lastName]);
    }
}