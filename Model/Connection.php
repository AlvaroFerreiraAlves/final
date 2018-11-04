<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/11/18
 * Time: 11:30
 */

class Connection
{
    private static $instance = null;

    public static function connectsDb(){
        if(!isset(self::$instance)){
            try{
                self::$instance = new PDO('mysql:host=localhost; dbname=teste','root','password');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException  $e){
                echo 'Erro'. $e->getMessage();
            }
        }

        return self::$instance;
    }

}