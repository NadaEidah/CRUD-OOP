
<?php

class category {

    private $connection;
    private $table_name="categories";

    public $id;
    public $name;

    //start conitaion with database_construat
    public function __construct($connection)
    {
        $this->connection=$connection;
        
    }

    ///end _construat

    //start to get categories
    public function get_categories()
    {
        $query="SELECT id,name from"." ".$this->table_name." "."ORDER by name";
        $statement=$this->connection->prepare($query);
        $statement->execute();

        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    

    ///end to get categories

    }
?>