<?php
class Address{
    
    
    private $id;
    private $state;
    private $city;
    private $street;
    private $zip;
    private $user_id;

    public function __construct($id, $state, $city, $street, $zip, $user_id){
        $this->id = $id;
        $this->state = $state;
        $this->city = $city;
        $this->street = $street;
        $this->zip = $zip;
        $this->user_id = $user_id;
        
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }



}

