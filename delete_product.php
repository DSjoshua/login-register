<?php
// database.php should contain your database connection code
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $product_id = intval($_POST['id']);

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameter and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $product_id);
        mysqli_stmt_execute($stmt);

        // Check if the deletion was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<div class='alert alert-success'>Product deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to delete the product.</div>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alert alert-danger'>Failed to prepare the SQL statement.</div>";
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the inventory management page
    header("Location: inventory.php");
    exit();
} else {
    // If the request is not a POST request or the ID is not set, redirect back to the inventory page
    header("Location: inventory.php");
    exit();
}
?>
