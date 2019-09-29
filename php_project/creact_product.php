
<?php include "layout/heder.php" ?>
<?php include "model/category.php" ?>
<?php include "model/product.php" ?>
<?php include "config/database.php" ?>


<?php
$db =new Database();
$connection =$db->create_connection();
//$product =new product($connection);
$category = new category($connection);
$categories = $category->get_categories();

?>

<div class="container">
    <form action="<?php $_SERVER ["PHP_SELF"]?>" method ="POST">
        <div class="form-group">
            <label for="Product_Name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="Product_Name" aria-describedby="Product_Name" placeholder="Product_Name">
        </div>
        <div class="form-group">
            <label for="Price">Price</label>
            <input type="text" name="price" class="form-control" id="Price" aria-describedby="Price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="Product_Description">Product Description</label>
            <input type="text" name="description" class="form-control" id="Product_Description" aria-describedby="Product_Description" placeholder="Product_Description">
        </div>

        <div class="dropdown mb-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <select name="category_id">

                    <?php
                    foreach($categories as $category)
                    {
                        echo "<option value=$category[id]>$category[name]</option>";
                    }
                    ?>

                </select>

            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>



</div>

<?php
if(isset($_POST["submit"]))
{
    $product=new product($connection);
    $product->name=$_POST["product_name"];
    $product->price=$_POST["price"];
    $product->description=$_POST["description"];
    $product->category_id=$_POST["category_id"];



    if($product->create())
    {
        echo"<div class='alert alert-success'>product was created</div>";
    }
    else{
        echo"<div class='alert alert-success'>unable to create product</div>";
    }
}


?>


<?php include "layout/footer.php" ?>