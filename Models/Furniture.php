<?php

class Furniture extends Product
{
   private $furnitureID, $width, $height, $length;

    /**
     * @param $furnitureID
     * @param $width
     * @param $height
     * @param $length
     */
    public function __construct($ID, $SKU, $name, $price, $furnitureID, $width, $height, $length)
    {
        parent::__construct($ID, $SKU, $name, $price);
        $this->furnitureID = $furnitureID;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getFurnitureID()
    {
        return $this->furnitureID;
    }

    /**
     * @param mixed $furnitureID
     */
    public function setFurnitureID($furnitureID)
    {
        $this->furnitureID = $furnitureID;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }


}