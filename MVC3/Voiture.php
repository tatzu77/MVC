<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Voiture</title>
</head>

<body>
    <?php

    require_once 'Model.php';
    class Voiture
    {
        private $marque;
        private $couleur;
        private $immatriculation;

        // un getter      
        public function getMarque()
        {
            return $this->marque;
        }
        public function getCouleur()
        {
            return $this->couleur;
        }
        public function getImmatriculation()
        {
            return $this->immatriculation;
        }

        // un setter 
        public function setMarque($marque2)
        {
            $this->marque = $marque2;
        }
        public function setCouleur($couleur2)
        {
            $this->couleur = $couleur2;
        }
        public function setImmatriculation($immatriculation2)
        {
            if (strlen($immatriculation2) <= 8) {
                $this->immatriculation = $immatriculation2;
            }
        }

        public static function getAllVoitures()
        {
            $rep = Model::$pdo->query('Select * FROM voiture;');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
            $tab_voit = $rep->fetchAll();

            return $tab_voit;
        }

        // un constructeur
        public function __construct($m = NULL, $c = NULL, $i = NULL)
        {
            if (!is_null($m) && !is_null($c) && !is_null($i)) {
                $this->marque = $m;
                $this->couleur = $c;
                $this->immatriculation = $i;
            }
        }


        // une methode d'affichage.
        public function afficher()
        {
            echo "La voiture est une $this->marque de couleur $this->couleur, son immatriculation est $this->immatriculation. <br>";
        }

        public static function getVoitureByImmat($immat)
        {
            try{
                $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
                // Préparation de la requête
                $req_prep = Model::$pdo->prepare($sql);
                $values = array(
                    "nom_tag" => $immat,
                    //nomdutag => valeur, ...
                );
                // On donne les valeurs et on exécute la requête
                $req_prep->execute($values);
                // On récupère les résultats comme précédemment
                $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
                $tab_voit = $req_prep->fetchAll();
                // Attention, si il n'y a pas de résultats, on renvoie false
                if (empty($tab_voit))
                    return false;
                return $tab_voit[0];
            } catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
            
        }

        public function save(){
            try{
                $sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:immat, :m, :c);";
                $req_prep = Model::$pdo->prepare($sql);
                $values = array(
                    "immat" => $this->immatriculation, 
                    "m" => $this->marque, 
                    "c" => $this->couleur, 
                );
                $req_prep->execute($values);
            } catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue  durant la sauvegarde <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
           


        }
    }


    ?>
</body>

</html>