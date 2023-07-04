<?php


class Appointment
{
    private $id;
    private $name;
    private $appointment_time;
    private $appointment_day;
    private $appointment_type;
    private $appointment_specie;
    private $user;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set' .ucfirst($key);

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of appointment_time
     */ 
    public function getAppointment_time()
    {
        return $this->appointment_time;
    }

    /**
     * Set the value of appointment_time
     *
     * @return  self
     */ 
    public function setAppointment_time($appointment_time)
    {
        $this->appointment_time = $appointment_time;

        return $this;
    }

    /**
     * Get the value of appointment_day
     */ 
    public function getAppointment_day()
    {
        return $this->appointment_day;
    }

    /**
     * Set the value of appointment_day
     *
     * @return  self
     */ 
    public function setAppointment_day($appointment_day)
    {
        $this->appointment_day = $appointment_day;

        return $this;
    }

    /**
     * Get the value of appointment_type
     */ 
    public function getAppointment_type()
    {
        return $this->appointment_type;
    }

    /**
     * Set the value of appointment_type
     *
     * @return  self
     */ 
    public function setAppointment_type($appointment_type)
    {
        $this->appointment_type = $appointment_type;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of appointment_specie
     */ 
    public function getAppointment_specie()
    {
        return $this->appointment_specie;
    }

    /**
     * Set the value of appointment_specie
     *
     * @return  self
     */ 
    public function setAppointment_specie($appointment_specie)
    {
        $this->appointment_specie = $appointment_specie;

        return $this;
    }
}