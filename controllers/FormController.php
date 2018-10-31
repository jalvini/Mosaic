<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 05:43 PM
 */

class FormPage {
    public $message;

    public function __construct(){
        //WHEN USER COMES ON TO PAG CHECK IF USER FILLED OUT USER INFO IF NOT SEND THEM BACK
        Session::Start();
        if(session_status() == PHP_SESSION_ACTIVE ){
            //echo Session::SessionFirstName();
        }
        else{
            header('Location: /CreditCardInfo');
        }
    }

    public function Submit($ccNumber, $cardOwner, $cardCode, $exMo, $exYr, $first, $last, $comp, $add, $city, $state, $zip, $price){
        $creditCard = new CreditCard();
        $user = new User();
        $order = new Order();
        $creditCard->getCCInfo($ccNumber);
        $item = 'Sample Item';

        //SUBMIT FORM AND CHECK FOR POTENTIAL ERRORS. THIS IS A VERY QUICKLY PUT TOGETHER ERROR CHECKER. IT COULD BE BETTER
        if(strlen($ccNumber) !== 16 || $cardOwner == NULL || strlen($cardCode) !== 3 || strlen($exMo) !== 2 || strlen($exYr) !== 2){
            $this->message = 'You Have Entered Invalid Credit Card Information. Please Try Re-Entering Your Info';
        }
        else {
            if ($creditCard->onFile == NULL) {
                $user->setUser($first, $last, $comp, $add, $city, $state, $zip);
                $order->setOrder($item, $price, $first, $last);
                $creditCard->setCCInfo($ccNumber, $cardOwner, $cardCode, $exMo, $exYr);
                $this->message = 'Your Order Has Been Placed';
            } else {
                $this->message = 'This Credit Card Is Already On File. Please Login!';
            }
        }
        return $this->message;
    }

}