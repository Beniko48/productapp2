<?php

class DVD extends Product
{
  private $DVDID, $MB;

    /**
     * @param $ID
     * @param $SKU
     * @param $name
     * @param $price
     * @param $DVDID
     * @param $MB
     */
    public function __construct($ID, $SKU, $name, $price, $DVDID, $MB)
    {
        parent::__construct($ID, $SKU, $name, $price);
        $this->DVDID = $DVDID;
        $this->MB = $MB;
    }

    /**
     * @return mixed
     */
    public function getDVDID()
    {
        return $this->DVDID;
    }

    /**
     * @param mixed $DVDID
     */
    public function setDVDID($DVDID)
    {
        $this->DVDID = $DVDID;
    }

    /**
     * @return mixed
     */
    public function getMB()
    {
        return $this->MB;
    }

    /**
     * @param mixed $MB
     */
    public function setMB($MB)
    {
        $this->MB = $MB;
    }

}