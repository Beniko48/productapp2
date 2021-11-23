<?php




class DatabaseUtils
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;



    public function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '123456789';
        $this->dbname = 'productdb';
        $this->charset = 'utf8mb4';



        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }



}
/*
  -- create database productdb;

create table productdb.dvd(
ID int primary key auto_increment,
MB float not null
);
create table productdb.furniture(
ID int primary key auto_increment,
width float not null,
height float not null,
length float not null
);

create table productdb.book(
ID int primary key auto_increment,
KG float not null
);

create table productdb.product(
ID int primary key auto_increment,
SKU varchar(255) not null,
`name` varchar(255) not null,
price float not null,
DVDID int,
furnitureID int,
bookID int,
CONSTRAINT fk_product_dvd
FOREIGN KEY (DVDID)
REFERENCES dvd(ID),

CONSTRAINT fk_product_furniture
FOREIGN KEY (furnitureID)
REFERENCES furniture(ID),

CONSTRAINT fk_product_book
FOREIGN KEY (bookID)
REFERENCES book(ID)

);


 */
