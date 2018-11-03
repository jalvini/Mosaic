<?php
/**
 * Author: Joseph Alvini
 * Date: 10/30/18
 * Time: 08:29 AM
 */

class Order extends Person
{
    protected $orderItem;
    protected $orderPrice;

    public function __construct($orderItem, $orderPrice, $firstName, $lastName){
        $this->orderItem = $orderItem;
        $this->orderPrice = $orderPrice;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function setOrder(){
        $stmt = Database::getInstance()->prepare("INSERT INTO Orders (Item, Price, FirstName, LastName) VALUES (?,?,?,?)");
        $stmt->execute([$this->orderItem, $this->orderPrice, $this->firstName, $this->lastName]);
    }
}
