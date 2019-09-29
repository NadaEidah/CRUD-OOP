<?php include "layout/heder.php" ?>
<?php include "config/database.php" ?>
<?php include "model/category.php" ?>
<?php include "model/product.php" ?>





<?php
$db = new Database();
$connection = $db->create_connection();

$category = new category ($connection);
$categories = $category->get_categories();
$product = new product($connection);
$products=$product->create();
$products=$product->read();
?>

<div class="container">
    <?php
    echo "<table class='table table-hover'>
    <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>

    <th>Actions</th>
    </tr>";

    foreach($products as $product)
    {
        echo"
                    <tr>
                        <td>$product[id]</td>
                        <td>$product[name]</td>
                        <td>$product[description]</td>
                        <td>$product[price]</td>
                        <td>$product[category_id]</td>


                        <td>
                        <button type=\"button\" class=\"btn btn-success\">Success</button>
                        <button type=\"button\" class=\"btn btn-danger\">Delete</button>
                         </td>
                    </tr>"; }
    echo "</table>  ";

    ?>


</div>

