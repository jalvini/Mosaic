<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 07:39 PM
 */

//GET CONSTANTS
require_once ('../librarys/Constants.php');

//GET DATABASE
require_once ( DATABASE );

//GET DATABASE
require_once ( SESSION );

//GET MODEL, CONTROLLER
require_once ( MODELS['USER'] );
require_once ( MODELS['CREDITCARD'] );
require_once ( MODELS['SESSION'] );
require_once  ( CONTROLLERS['FORM'] );

//CONTROLLER IS CREATED
$controller = new FormPage();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $controller->Submit(
       // $_POST["amount"], ADD THIS TO ORDER
        $_POST['cardNum'],
        $_POST['cardOwner'],
        $_POST['cardCode'],
        $_POST['exMo'],
        $_POST['exYr'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['company'],
        $_POST['addy1'],
        $_POST['city'],
        $_POST['state'],
        $_POST['zip'],
        $_POST['amount']
        );

}

//GET VIEW
require_once  ( VIEWS['FORM'] );