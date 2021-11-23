<?php
require '../Controllers/DatabaseUtils.php';


$info = array(
    "status" => "ok",
    "message" => ""
);
try {


    $productIDsArray = isset($_POST['productIDsArray']) ? $_POST['productIDsArray'] : null;
    $dvdIDsArray = isset($_POST['dvdIDsArray']) ? $_POST['dvdIDsArray'] : null;
    $furnitureIDsArray = isset($_POST['furnitureIDsArray']) ? $_POST['furnitureIDsArray'] : null;
    $bookIDsArray = isset($_POST['bookIDsArray']) ? $_POST['bookIDsArray'] : null;
    /*
    echo print_r($productIDsArray) . "\n";
    echo print_r($dvdIDsArray) . "\n";
    echo print_r($furnitureIDsArray) . "\n";
    echo print_r($bookIDsArray) . "\n";
    */
    /*
    echo "productIDsArray: \n";
    for ($i = 0; $i < count($productIDsArray); $i ++)
        echo "productIDsArray[" . $i . "] = " . $productIDsArray[$i] . "\n";

    echo "\ndvdIDsArray: \n";
    for ($i = 0; $i < count($dvdIDsArray); $i ++)
        echo "dvdIDsArray[" . $i . "] = " . $dvdIDsArray[$i] . "\n";
    */


    $DB = new DatabaseUtils();
    $handler = $DB->connect();

    if ($productIDsArray != null) {
        //  $helper = '( ';
        //foreach ($productIDsArray as $item) {
        //   $helper .= $item . ", ";
        // }
        // $helper = substr($helper,0,strlen($helper)-2).' )';
        // echo $helper;
        $helper = '( ' . join(', ', $productIDsArray) . ' )';
        $query_str = "DELETE FROM `product` WHERE ID IN " . $helper;
        $handler->query($query_str);

    }
    if ($dvdIDsArray != null) {
        $helper = '( ' . join(', ', $dvdIDsArray) . ' )';
        $query_str = "DELETE FROM `dvd` WHERE ID IN " . $helper;
        $handler->query($query_str);

    }


    if ($furnitureIDsArray != null) {
        $helper = '( ' . join(', ', $furnitureIDsArray) . ' )';
        $query_str = "DELETE FROM `furniture` WHERE ID IN " . $helper;
        $handler->query($query_str);

    }
    if ($bookIDsArray != null) {
        $helper = '( ' . join(', ', $bookIDsArray) . ' )';
        $query_str = "DELETE FROM `book` WHERE ID IN " . $helper;
        $handler->query($query_str);

    }
}
catch (Exception $ex){
    $info["status"] = "ERROR";
    $info["message"] = $ex -> getMessage();
}
echo json_encode($info);