<?php
require_once 'Model.php'; 
class Utilisateur{
    private String $login; 
    private String $nom; 
    private String $prenom; 

    /**
     * Get the value of login
     *
     * @return String
     */
    public function getLogin(): String
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @param String $login
     *
     * @return self
     */
    public function setLogin(String $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return String
     */
    public function getNom(): String
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param String $nom
     *
     * @return self
     */
    public function setNom(String $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return String
     */
    public function getPrenom(): String
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param String $prenom
     *
     * @return self
     */
    public function setPrenom(String $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public static function getAllUtilisateurs()
    {
        $rep = Model::$pdo->query('Select * FROM utilisateur;');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_util = $rep->fetchAll();

        return $tab_util;

        
    }

    // un constructeur
    public function __construct($l = NULL, $n = NULL, $p = NULL)
    {
        if (!is_null($l) && !is_null($n) && !is_null($p)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
        }
    }

    public function afficher(){
        echo "L'utilisateur a pour login $this->login, il s'appelle $this->prenom $this->nom.<br>";
    }
}