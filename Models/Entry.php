<?php

class Entry
{
  public $productID, $SKU, $name, $price, $DVDID, $furnitureID, $bookID, $MB, $width, $height, $length, $KG;
}
/*
 *
 * select `product`.`ID` as productID,
                                        `product`.`SKU`,
                                        `product`.`name`,
                                        `product`.`price`,
                                        `product`.`DVDID`,
                                        `product`.`furnitureID`,
                                        `product`.`bookID`,
                                        `dvd`.`MB`,
                                        `furniture`.`width`,
                                        `furniture`.`height`,
                                        `furniture`.`length`,
                                        `book`.`KG`
 * */