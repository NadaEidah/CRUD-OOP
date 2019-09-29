<?php
class product
{
    private $connection;
    private $table_name="products";

    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $timestamp;


    public function __construct($connection_db)
    {
        $this->connection=$connection_db;
    }

    public function create()
    {
        $this->timestamp=date('Y-m-d H-i-s');
        $query="INSERT INTO"." ".$this->table_name." "."(name,description,price,category_id,created) "."VALUES('$this->name','$this->description','$this->price','$this->category_id','$this->timestamp')";

        $statment = $this->connection->prepare($query);
        return $statment->execute();
    }

    public function read ()
    {

        $query = "SELECT products_name,products.description,price,categories_name FROM" .$this->table_name."ORDER BY name ASC";
       
        $statment=$this->connection->prepare($query);
        $statment->execute();
        $products = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}

?>


