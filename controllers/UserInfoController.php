<?php
/**
 * Author: Joseph Alvini
 * Date: 10/31/18
 * Time: 12:46 AM
 */

class UserInfoController
{
    public function Submit($firstName = NULL, $lastName = NULL){
        if($firstName == NULL || $lastName == NULL){
            return $this->message = 'Please Enter Your First And Last Name';
        }else{
            Session::Start();
            Session::SetSessionName($_POST['firstName'], $_POST['lastName']);
             header('Location: /CreditCardInfo');
        }
    }
}