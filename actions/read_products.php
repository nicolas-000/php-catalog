<?php
include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$result = $conn->query("SELECT idproductos, nombre, marca, descripcion FROM productos");

while ($row = $result->fetch_assoc()) {
    echo "<div class='card text-center m-2' style='width: 18rem;' id='producto". $row['idproductos'] ."'><div class='card-body'>";
    echo "<h5 class='card-title'>" . $row['nombre'] . "</h5>";
    echo "<h6 class='card-subtitle mb-2 text-body-secondary'>" . $row['marca'] . "</h6>";
    echo "<p class='card-text'>" . $row['descripcion'] . "</p>";
    echo " <div class='row justify-content-between'><div class='col'><a href='#' class='card-link'>Detalles</a></div></div></div></div>";
}
?>
