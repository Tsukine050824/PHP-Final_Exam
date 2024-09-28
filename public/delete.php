<?php
include '../includes/functions.php';

if (isset($_GET['id'])) {
    deleteItem($_GET['id']);
}
header("Location: index.php");
exit();
?>
