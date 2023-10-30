<?php

$Param=json_decode($_POST['Param']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Unicenter";
$conn = new mysqli($servername, $username, $password, $dbname);


if(!($conn->connect_error)){
    $query="INSERT INTO usuarios (nombre, apellido, correo,`contraseña`, permiso) VALUES (?,?,?,?,?)";
    //$query = ("UPDATE users SET id = ? , username = ? , password = ? ,company = ? WHERE 1 ");
    $stmt = $conn->prepare($query);

    $stmt->bind_param('sssss', $Param->nombre, $Param->apellido, $Param->correo, $Param->contraseña, $Param->permiso);

    $stmt->execute();

    

    $stmt->close();
    $conn->close();

   

    header('Content-Type: application/json');
    $returnValue=['status'=>$_POST['Param']];
    echo json_encode($returnValue);

    }else{
        die("Connection failed: " . $conn->connect_error);
      } 

?>
