<?php

class voiture {

     private string $nom;
     private string $marque;
     private int $puissance;



     /**
      * Get the value of nom
      *
      * @return string
      */
     public function getNom(): string
     {
          return $this->nom;
     }

     /**
      * Set the value of nom
      *
      * @param string $nom
      *
      * @return self
      */
     public function setNom(string $nom): self
     {
          $this->nom = $nom;

          return $this;
     }

     /**
      * Get the value of marque
      *
      * @return string
      */
     public function getMarque(): string
     {
          return $this->marque;
     }

     /**
      * Set the value of marque
      *
      * @param string $marque
      *
      * @return self
      */
     public function setMarque(string $marque): self
     {
          $this->marque = $marque;

          return $this;
     }

     /**
      * Get the value of puissance
      *
      * @return int
      */
     public function getPuissance(): int
     {
          return $this->puissance;
     }

     /**
      * Set the value of puissance
      *
      * @param int $puissance
      *
      * @return self
      */
     public function setPuissance(int $puissance): self
     {
          $this->puissance = $puissance;

          return $this;
     }
}