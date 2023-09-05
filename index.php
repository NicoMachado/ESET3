<?php
// Incluye las clases y archivos necesarios.
//require_once 'ConexionBD.php';
//require_once 'AlumnoController.php';
require_once 'controlador/SiteController.php';

$site = new SiteController();

$site->admin();


exit(1);
return;

// Verifica si se proporciona la ruta y la acción en la URL.
if (isset($_GET['r'])) {
    $rutaAccion = $_GET['r'];

    // Divide la ruta y la acción utilizando el carácter "/" como separador.
    $rutaAccionArray = explode('/', $rutaAccion);

    // Verifica si se proporciona un ID como parámetro.
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verifica si la ruta y la acción son válidas.
    if (count($rutaAccionArray) === 2) {
        $entidad = $rutaAccionArray[0];
        $accion = $rutaAccionArray[1];

        // Crea una instancia de la clase ConexionBD para la base de datos.
        $conexion = new ConexionBD("localhost", "usuario_db", "contrasena_db", "nombre_db");

        // Crea una instancia del controlador AlumnoController.
        $alumnoController = new AlumnoController();

        // Realiza las acciones correspondientes según la entidad y la acción.
        if ($entidad === 'alumno') {
            if ($accion === 'listar') {
                $alumnoController->admin();
            } elseif ($accion === 'ver' && $id !== null) {
                $alumnoController->view($id);
            } elseif ($accion === 'actualizar' && $id !== null) {
                $alumnoController->update($id);
            } elseif ($accion === 'eliminar' && $id !== null) {
                $alumnoController->delete($id);
            } else {
                echo "Acción no válida para la entidad 'alumno'";
            }
        } else {
            echo "Entidad no válida";
        }

        // Cierra la conexión a la base de datos.
        $conexion->cerrarConexion();
    } else {
        echo "Ruta y acción no válidas. Utiliza el formato 'entidad/accion'.";
    }
} else {

    echo "Por favor, proporciona la ruta y la acción en la URL.";
}
?>
