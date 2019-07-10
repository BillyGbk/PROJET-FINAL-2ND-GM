<?php

class Utilisateur
{	
	// on definit les attribut propre a la classe utilisateur
	private $_idUtilisateur;
	private $_nomUtilisateur;
	private $_prenomUtilisateur;
	private $_dateUtilisateur;
    private $_pseudoUtilisateur;
	private $_motDePasse;
    private $_idTheme;
  

    //on met en place les getter et setter 

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

	

    //on met en place le construct et la fonction hydrate}  public function __construct(array $options = [])



	/**
	 * Get the value of _nomUtilisateur
	 */ 
	public function getNomUtilisateur()
	{
		return $this->_nomUtilisateur;
	}

	/**
	 * Set the value of _nomUtilisateur
	 *
	 * @return  self
	 */ 
	public function setNomUtilisateur($_nomUtilisateur)
	{
		$this->_nomUtilisateur = $_nomUtilisateur;

		return $this;
	}








	

	/**
	 * Get the value of _PrenomUtilisateur
	 */ 
	public function getPrenomUtilisateur()
	{
		return $this->_prenomUtilisateur;
	}

	/**
	 * Set the value of _PrenomUtilisateur
	 *
	 * @return  self
	 */ 
	public function setPrenomUtilisateur($_prenomUtilisateur)
	{
		$this->_prenomUtilisateur = $_prenomUtilisateur;

		return $this;
	}

	/**
	 * Get the value of _dateUtilisateur
	 */ 
	public function getDateUtilisateur()
	{
		return $this->_dateUtilisateur;
	}

	/**
	 * Set the value of _dateUtilisateur
	 *
	 * @return  self
	 */ 
	public function setDateUtilisateur($_dateUtilisateur)
	{
		$this->_dateUtilisateur = $_dateUtilisateur;

		return $this;
	}

    /**
     * Get the value of _pseudoUtilisateur
     */ 
    public function getPseudoUtilisateur()
    {
        return $this->_pseudoUtilisateur;
    }

    /**
     * Set the value of _pseudoUtilisateur
     *
     * @return  self
     */ 
    public function setPseudoUtilisateur($_pseudoUtilisateur)
    {
        $this->_pseudoUtilisateur = $_pseudoUtilisateur;

        return $this;
    }

	/**
	 * Get the value of _motDePasse
	 */ 
	public function getMotDePasse()
	{
		return $this->_motDePasse;
	}

	/**
	 * Set the value of _motDePasse
	 *
	 * @return  self
	 */ 
	public function setMotDePasse($_motDePasse)
	{
		$this->_motDePasse = $_motDePasse;

		return $this;
	}

    /**
     * Get the value of _idTheme
     */ 
    public function getIdTheme()
    {
        return $this->_idTheme;
    }

    /**
     * Set the value of _idTheme
     *
     * @return  self
     */ 
    public function setIdTheme($_idTheme)
    {
        $this->_idTheme = $_idTheme;

        return $this;
	}
	

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
	