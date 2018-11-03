<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 07:39 PM
 */

//GET CONSTANTS
require_once ('../librarys/Constants.php');

//GET DATABASE
require_once ( SINGLETONS['DATABASE'] );

//GET SESSION
require_once ( SESSION );

//GET MODEL, CONTROLLER FACTORYS AND ABSTRACTS
require_once ( ABSTRACTS['PERSON'] );
require_once ( MODELS['USER'] );
require_once ( MODELS['CREDITCARD'] );
require_once ( MODELS['ORDER'] );
require_once ( MODELS['SESSION'] );
require_once( FACTORYS['USER'] );
require_once( FACTORYS['CREDITCARD'] );
require_once( FACTORYS['ORDER'] );
require_once  ( CONTROLLERS['FORM'] );

//CALL MAIN CONTROLLER METHOD
FormPage::main();

//CONTROLLER IS CREATED
$controller = new FormPage();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $controller->Submit(
       // WHILE THIS IS A SIMPLE WAY I KNOW THAT SANITIZING TAKES A LOT MORE. I WILL ADD TO THIS LATER
        htmlspecialchars($_POST['cardNum']),
        htmlspecialchars($_POST['name']),
        htmlspecialchars($_POST['cardCode']),
        htmlspecialchars($_POST['expiration']),
        htmlspecialchars($_POST['fname']),
        htmlspecialchars($_POST['lname']),
        htmlspecialchars($_POST['company']),
        htmlspecialchars($_POST['addy1']),
        htmlspecialchars($_POST['city']),
        htmlspecialchars($_POST['state']),
        htmlspecialchars($_POST['zip']),
        htmlspecialchars($_POST['amount'])
        );

}

//GET VIEW
require_once  ( VIEWS['FORM'] );