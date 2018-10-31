<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 05:43 PM
 */

class FormPage
{
    public $message;

    public function __construct()
    {
        //WHEN USER COMES ON TO PAG CHECK IF USER FILLED OUT USER INFO IF NOT SEND THEM BACK
        Session::Start();
        if (session_status() == PHP_SESSION_ACTIVE) {
            //echo Session::SessionFirstName();
        } else {
            header('Location: /CreditCardInfo');
        }
    }

    public function Submit($ccNumber, $cardOwner, $cardCode, $exMo, $exYr, $first, $last, $comp, $add, $city, $state, $zip, $price)
    {
        $creditCard = new CreditCard();
        $user = new User();
        $order = new Order();
        $creditCard->getCCInfo($this->Encrypt($ccNumber));
        $item = 'Sample Item';

        //SUBMIT FORM AND CHECK FOR POTENTIAL ERRORS. THIS IS A VERY QUICKLY PUT TOGETHER ERROR CHECKER. IT COULD BE BETTER
        if (strlen($ccNumber) !== 16 || $cardOwner == NULL || strlen($cardCode) !== 3 || strlen($exMo) !== 2 || strlen($exYr) !== 2) {
            $this->message = 'You Have Entered Invalid Credit Card Information. Please Try Re-Entering Your Info';
        } else {
            if ($creditCard->onFile == NULL) {
                $user->setUser($first, $last, $comp, $add, $city, $state, $zip);
                $order->setOrder($item, $price, $first, $last);
                $creditCard->setCCInfo($this->Encrypt($ccNumber), $cardOwner, $cardCode, $exMo, $exYr);
                $this->message = 'Your Order Has Been Placed';
            } else {
                $this->message = 'This Credit Card Is Already On File. Please Login!';
            }
        }
        return $this->message;
    }
    //NOT EVEn CLOSE TO THE BEST WAY TO ENCRYPT BUT WILL WORK TO SHOW I KNOW THAT IT NEDS TO BE ENCRYPTED
    private function Encrypt($data){
        $encryptionMethod = "AES-256-CBC";
        $secretKey = ENCRYPTIONKEY;
        $secretIV = ENCRYPTIONIV;
        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIV), 0, 16);

            $output = openssl_encrypt($data, $encryptionMethod, $key, 0, $iv);
            $output = base64_encode($output);

        return $output;
    }

    private function Decrypt($data){
        $encryptionMethod = "AES-256-CBC";
        $secretKey = ENCRYPTIONKEY;
        $secretIV = ENCRYPTIONIV;
        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIV), 0, 16);
        $output = openssl_decrypt(base64_decode($data), $encryptionMethod, $key, 0, $iv);
        return($output);
    }
}