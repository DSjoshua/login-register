<?php
// database.php should contain your database connection code
require_once "database.php";

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    
    // Prepare the SQL statement to fetch the product details
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind the parameter and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $product_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $quantity = $row['quantity'];
        } else {
            echo "Product not found.";
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the SQL statement.";
        exit();
    }
} else {
    echo "No product ID provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $product_name = $_POST['product_name'];
    $quantity = intval($_POST['quantity']);
    
    // Prepare the SQL statement to update the product details
    $sql = "UPDATE products SET product_name = ?, quantity = ? WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sii", $product_name, $quantity, $product_id);
        mysqli_stmt_execute($stmt);
        
        // Check if the update was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Product updated successfully.";
        } else {
            echo "Failed to update the product.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the SQL statement.";
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the inventory management page
    header("Location: inventory.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            .form-label {
                font-size: 1rem;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="text-center mb-4">Edit Product</h2>
        <form action="edit_product.php?id=<?php echo htmlspecialchars($product_id); ?>" method="post">
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="inventory.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
