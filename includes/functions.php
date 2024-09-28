<?php
include 'db.php';

function validateInput($item_code, $item_name) {
    if (empty($item_code) || empty($item_name)) {
        return "Item code and item name are required.";
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $item_code) || !preg_match("/^[a-zA-Z0-9 ]*$/", $item_name)) {
        return "Item code and item name must not contain special characters.";
    }
    return true;
}

function addItem($item_code, $item_name, $quantity, $expired_date, $note) {
    global $conn;
    $sql = "INSERT INTO item_sale (item_code, item_name, quantity, expired_date, note) VALUES ('$item_code', '$item_name', '$quantity', '$expired_date', '$note')";
    return $conn->query($sql);
}

function getItems() {
    global $conn;
    $sql = "SELECT * FROM item_sale";
    return $conn->query($sql);
}

function getItem($id) {
    global $conn;
    $sql = "SELECT * FROM item_sale WHERE id = $id";
    return $conn->query($sql)->fetch_assoc();
}

function updateItem($id, $item_code, $item_name, $quantity, $expired_date, $note) {
    global $conn;
    $sql = "UPDATE item_sale SET item_code = '$item_code', item_name = '$item_name', quantity = '$quantity', expired_date = '$expired_date', note = '$note' WHERE id = $id";
    return $conn->query($sql);
}

function deleteItem($id) {
    global $conn;
    $sql = "DELETE FROM item_sale WHERE id = $id";
    return $conn->query($sql);
}
?>
