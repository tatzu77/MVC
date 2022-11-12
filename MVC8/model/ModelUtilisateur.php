<?php
class ModelUtilisateur extends Model{
    private $login;
    private $nom;
    private $prenom;
    private $mdp;

    protected static $object = 'utilisateur';
    protected static $primary='login';

    /**
     * Get the value of login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function __construct($l = NULL, $n = NULL, $p = NULL, $m = NULL)
    {
        if (!is_null($l) && !is_null($n) && !is_null($p) && !is_null($m)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
            $this->mdp = $m;
        }
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     */
    public function setMdp($mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }
    public static function checkPassword($login,$mot_de_passe_chiffre){
        $sql = "SELECT $ FROM utilisateur WHERE login=:login AND mdp=:mdp";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "login" => $login,
            "mdp" => $mot_de_passe_chiffre
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS,"ModelUtilisateur");
        $tab = $req_prep->fetchAll();
        if (empty($tab)){
            return false;
        } else {
            return $tab[0];
        }
    }
    public static function validate($data){
        $sql = "SELECT * FROM utilisateur WHERE login=:login AND nouv=:nouv";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($data);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelUtilisateur");
        $tab = $req_prep->fetchAll();
        if(!empty($tab)){
            $sql = "UPDATE utilisateur SET nouv=null WHERE login=:login";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
        } 
        
    }
}