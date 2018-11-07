<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/11/18
 * Time: 12:11
 */
require_once('Connection.php');

class Product
{
    private $name;
    private $description;
    private $price;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function all(){
        $db = Connection::connectsDb();
        $sql = "select * from products";
        $stm = $db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function create(){
        $db = Connection::connectsDb();
        $sql = "insert into products (name, description, price) values (:name, :description, :price);";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':price', $this->price);
        return $stmt->execute();
    }

   public function find($id){
        $db = Connection::connectsDb();
        $sql = "select * from products where id = :id";
        $stm = $db->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch();
   }

   public function update($id){
        $db = Connection::connectsDb();
        $sql = "update products set name = :name, description = :description, price = :price where id = :id";
        $stm = $db->prepare($sql);
        $stm->bindParam(':name', $this->name);
        $stm->bindParam(':description', $this->description);
        $stm->bindParam(':price', $this->price);
        $stm->bindParam(':id', $id);
        return $stm->execute();
   }

   public function findLast(){
        $db = Connection::connectsDb();
        $sql = "SELECT * FROM products ORDER BY ID DESC LIMIT 1";
        $stm = $db->prepare($sql);
        $stm->execute();
        return $stm->fetch();
   }

    public function delete($id){
        $db = Connection::connectsDb();
        $sql = "delete from products where id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }



}