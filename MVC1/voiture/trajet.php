<?php


class trajet{
    private int $id; 
    private String $depart; 
    private String $arrivee; 
    private date $date_depart; 
    private date $date_arrivee; 
    private int $prix; 
    private String $login; 


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
     * Get the value of date_depart
     *
     * @return date
     */
    public function getDateDepart(): date
    {
        return $this->date_depart;
    }

    /**
     * Set the value of date_depart
     *
     * @param date $date_depart
     *
     * @return self
     */
    public function setDateDepart(date $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    /**
     * Get the value of date_arrivee
     *
     * @return date
     */
    public function getDateArrivee(): date
    {
        return $this->date_arrivee;
    }

    /**
     * Set the value of date_arrivee
     *
     * @param date $date_arrivee
     *
     * @return self
     */
    public function setDateArrivee(date $date_arrivee): self
    {
        $this->date_arrivee = $date_arrivee;

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
}