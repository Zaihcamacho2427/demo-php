<?php
class OrderDetails{
    
    private $id;
    private $order_id;
    private $product_id;
    private $quantity;
    private $current_price;
    private $current_description;
    
    
    function __construct($id, $order_id, $product_id, $quantity, $current_price, $current_description){
        
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->current_pric = $current_price;
        $this->current_description = $current_description;
        
    }
    
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getCurrent_price()
    {
        return $this->current_price;
    }

    /**
     * @return mixed
     */
    public function getCurrent_description()
    {
        return $this->current_description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $current_price
     */
    public function setCurrent_price($current_price)
    {
        $this->current_price = $current_price;
    }

    /**
     * @param mixed $current_description
     */
    public function setCurrent_description($current_description)
    {
        $this->current_description = $current_description;
    }

    
    
    
    
    
    
    
    
}