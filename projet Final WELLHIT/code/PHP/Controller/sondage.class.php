<?php
class sondage
{	
    // on definit les attributs propre a la classe utilisateur
    private $idSondage;
    private $descriptionSondage;
    private $idUtilisateur;
    private $noteSondage;
    //on met en place les getter et setter
   /**
     * Get the value of idSondage
     */ 
    public function getIdSondage()
    {
        return $this->idSondage;
    }

    /**
     * Set the value of idSondage
     *
     * @return  self
     */ 
    public function setIdSondage($idSondage)
    {
        $this->idSondage = $idSondage;

        return $this;
    }

    /**
     * Get the value of descriptionSondage
     */ 
    public function getDescriptionSondage()
    {
        return $this->descriptionSondage;
    }

    /**
     * Set the value of descriptionSondage
     *
     * @return  self
     */ 
    public function setDescriptionSondage($descriptionSondage)
    {
        $this->descriptionSondage = $descriptionSondage;

        return $this;
    }

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of noteSondage
     */ 
    public function getNoteSondage()
    {
        return $this->noteSondage;
    }

    /**
     * Set the value of noteSondage
     *
     * @return  self
     */ 
    public function setNoteSondage($noteSondage)
    {
        $this->noteSondage = $noteSondage;

        return $this;
    }
     //on met en place le construct et la fonction hydrate
     public function __construct(array $options = [])
     { 
         if (!empty($options))
         {
             $this->hydrate($options);
         }
     }
     public function hydrate($data)
     {
         foreach ($data as $key => $value)
         {
             $method = 'set'.ucfirst($key);
             
             if (is_callable([$this, $method]))
             {
                 $this->$method($value);
             }
         }
     }
   
   
   
   

}
?>