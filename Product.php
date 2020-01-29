<?php

class Product
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $photo;
    
    
    
    
    public function __construct($id, $name, $price, $description, $photo){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->photo = $photo;
        
    }
    
    public function getPhoto(){
        return $this->photo;
    }
    
    public function getID(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setID($ID){
        $this->id = $ID;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
    public function setDescription($d){
        $this->description = $d;
    }
    public function setPhoto($n){
        $this->photo = $n;
    }
}

