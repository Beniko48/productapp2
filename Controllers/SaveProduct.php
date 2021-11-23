<?php
require '../Controllers/DatabaseUtils.php';
require '../Models/Product.php';
require '../Models/Furniture.php';
require '../Models/Book.php';
require '../Models/DVD.php';

$info = array(
    "status" => "ok",
    "message" => ""
);
try {

    $dbOBJ = new DatabaseUtils();
    $handler = $dbOBJ->connect();
    $type = $_POST['product_type'];


    switch ($type) {
        case 'dvd' :
            $dvdObj = new DVD(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['mb']);
            $statement = $handler->prepare("INSERT INTO `dvd` (`MB`) VALUES (:MB)");
            $statement->bindValue(':MB', $dvdObj->getMB(), PDO::PARAM_STR);
            $statement->execute();
            $dvdObj->setDVDID($handler->lastInsertId());


            $statement = $handler->prepare("INSERT INTO `product`
        (`SKU`, `name`, `price`, `DVDID`, `furnitureID`, `bookID`)
        VALUES (:SKU, :name, :price, :DVDID, :furnitureID, :bookID)");
            $statement->bindValue(':SKU', $dvdObj->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':name', $dvdObj->getName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $dvdObj->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':DVDID', $dvdObj->getDVDID(), PDO::PARAM_INT);
            $statement->bindValue(':furnitureID', null, PDO::PARAM_NULL);
            $statement->bindValue(':bookID', null, PDO::PARAM_NULL);
            $statement->execute();

            break;


        case 'furniture':
            $furObj = new Furniture(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['width'], $_POST['height'], $_POST['length']);
            $statement = $handler->prepare("INSERT INTO `furniture` (`width`,`height`,`length`) VALUES (:width, :height, :length)");
            $statement->bindValue(':width', $furObj->getWidth(), PDO::PARAM_STR);
            $statement->bindValue(':height', $furObj->getHeight(), PDO::PARAM_STR);
            $statement->bindValue(':length', $furObj->getLength(), PDO::PARAM_STR);
            $statement->execute();
            $furObj->setFurnitureID($handler->lastInsertId());

            $statement = $handler->prepare("INSERT INTO `product`
        (`SKU`, `name`, `price`, `DVDID`, `furnitureID`, `bookID`)
        VALUES (:SKU, :name, :price, :DVDID, :furnitureID, :bookID)");
            $statement->bindValue(':SKU', $furObj->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':name', $furObj->getName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $furObj->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':DVDID', null, PDO::PARAM_NULL);
            $statement->bindValue(':furnitureID', $furObj->getFurnitureID(), PDO::PARAM_INT);
            $statement->bindValue(':bookID', null, PDO::PARAM_NULL);
            $statement->execute();


            break;


        case 'book':
            $bookObj = new Book(null, $_POST['sku'], $_POST['name'], $_POST['price'], null, $_POST['kg']);
            $statement = $handler->prepare("INSERT INTO `book` (`KG`) VALUES (:KG)");
            $statement->bindValue(':KG', $bookObj->getKG(), PDO::PARAM_STR);
            $statement->execute();
            $bookObj->setBookID($handler->lastInsertId());

            $statement = $handler->prepare("INSERT INTO `product`
        (`SKU`, `name`, `price`, `DVDID`, `furnitureID`, `bookID`)
        VALUES (:SKU, :name, :price, :DVDID, :furnitureID, :bookID)");
            $statement->bindValue(':SKU', $bookObj->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':name', $bookObj->getName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $bookObj->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':DVDID', null, PDO::PARAM_NULL);
            $statement->bindValue(':furnitureID', null, PDO::PARAM_NULL);
            $statement->bindValue(':bookID', $bookObj->getBookID(), PDO::PARAM_INT);
            $statement->execute();

            break;
    }
}
catch (Exception $ex){
    $info["status"] = "ERROR";
    $info["message"] = $ex -> getMessage();
}
echo json_encode($info);
