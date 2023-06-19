<?php 


class Schedule
{
    private $id;
    private $opening_time;
    private $closing_time;

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
                $this-> $method($value);
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
     * Get the value of opening_time
     */ 
    public function getOpening_time()
    {
        return $this->opening_time;
    }

    /**
     * Set the value of opening_time
     *
     * @return  self
     */ 
    public function setOpening_time($opening_time)
    {
        $this->opening_time = $opening_time;

        return $this;
    }

    /**
     * Get the value of closing_time
     */ 
    public function getClosing_time()
    {
        return $this->closing_time;
    }

    /**
     * Set the value of closing_time
     *
     * @return  self
     */ 
    public function setClosing_time($closing_time)
    {
        $this->closing_time = $closing_time;

        return $this;
    }
}