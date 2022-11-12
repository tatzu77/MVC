<?php
    class Model {
        public static $pdo;

        public static function Init() {
            require File::build_path(["Config","Conf.php"]);

            $hostname = Conf::getHostname();
            $database_name = Conf::getDatabase();
            $login = Conf::getLogin();
            $password = Conf::getPassword();
            
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public static function selectAll()
        {
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst($table_name);
            $rep = Model::$pdo->query("SELECT * FROM $table_name");
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            return ($rep->fetchAll());
        }
    
    }

    Model::Init();
?>