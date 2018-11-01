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

//GET SESSION
require_once ( SESSION );

//GET MODEL, CONTROLLER
require_once ( MODELS['SESSION'] );
require_once  ( CONTROLLERS['USERINFO'] );

//CONTROLLER IS CREATED
$controller = new UserInfoController();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller->Submit($_POST['firstName'], $_POST['lastName']);
}else{
    session_start();
}

//GET VIEW
require_once  ( VIEWS['USERINFO'] );