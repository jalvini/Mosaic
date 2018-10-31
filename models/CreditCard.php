<?php
/**
 * Author: Joseph Alvini
 * Date: 10/30/18
 * Time: 08:13 AM
 */

class CreditCard extends Database
{

    private $ccNumber; //CREDIT CARD NUMBER
    private $cardOwner; // NAME OF USER ALSO THIS WILL MAKE A GOOD JOIN POINT FOR THE USER TABLE
    private $cardCode; // CREDIT CARD EXPIRATION DATE
    private $exMo; // CREDIT CARD EXPIRATION MONTH
    private $exYr; // CREDIT CARD EXPIRATION YEAR
    public $onFile;
    public function setCCInfo($ccNumber, $cardOwner, $cardCode, $exMo, $exYr){
        $this->ccNumber = $ccNumber;
        $this->cardOwner = $cardOwner;
        $this->cardCode = $cardCode;
        $this->exMo = $exMo;
        $this->exYr = $exYr;

        $stmt = $this->Connect()->prepare("INSERT INTO creditcard (ccNumber, Owner, Code, Month, Year) VALUES (?,?,?,?,?)");
        $stmt->execute([$this->ccNumber, $this->cardOwner, $this->cardCode, $this->exMo, $this->exYr]);
    }

    /**
     * ALL THIS FUNCTION DOES FOR NOW IS CHECK TO SEE IF A CREDIT CARD EXISTS I COULD EXTEND IT TO DO MORE
     * I WOULD ALSO INSTANTIATE THE VARIABLES INSIDE OF A CONSTRUCTOR IN A REAL WORLD APPLICATION
     */
    public function getCCInfo($ccNumber){
        $this->ccNumber = $ccNumber;
        $this->onFile = Null;
        $stmt = $this->Connect()->prepare("SELECT Owner FROM creditcard WHERE ccnumber =:condition");
        $stmt->bindParam(':condition', $this->ccNumber);
        $stmt->execute(array(':condition' => $this->ccNumber));
        $this->onFile = $stmt->fetch();
        if(!$this->onFile) return(NULL);
        return $this->onFile['Owner'];
    }
}