<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'templates/header.php';
echo "<div class='container my-5'><h2 class='text-center'>DESTACADOS</h2>";
include 'actions/carousel.php';
echo "</div></div></div><div class='container'><h3 class='text-center'>LISTADO</h3><div class='row'>";
include 'actions/read_products.php';
echo "</div></div>";
include 'templates/footer.php';
?>
