<?php
class Person{
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $role;
    private $password;
    /**
     * @return mixed
     */
    
    public function __construct($id, $fn, $ln, $username, $role, $password){
        $this->id = $id;
        $this->first_name = $fn;
        $this->last_name = $ln;
        $this->username = $username;
        $this->role = $role;
        $this->password = $password;
    }
   
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLast_name()
    {
        return $this->last_name;
    }
    
    public function getuserName(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getRole(){
        return $this->role;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }
    
    public function setuserName($n){
        $this->username = $n;
    }
    
    public function setRole($role){
        $this->role = $role;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
}