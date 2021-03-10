<?php 

    include("connection.php");

    if (!empty($_REQUEST['RUT'])){
        $rutViejo = $_REQUEST['RUT'];

        $consulta = "SELECT clientes.*, Calle, Numero, Comuna, Ciudad, Telefono  
                        FROM clientes INNER JOIN direcciones ON clientes.RUT=direcciones.FK_Cliente
                        INNER JOIN telefonos ON clientes.RUT=telefonos.FK_Cliente 
                        WHERE clientes.RUT LIKE $rutViejo";

        $resultado = mysqli_query($connect, $consulta);

        if ($resultado){
            while($columna = mysqli_fetch_array($resultado)){
                $RUT = $columna['RUT'];
                $Nombre = $columna['Nombre'];
                $Calle = $columna['Calle'];
                $Numero = $columna['Numero'];
                $Comuna = $columna['Comuna'];
                $Ciudad = $columna['Ciudad'];
                $Telefono = $columna['Telefono'];

            }
        }

    }

    if (isset($_POST['enviar'])){
        
        $rutViejo = $_POST['rutViejo'];
        $RUT_Nuevo = $_POST['rutCliente'];
        $NombreNuevo = $_POST['nombre'];
        $Calle = $_POST['calle'];
        $Numero = $_POST['numero'];
        $Comuna = $_POST['comuna'];
        $Ciudad = $_POST['ciudad'];
        $Telefono = $_POST['telefono'];

        $consulta = "UPDATE clientes cli INNER JOIN telefonos tel ON cli.RUT=tel.FK_Cliente
                        INNER JOIN direcciones dir ON cli.RUT=dir.FK_Cliente 
                        SET cli.RUT=$RUT_Nuevo, cli.Nombre='$NombreNuevo', tel.Telefono='$Telefono', tel.FK_Cliente=$RUT_Nuevo,
                        dir.Calle='$Calle', dir.Numero='$Numero', dir.Comuna='$Comuna', dir.Ciudad='$Ciudad', dir.FK_Cliente=$RUT_Nuevo
                        WHERE cli.RUT LIKE $rutViejo";

        $resultado = mysqli_query($connect, $consulta);
        if ($resultado){
            header("location: consultarClientes.php");
        } else {
            echo "Error al modificar";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Clientes</title>
    <link rel="stylesheet" href="css/Normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>

    <div>
        <h2>Modificar Cliente</h2>
        <form method="POST" action="" class="form-mod-productos">
            <div class="labels-productos form-label-input">
                <label>RUT:</label>
                <input type="text" name="rutCliente" value="<?php echo $RUT; ?>"><br>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $Nombre; ?>"><br>
                <label>Calle:</label>
                <input type="text" name="calle" value="<?php echo $Calle; ?>"><br>
                <label>Numero:</label>
                <input type="number" name="numero" value="<?php echo $Numero; ?>"><br>
                <label>Comuna:</label>
                <input type="number" name="comuna" value="<?php echo $Comuna; ?>"><br>
                <label>Ciudad:</label>
                <input type="text" name="ciudad" value="<?php echo $Ciudad; ?>"><br>
                <label>Telefono:</label>
                <input type="text" name="telefono" value="<?php echo $Telefono; ?>">
            </div>
            <input type="hidden" name="rutViejo" value="<?php echo $rutViejo ?>">
            <input type="submit" name="enviar" value="Aceptar" class="btnAceptar"> 
            <a href="consultarClientes.php" class="btnCancelar">Cancelar</a>

        </form>
    </div>

</body>
</html>