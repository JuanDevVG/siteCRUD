<?php
    include ("connection.php");
    if(isset($_POST["enviar"])){

        $RUT = $_POST['rutCliente'];
        $Nombre = $_POST['nombre'];
        $Telefono = $_POST['telefono'];
        $calle = $_POST['calle'];
        $numeroDir = $_POST['numeroDir'];
        $comuna = $_POST['comuna'];
        $ciudad = $_POST['ciudad'];

        $insertar1 = "INSERT INTO clientes (RUT, Nombre)
                    VALUES ('$RUT', '$Nombre')";
        if (mysqli_query($connect, $insertar1)) {

            $insertar2 = "INSERT INTO telefonos (FK_Cliente, Telefono)
                        VALUES ('$RUT', '$Telefono')";
            if (mysqli_query($connect, $insertar2)) {

                $insertar3 = "INSERT INTO direcciones (FK_Cliente, Calle, Numero, Comuna, Ciudad)
                            VALUES ('$RUT', '$calle', '$numeroDir', '$comuna', '$ciudad')";
            }
        }
        
        if(mysqli_query($connect, $insertar3)){
           echo "<script>alert('Se ha resgistrado con exito'); window.location='../html/Clientes.html'</script>";
        }
        else {
           echo "Error" . $sql . "mysqli_error($connect)";
        }
        
        $connect->close();
    }

?>