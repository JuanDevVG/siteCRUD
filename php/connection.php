<?php
    $nombreDB = "sistemaventas";
    $usuario ="root";
    $servidor ="localhost";
    $contrasena ="";

    $connect = mysqli_connect($servidor, $usuario, $contrasena, $nombreDB)
        or die("No se ha podido conectar con la base de datos");

    $db = mysqli_select_db($connect, $nombreDB);

?>