<?php

require_once 'userDataService.php';
require_once 'Person.php';

class userBusinessService{
    
    
    function findByID($n){
        
        $persons1 = Array();
        
        $dbService = new userDataService();
        $persons1 = $dbService->findByID($n);
        
        return $persons1;
    }
    
    function findByFirstName($n){
        
        $persons2 = Array();
        $dbService = new userDataService();
        $persons2 = $dbService->findByFirstName($n);
        
        return $persons2;
    }
   
    function findByLastName($n){
        
        $persons3 = Array();
        
        $dbService = new userDataService();
        $persons3 = $dbService->findByLastName($n);
        
        return $persons3;
    }
    
    function findByFirstNameWithAddress($n){
        
        $persons4 = Array();
        $dbService = new userDataService();
        $persons4 = $dbService->findByFirstNameWithAddress($n);
        
        return $persons4;
    }
    
    function deleteID($id){

        $dbService = new userDataService();
                
        return $dbService->deleteID($id);
    }
    
    function updateOne($id, $person){
        
        $dbService = new userDataService();
        return $dbService->updateOne($id, $person);
        
        
    }
    
    function addOne($person){
        $dbService = new userDataService();
        return $dbService->addOne($person);
    }
    
    function showAll(){
        
        $persons = Array();
        $dbService = new userDataService();
        $persons = $dbService->showAll();
        
       
        
        return $persons;
    }
    
    function makeNew($person) {
        $dbService = new UserDataService();
        return $dbService->makeNew($person);
    }
}