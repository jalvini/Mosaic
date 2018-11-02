<?php
/**
 * Author: Joseph Alvini
 * Date: 10/30/18
 * Time: 08:13 AM
 */

class CreditCard extends Database
{

    private $ccNumber; // CREDIT CARD NUMBER
    private $cardOwner; // NAME OF USER ALSO THIS WILL MAKE A GOOD JOIN POINT FOR THE USER TABLE
    private $cardCode; // CREDIT CARD EXPIRATION DATE
    private $expiration; // CREDIT CARD EXPIRATION MONTH
    public $onFile; // CHECKS IF CREDIT CARD IS ON FILE

    public function __construct($ccNumber, $cardOwner, $cardCode, $expiration){
        $this->ccNumber = $ccNumber;
        $this->cardOwner = $cardOwner;
        $this->cardCode = $cardCode;
        $this->expiration = $expiration;
    }

    public function setCCInfo(){
        $stmt = $this->Connect()->prepare("INSERT INTO creditcard (ccNumber, Owner, Code, expiration) VALUES (?,?,?,?)");
        $stmt->execute([$this->ccNumber, $this->cardOwner, $this->cardCode, $this->expiration]);
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