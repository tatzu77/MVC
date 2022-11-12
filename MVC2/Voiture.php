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
    }

    ?>
</body>

</html>