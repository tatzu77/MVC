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
        public static function select($primary_value){
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst($table_name);
            $primary_key = static::$primary;
            $sql = "SELECT * from ".$table_name." WHERE ".$primary_key."=:cle_primaire";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "cle_primaire" => $primary_value,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_result = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_result)){
                return false;
            }
            return $tab_result[0];
        }
        public static function delete($primary_value){
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst($table_name);
            $primary_key = static::$primary;
            $sql = "DELETE FROM " . $table_name ." WHERE " .$primary_key. "=:valeur";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("valeur" => $primary_value);
            $req_prep->execute($values);
        }
        public static function update($data){
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst($table_name);
            $primary_key = static::$primary;
            $sql = "UPDATE ".$table_name." SET ";
            foreach ($data as $cle => $value){
                if($cle!=$primary_key){

                    $sql .= $cle . "=:" . $cle . ",";
                }
            }
            $sql = rtrim( $sql, ",")." WHERE " . $primary_key . "=:" . $primary_key . ";";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
        }
        public static function save($data){
            $table_name = static::$object;
            $sql = "INSERT INTO " . $table_name . " VALUES ("; 
            foreach( $data as $cle => $value){
                $sql .= ":".$cle.", ";
            }
            $sql = rtrim($sql, ", ").")";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
        }
    
    }

    Model::Init();
?>