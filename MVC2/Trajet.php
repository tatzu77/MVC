<?php

require_once 'Model.php'; 
class Trajet{
    private int $id; 
    private String $depart; 
    private String $arrivee; 
    private DateTime $date_depart; 
    private DateTime $date_arrivee; 
    private int $prix; 
    private String $login; 
    private int $nbplaces; 


    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of depart
     *
     * @return String
     */
    public function getDepart(): String
    {
        return $this->depart;
    }

    /**
     * Set the value of depart
     *
     * @param String $depart
     *
     * @return self
     */
    public function setDepart(String $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get the value of arrivee
     *
     * @return String
     */
    public function getArrivee(): String
    {
        return $this->arrivee;
    }

    /**
     * Set the value of arrivee
     *
     * @param String $arrivee
     *
     * @return self
     */
    public function setArrivee(String $arrivee): self
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    /**
     * Get the value of prix
     *
     * @return int
     */
    public function getPrix(): int
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @param int $prix
     *
     * @return self
     */
    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

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
     * Get the value of date_depart
     *
     * @return DateTime
     */
    public function getDateDepart(): DateTime
    {
        return $this->date_depart;
    }

    /**
     * Set the value of date_depart
     *
     * @param DateTime $date_depart
     *
     * @return self
     */
    public function setDateDepart(DateTime $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    /**
     * Get the value of date_arrivee
     *
     * @return DateTime
     */
    public function getDateArrivee(): DateTime
    {
        return $this->date_arrivee;
    }

    /**
     * Set the value of date_arrivee
     *
     * @param DateTime $date_arrivee
     *
     * @return self
     */
    public function setDateArrivee(DateTime $date_arrivee): self
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public static function getAllTrajets()
    {
        $rep = Model::$pdo->query('Select * FROM trajet;');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
        $tab_traj = $rep->fetchAll();

        return $tab_traj;

        
    }

    // un constructeur
    public function __construct($i = NULL, $d = NULL, $a = NULL,$date = NULL,$nb = NULL, $p = NULL, $l = NULL )
    {
        if (!is_null($i) && !is_null($d) && !is_null($a) && !is_null($date) && !is_null($nb) && !is_null($p) && !is_null($l)) {
            $this->id = $i;
            $this->depart = $d;
            $this->arrivee = $a;
            $this->date = $date;
            $this->nbplaces = $nb;
            $this->prix = $p;
            $this->login = $l;
        }
    }

    /**
     * Get the value of nbplaces
     *
     * @return int
     */
    public function getNbplaces(): int
    {
        return $this->nbplaces;
    }

    /**
     * Set the value of nbplaces
     *
     * @param int $nbplaces
     *
     * @return self
     */
    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }
}