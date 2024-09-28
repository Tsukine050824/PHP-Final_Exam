<?php
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expired_date = $_POST['expired_date'];
    $note = $_POST['note'];

    $validationResult = validateInput($item_code, $item_name);
    if ($validationResult === true) {
        if ($quantity < 0) {
            $error = "Quantity cannot be negative.";
        } else {
            addItem($item_code, $item_name, $quantity, $expired_date, $note);
            header("Location: index.php");
            exit();
        }
    } else {
        $error = $validationResult;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
</head>
<body>
    <h1>Add New Item</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="" method="POST">
        <label for="item_code">Item Code:</label>
        <input type="text" name="item_code" required>
        <br>
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="0" step="1" required>
        <br>
        <label for="expired_date">Expired Date:</label>
        <input type="date" name="expired_date">
        <br>
        <label for="note">Note:</label>
        <input type="text" name="note">
        <br>
        <button type="submit">Add Item</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
