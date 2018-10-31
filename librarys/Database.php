<?php
/**
 * Author: Joseph Alvini
 * Date: 10/29/18
 * Time: 06:55 PM
 */
require_once('Db.Config.php');

class Database
{
    protected $con;

    protected static function Connect(){
        try {
            $dsn = 'mysql:host=' . SERVERNAME . ';dbname=' . DBNAME . ';';
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $con = new PDO( $dsn, DBUSERNAME, DBPASSWORD , $opt);

            return $con;
        }
        catch(PDOException $err)
        {
            echo "Connection Failed: " . $err->getMessage();
            return false;
        }
    }
}