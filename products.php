<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'templates/header.php';
echo "<div class='container'>";
include 'actions/carousel.php';
echo "</div><div class='container'><div class='row'>";
include 'actions/read_products.php';
echo "</div></div>";
include 'templates/footer.php';
?>
