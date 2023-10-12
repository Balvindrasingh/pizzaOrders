<?php
include('db_connection.php'); // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and perform basic validation
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $numPizzas = (int)$_POST["num-pizzas"];
    $pizzaSize = $_POST["pizza-size"];
    $pizzaShape = $_POST["pizza-shape"];
    $toppings = isset($_POST["toppings"]) ? implode(", ", $_POST["toppings"]) : "";
    $crust = $_POST["crust"];
    $orderType = $_POST["order-type"];
    $comments = $_POST["comments"];

    // Prepare and execute a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (name, phone, email, num_pizzas, pizza_size, pizza_shape, toppings, crust, order_type, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssss", $name, $phone, $email, $numPizzas, $pizzaSize, $pizzaShape, $toppings, $crust, $orderType, $comments);

    if ($stmt->execute()) {
        echo "Order placed successfully.";
    } else {
        // Log the error to a file for debugging and provide a user-friendly message
        error_log("Error: " . $stmt->error);
        echo "An error occurred while placing your order. Please try again later.";
    }

    $stmt->close();
    $conn->close();
}
?>