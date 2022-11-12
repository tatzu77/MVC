<?php


class ModelVoiture extends Model
{

    private $marque;
    private $couleur;
    private $immatriculation;

    protected static $object = 'voiture';

    // un getter      
    public function getMarque()
    {
        return $this->marque;
    }

    // un setter 
    public function setMarque($m)
    {
        $this->marque = $m;
    }

    // un getter      
    public function getCouleur()
    {
        return $this->couleur;
    }

    // un setter 
    public function setCouleur($c)
    {
        $this->couleur = $c;
    }

    // un getter      
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    // un setter 
    public function setImmatriculation($i)
    {
        if (strlen($i) <= 8) {
            $this->immatriculation = $i;
        }
    }

    // un constructeur
    public function __construct($i = NULL, $m = NULL, $c = NULL)
    {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }

    // une methode d'affichage.
    /*public function afficher() {
      echo "<ul>";
      echo "<li>Marque : {$this->marque}</li>";
      echo "<li>Immatriculation : {$this->immatriculation}</li>";
      echo "<li>Couleur : {$this->couleur}</li>";
      echo "</ul>";
    }*/

    // récupérer toutes les voitures de la BDD
   
    public static function getVoitureByImmat($immat)
    {

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
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }
    public static function deleteByImmat($immat){
            $sql = "DELETE FROM voiture WHERE immatriculation=:immat";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("immat" => $immat);
            $req_prep->execute($values);
    }

    public function save()
    {
        $sql = "INSERT INTO voiture VALUES 
                ('{$this->getImmatriculation()}', 
                '{$this->getMarque()}', 
                '{$this->getCouleur()}');";
        Model::$pdo->query($sql);
    }

    public static function update($data){
        $sql = "UPDATE voiture SET marque =:marque, couleur =:couleur WHERE immatriculation=:immat;";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($data);
    }
}
