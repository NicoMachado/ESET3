<?php
// Conexión a la base de datos MySQL
$servername = "nombre_servidor";
$username = "nombre_usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las tareas
$sql = "SELECT id, titulo, descripcion FROM tareas";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Tareas</title>
</head>
<body>
    <h2>Listado de Tareas</h2>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>ID:</strong> " . $row["id"] . "<br>";
            echo "<strong>Título:</strong> " . $row["titulo"] . "<br>";
            echo "<strong>Descripción:</strong> " . $row["descripcion"];
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron tareas.";
    }
    ?>

    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
