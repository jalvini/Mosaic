<?php
/**
 * User: Joseph Alvini
 * Date: 11/02/18
 * Time: 11:48 PM
 */

require_once('../librarys/Db.Config.php');


class Database
{
    protected static $instance;
    protected function __construct() {}
    public static function getInstance() {
        if(empty(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=".SERVERNAME.';port='.PORT.';dbname='.DBNAME, DBUSERNAME, DBPASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::$instance->query('SET NAMES utf8');
                self::$instance->query('SET CHARACTER SET utf8');
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }
        return self::$instance;
    }
    public static function setCharsetEncoding() {
        if (self::$instance == null) {
            self::connect();
        }
        self::$instance->exec(
            "SET NAMES 'utf8';
			SET character_set_connection=utf8;
			SET character_set_client=utf8;
			SET character_set_results=utf8");
    }
}