<?php


// Comprobar que los datos fueron enviados mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Datos necesarios para conectarse con la base de datos
    $host = "fdb1029.awardspace.net"; // Servidor de la base de datos
    $servidor = "fdb1029.awardspace.net";
    $usuario = "4794851_pruebadb";
    $password = "melisalud09";
    $base_datos = "4794851_pruebadb";

    // Crear la conexión con MySQL
    $conexion = new mysqli($host, $usuario, $password, $base_datos);

    // Detener el proceso si no se pudo establecer la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener y limpiar los datos enviados desde el formulario
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $autor = $conexion->real_escape_string($_POST['autor']);
    $isbn = $conexion->real_escape_string($_POST['isbn']);

    // Preparar la consulta para guardar el nuevo libro
    $sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$titulo', '$autor',
    '$isbn')";

    // Ejecutar la consulta y comprobar si se guardó correctamente
    if ($conexion->query($sql) === TRUE) {

        // Volver al inicio indicando que el registro fue exitoso
        header("Location: index.php?success=1");
    } else {

        // Mostrar el error si no fue posible guardar el libro
        echo "Error al guardar el libro: " . $conexion->error;
    }

    // Cerrar la conexión cuando termina el proceso
    $conexion->close();
}
?>
