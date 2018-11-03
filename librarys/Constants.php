<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 07:42 PM
 */

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

const DS = DIRECTORY_SEPARATOR;

const MODELS = [
    'USER' => APPLICATION_PATH . DS .'models'. DS .'User.php',
    'CREDITCARD' => APPLICATION_PATH . DS .'models'. DS .'CreditCard.php',
    'SESSION' => APPLICATION_PATH . DS .'models'. DS .'Session.php',
    'ORDER' => APPLICATION_PATH . DS .'models'. DS .'Order.php'

    ];

const FACTORYS = [
    'USER' => APPLICATION_PATH . DS .'factorys'. DS .'UserFactory.php',
    'CREDITCARD' => APPLICATION_PATH . DS .'factorys'. DS .'CreditCardFactory.php',
    'ORDER' => APPLICATION_PATH . DS .'factorys'. DS .'OrderFactory.php'
    ];

const CONTROLLERS = [
    'FORM' => APPLICATION_PATH . DS . 'controllers'. DS .'FormController.php',
    'USERINFO' => APPLICATION_PATH . DS . 'controllers'. DS .'UserInfoController.php'
    ];

const ABSTRACTS = [
    'PERSON' => APPLICATION_PATH . DS . 'abstracts'. DS .'Person.php'
    ];

const VIEWS = [
    'FORM' => APPLICATION_PATH . DS .'views'. DS .'Form.php',
    'USERINFO' => APPLICATION_PATH . DS .'views'. DS .'UserInfo.php'
    ];

const SINGLETONS = [
    'DATABASE' => APPLICATION_PATH . DS . 'singletons'. DS .'Database.php'
    ];

const DATABASE = APPLICATION_PATH . DS .'librarys'. DS .'Database.php';

const SESSION = APPLICATION_PATH . DS . 'models'. DS .'Session.php';

const INCLUDES = APPLICATION_PATH . DS . 'includes' . DS;

const HEADER = INCLUDES . 'header.php';

const FOOTER = INCLUDES . 'footer.php';

const TAGS = INCLUDES . 'tags.php';

const ENCRYPTIONKEY = 'THIS*would*N0T*b3*THe*B3ST*encyption*KeY@sItE*';

const ENCRYPTIONIV = 'TEstingIV@1';