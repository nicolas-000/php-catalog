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
    echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='". $counter ."' aria-label='Slide ". $counter ."'></button>";
    $counter++;
}
echo "</div>
<div class='carousel-inner'>";
while ($row = $result->fetch_assoc()) {
    echo "<div class='carousel-item'>
    <img src='". $row['ruta'] ."' class='d-block w-100' alt='...'>
    <div class='carousel-caption d-none d-md-block'>
      <h5>Second slide label</h5>
      <p>Some representative placeholder content for the second slide.</p>
    </div>
  </div>";
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