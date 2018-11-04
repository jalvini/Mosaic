<?php
/**
 * User: Joseph Alvini
 * Date: 11/01/18
 * Time: 11:45 PM
 */

class OrderFactory
{
    public static function create($orderItem, $orderPrice, $firstName, $lastName){
        return new Order($orderItem, $orderPrice, $firstName, $lastName);
    }
}
