<?php

class User
{
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $phone_number;
    private $role;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set' . ucfirst($key);

            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fname
     */ 
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set the value of fname
     *
     * @return  self
     */ 
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get the value of lname
     */ 
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set the value of lname
     *
     * @return  self
     */ 
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        if(strlen($password) < 8 )
        {
            echo 'Votre mot de passe doit contenir au moins 8 caractères.';
        }
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of phone_number
     */ 
    public function getPhone_number()
    {
        return $this->phone_number;
    }

    /**
     * Set the value of phone_number
     *
     * @return  self
     */ 
    public function setPhone_number($phone_number)
    {
        if(strlen($phone_number) < 9 ){
            echo 'Le numéro doit être composé de 9 chiffres';
        }
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}