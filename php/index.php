<?php
// Conexión a la primera base de datos
$conexion1 = mysqli_connect("localhost", "root", "", "Unicenter");

// Conexión a la segunda base de datos
$conexion2 = mysqli_connect("localhost", "root", "", "Unicenter");

// Verificar las conexiones
if (!$conexion1 || !$conexion2) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Realizar la primera consulta en la primera base de datos
$query1 = "SELECT * FROM usuarios";
$result1 = mysqli_query($conexion1, $query1);

// Crear un array para almacenar los resultados de la primera consulta
$array1 = array();

while ($fila = mysqli_fetch_assoc($result1)) {
    $array1[] = $fila;
}

// Realizar la segunda consulta en la segunda base de datos
$query2 = "SELECT * FROM noticias";
$result2 = mysqli_query($conexion2, $query2);

// Crear un array para almacenar los resultados de la segunda consulta
$array2 = array();

while ($fila = mysqli_fetch_assoc($result2)) {
    $array2[] = $fila;
}

// Cerrar las conexiones a las bases de datos
mysqli_close($conexion1);
mysqli_close($conexion2);

// Convertir los arrays en formato JSON
$json1 = json_encode($array1);
$json2 = json_encode($array2);

// Imprimir los JSON
echo "var datos1 = " . $json1 . ";";
echo "var datos2 = " . $json2 . ";";
?>

