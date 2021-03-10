<?php 

    include ("connection.php");

    if (!empty($_REQUEST['RUT'])){
        $RUT = $_REQUEST['RUT'];

        $consulta = "SELECT Nombre FROM clientes WHERE RUT LIKE $RUT";
        $resultado = mysqli_query($connect, $consulta);

        $datosConsulta = mysqli_num_rows($resultado);

        if ($datosConsulta > 0) {
            while ($columna = mysqli_fetch_array($resultado)){
                $Nombre = $columna['Nombre'];
            }
        }
        
    } 
    if (isset($_POST['enviar'])){
        $RUT = $_POST['rutCliente'];
        
        $consultaClientes = "DELETE FROM clientes WHERE RUT LIKE $RUT";
        
        if (mysqli_query($connect, $consultaClientes)){
            $consultaTelefonos = "DELETE FROM telefonos WHERE FK_Cliente LIKE $RUT";
            
            if (mysqli_query($connect, $consultaTelefonos)){
                $consultaDirecciones = "DELETE FROM direcciones WHERE FK_Cliente LIKE $RUT";
            }
        }
        
        if (mysqli_query($connect, $consultaDirecciones)){    
            header("location: consultarClientes.php");
        }
        
        else {
            echo "Error al eliminar";
        }
    }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Clientes</title>
    <link rel="stylesheet" href="css/Normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
    <div class="datos-eliminar">
        <h2>Se eliminara el cliente con los siguientes datos</h2>
        <label>RUT Cliente: </label>
        <input type="text" name="rutCliente" readonly value="<?php echo $RUT; ?>"><br>
        <label>Nombre: </label>
        <input type="text" name="nombreCliente" readonly value="<?php echo $Nombre; ?>">
    </div>
    <form method="POST" action="" class="form-eliminar">
        <input type="hidden" name="rutCliente" value="<?php echo $RUT; ?>">
        <input class="btnAceptar" type="submit" name="enviar" value="Aceptar">
        <a href="consultarClientes.php" class="btnCancelar">Cancelar</a>
    </form>

</body>
</html>