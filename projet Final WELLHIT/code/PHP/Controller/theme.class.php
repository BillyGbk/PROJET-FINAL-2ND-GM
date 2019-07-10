<?php

class Theme
{	
    // on definit les attribut propre a la classe utilisateur
    private $_idTheme;
    private $_descriptionTheme;

    //on met en place les getter et setter

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

    /**
     * Get the value of _descriptionTheme
     */ 
    public function getDescriptionTheme()
    {
        return $this->_descriptionTheme;
    }

    /**
     * Set the value of _descriptionTheme
     *
     * @return  self
     */ 
    public function setDescriptionTheme($_descriptionTheme)
    {
        $this->_descriptionTheme = $_descriptionTheme;

        return $this;
    }


    //  on met en place le Construct & hydrate
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