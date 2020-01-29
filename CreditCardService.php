<?php
require_once 'autoLoader.php';

class CreditCardService {

    private $owner = "";
    private $cardnumber = "";
    private $cvv = "";
    private $month = "";
    private $year = "";
    
    function __construct($owner, $cardnumber, $cvv, $month, $year) {
        $this->owner = $owner;
        $this->cardnumber = $cardnumber;
        $this->cvv = $cvv;        
        $this->month = $month;
        $this->year = $year;
    }
    
    public function authenticate() {
        
        if ( $this->owner == "Isaiah" && $this->cardnumber == "test" 
             && $this->cvv == test && $this->month == 04 && $this->year == 20 ) {
                return true;
            } else {
                return false;
            }
    }
   
}