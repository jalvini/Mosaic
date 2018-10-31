<?php
/**
 * Created by PhpStorm.
 * User: Joseph Alvini
 * Date: 10/29/18
 * Time: 07:42 PM
 */

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

const DS = DIRECTORY_SEPARATOR;

const MODELS = [
    'USER' => APPLICATION_PATH . DS .'models'. DS .'User.php',
    'CREDITCARD' => APPLICATION_PATH . DS .'models'. DS .'CreditCard.php',
    'SESSION' => APPLICATION_PATH . DS .'models'. DS .'Session.php'
    ];

const CONTROLLERS = [
    'FORM' => APPLICATION_PATH . DS . 'controllers'. DS .'FormController.php',
    'USERINFO' => APPLICATION_PATH . DS . 'controllers'. DS .'UserInfoController.php'
    ];

const VIEWS = [
    'FORM' => APPLICATION_PATH . DS .'views'. DS .'Form.php',
    'USERINFO' => APPLICATION_PATH . DS .'views'. DS .'UserInfo.php'
    ];

const DATABASE = APPLICATION_PATH . DS .'librarys'. DS .'Database.php';

const SESSION = APPLICATION_PATH . DS . 'models'. DS .'Session.php';