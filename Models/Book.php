<?php

class Book extends Product
{
     private $bookID, $KG;

    /**
     * @param $ID
     * @param $SKU
     * @param $name
     * @param $price
     * @param $bookID
     * @param $KG
     */
    public function __construct($ID, $SKU, $name, $price, $bookID, $KG)
    {
        parent::__construct($ID, $SKU, $name, $price);
        $this->bookID = $bookID;
        $this->KG = $KG;
    }

    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * @param mixed $bookID
     */
    public function setBookID($bookID)
    {
        $this->bookID = $bookID;
    }

    /**
     * @return mixed
     */
    public function getKG()
    {
        return $this->KG;
    }

    /**
     * @param mixed $KG
     */
    public function setKG($KG)
    {
        $this->KG = $KG;
    }


}