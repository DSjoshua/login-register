<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Add New Item</h2>
                <?php
                if (isset($_POST["add_item"])) {
                    $product_name = $_POST["product_name"];
                    $quantity = $_POST["quantity"];
                    require_once "database.php";
                    $sql = "INSERT INTO products (product_name, quantity) VALUES ('$product_name', '$quantity')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<div class='alert alert-success'>New item added successfully</div>";
                        header("Location: inventory.php");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
                    }
                }
                ?>
                <form action="add_product.php" method="post">
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Enter Product Name" name="product_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" placeholder="Enter Quantity" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-btn">
                        <input type="submit" value="Add Item" name="add_item" class="btn btn-primary w-100">
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <a href="inventory.php" class="btn btn-secondary">Back to Inventory</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
