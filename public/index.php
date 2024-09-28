<?php
include '../includes/functions.php';

$items = getItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items List</title>
</head>
<body>
    <h1>Items List</h1>
    <a href="create.php">Add New Item</a>
    <table border="2">
        <tr>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Expired Date</th>
            <th>Note</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $items->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['item_code']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['expired_date']; ?></td>
            <td><?php echo $row['note']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
