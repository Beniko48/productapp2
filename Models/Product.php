<?php

abstract class Product
{
    private $ID, $SKU, $name, $price;

    /**
     * @param $ID
     * @param $SKU
     * @param $name
     * @param $price
     */
    public function __construct($ID, $SKU, $name, $price)
    {
        $this->ID = $ID;
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * @param mixed $SKU
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}