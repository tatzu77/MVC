<?php

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
}