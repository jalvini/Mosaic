<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 05:43 PM
 */

class FormPage
{
    public $message;
    private $month;
    private $year;

    public static function Main()
    {
        //WHEN USER COMES ON TO PAGE CHECK IF USER FILLED OUT USER INFO IF NOT SEND THEM BACK
        Session::Start();
        if (!isset($_SESSION['first_name']) || !isset($_SESSION['last_name'])) {
            header('Location: /');
        }
    }

    public function Submit($ccNumber, $cardOwner, $cardCode, $expiration, $first, $last, $comp, $add, $city, $state, $zip, $price)
    {
        //SAMPLE ITEM NORMALLY WOULD BE INSIDE OF INPUT BUT FOR SIMPLICITY I ADDED IT HERE AS A VAR
        $item = 'Sample Item';

        //GET CURRENT MONTH AND YEAR
        $currentMonth = date("m");
        $currentYear = date("y");

        //CALL CREDIT CARD, USER AND ORDER INFO
        $creditCard = CreditCardFactory::create($this->Encrypt($ccNumber), $cardOwner, $cardCode, $expiration);
        $order = OrderFactory::create($item, $price, $first, $last);

        $creditCard->getCCInfo($this->Encrypt($ccNumber));
        $this->SplitDate($expiration);

        //IF MONTH OR YEAR COMES BACK LESS THAN CURRENT DATE RETURN CARD IS EXPIRED
        if($this->month < $currentMonth && $this->year <= $currentYear || $this->year < $currentYear){
            return $this->message = 'Card Is Expired';
        }

        //SUBMIT FORM AND CHECK FOR POTENTIAL ERRORS. THIS IS A VERY QUICKLY PUT TOGETHER ERROR CHECKER. IT COULD BE BETTER
        if (strlen($ccNumber) < 16 || $cardOwner == NULL || strlen($cardCode) !== 3) {
            $this->message = 'You Have Entered Invalid Credit Card Information. Please Try Re-Entering Your Info';
        } else {
            if ($creditCard->onFile == NULL) {
                $user = UserBuilder::create(new User,$first, $last, $comp, $add, $city, $state, $zip);
                var_dump($user);
                $order->setOrder();
                $creditCard->setCCInfo();
                $this->message = 'Your Order Has Been Placed';
            } else {
                $this->message = 'This Credit Card Is Already On File. Please Login!';
            }
        }
        return $this->message;
    }

    //NOT EVEN CLOSE TO THE BEST WAY TO ENCRYPT BUT WILL WORK TO SHOW I KNOW THAT IT NEDS TO BE ENCRYPTED
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

    private function SplitDate($date){
        $get = explode(' / ',$date);
        $this->month = $get[0];
        $this->year = $get[1];
    }
}