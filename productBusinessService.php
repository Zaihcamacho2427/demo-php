<?php

require_once 'productServiceData.php';


class productBusinessService{
    
    
    function showAll() {
        // $n is the search string; returns an array of products
        $products = array();
        
        $dbService = new ProductServiceData();
        $products = $dbService->showAll();
        
        return $products;
    }
    function findByProductName($n){
        
        $products = Array();
        
        $dbService = new productServiceData();
        $products = $dbService->findByProductName($n);
        return $products;
    }
    function findById($id) {
        // id is the number; returns a single product array
        $dbService = new ProductServiceData();
        $products = $dbService->findById($id);
        
        return $products;
    }
    function deleteItem($id) {
        // id is the number to delete; returns a true (success) or false (failure)
        $dbService = new ProductServiceData();
        return $dbService->deleteItem($id);
    }
    
    function makeNew($product) {
        $dbService = new ProductServiceData();
        return $dbService->makeNew($product);
    }
    
    
    function updateOne($id, $product) {
        // $id is the number to update; $person is the item to change
        // returns a true (success) or false (failure)
        $dbService = new UserDataService();
        return $dbService->updateOne($id, $product);
    }

    
    
}