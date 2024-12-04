<?php
// Conexión a la base de datos
$host = "localhost";
$db_name = "emotibot_db";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db_name);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Verificar usuario y contraseña
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login exitoso
    echo "<script>alert('¡Bienvenido a Emotibot!'); window.location.href='dashboard.html';</script>";
} else {
    // Credenciales incorrectas
    echo "<script>alert('Usuario o contraseña incorrectos.'); window.location.href='login.html';</script>";
}

$stmt->close();
$conn->close();
?>
