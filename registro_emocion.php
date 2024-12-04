<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Emoción: " . htmlspecialchars($_POST['emocion']) . "<br>";
    echo "Descripción: " . htmlspecialchars($_POST['descripcion']) . "<br>";
} else {
    echo "No se recibieron datos.";
}
?>
