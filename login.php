<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $stmt = $conn->prepare("SELECT idusuarios, clave FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    $stmt->fetch();
    
    if (password_verify($clave, $hash)) {
        $_SESSION['user_id'] = $id;
        header("Location: ../products.php");
    } else {
        echo "Invalid credentials";
    }
    $stmt->close();
}
?>

<form method="post">
    Username: <input type="text" name="usuario" required><br>
    Password: <input type="password" name="clave" required><br>
    <button type="submit">Login</button>
</form>
