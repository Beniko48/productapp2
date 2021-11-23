<?php
require "../Controllers/DatabaseUtils.php";
require "../Models/Entry.php";
$dbObj = new DatabaseUtils();
$handler = $dbObj->connect();


$statement = $handler->query("select `product`.`ID` as productID, 
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
                                        from product
                                        left join dvd on product.DVDID = dvd.ID
                                        left join furniture on product.furnitureID = furniture.ID
                                        left join book on product.bookID = book.ID");
$statement->setFetchMode(PDO::FETCH_CLASS, 'Entry');
$arr = array();
while ($row = $statement -> fetch()){
    array_push($arr, $row);
}
echo json_encode($arr);