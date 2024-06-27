<?php
include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$result = $conn->query("SELECT idfotografias, ruta, productos_idproductos FROM fotografias");

echo "<div id='carouselExampleCaptions' class='carousel slide'>
<div class='carousel-indicators'>";
$counter = 0;
while ($row = $result->fetch_assoc()) {
    echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='". $counter ."' aria-label='Slide ". $counter ."'";
    if ($counter == 0) {echo "class='active' aria-current='true'></button>";} else {echo "></button>";}
    $counter++;
}
echo "</div>
<div class='carousel-inner'>";
$result = $conn->query("SELECT idfotografias, ruta, productos_idproductos, nombre, marca FROM fotografias LEFT JOIN productos ON fotografias.productos_idproductos = productos.idproductos");

$counter = 0;
while ($row = $result->fetch_assoc()) {
    echo "<div class='carousel-item";
    if ($counter == 0){echo " active' style='height: 500px;'>
    <a href='#producto". $row['productos_idproductos'] ."'><img src='https://cloud-ev3.s3.amazonaws.com/". $row['ruta'] ."' class='d-block w-100 h-100 object-fit-fill' alt='imagen-". $row['ruta'] ."'></a>
    <div class='carousel-caption d-none d-md-block text-success'>
      <h5>". $row['marca'] ." - ". $row['nombre'] ."</h5>
    </div>
  </div>";} else {
    echo "' style='height: 500px;'>
    <a href='#producto". $row['productos_idproductos'] ."'><img src='https://cloud-ev3.s3.amazonaws.com/". $row['ruta'] ."' class='d-block w-100 h-100 object-fit-fill' alt='imagen-". $row['ruta'] ."'></a>
    <div class='carousel-caption d-none d-md-block text-success'>
      <h5>". $row['marca'] ." - ". $row['nombre'] ."</h5>
    </div>
  </div>";
  }
  $counter++;
}
echo "</div>
<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
  <span class='carousel-control-prev-icon' aria-hidden='true'></span>
  <span class='visually-hidden'>Previous</span>
</button>
<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
  <span class='carousel-control-next-icon' aria-hidden='true'></span>
  <span class='visually-hidden'>Next</span>
</button>
</div>";
?>