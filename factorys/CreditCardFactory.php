<?php
/**
 * Author: Joseph Alvini
 * Date: 11/01/18
 * Time: 11:41 PM
 */

class CreditCardFactory
{
    public static function create($ccNumber, $cardOwner, $cardCode, $expiration){
        return new CreditCard($ccNumber, $cardOwner, $cardCode, $expiration);
    }
}
