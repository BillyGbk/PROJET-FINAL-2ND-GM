<?php

class commentaire{	
    // on definit les attribut propre a la classe utilisateur
    private $_idCommentaire;
    private $_descriptionCommentaire;
    private $_idUtilisateur;
// on definit les getters et setters
    /**
     * Get the value of _idCommentaire
     */ 
    public function getIdCommentaire()
    {
        return $this->_idCommentaire;
    }

    /**
     * Set the value of _idCommentaire
     *
     * @return  self
     */ 
    public function setIdCommentaire($_idCommentaire)
    {
        $this->_idCommentaire = $_idCommentaire;

        return $this;
    }

    /**
     * Get the value of _descriptionCommentaire
     */ 
    public function getDescriptionCommentaire()
    {
        return $this->_descriptionCommentaire;
    }

    /**
     * Set the value of _descriptionCommentaire
     *
     * @return  self
     */ 
    public function setDescriptionCommentaire($_descriptionCommentaire)
    {
        $this->_descriptionCommentaire = $_descriptionCommentaire;

        return $this;
    }

    /**
     * Get the value of _idUtilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->_idUtilisateur;
    }

    /**
     * Set the value of _idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur($_idUtilisateur)
    {
        $this->_idUtilisateur = $_idUtilisateur;

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