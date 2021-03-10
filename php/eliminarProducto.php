<?php 

include("connection.php");

if(empty($_REQUEST['id'])){
    header("location: consultarProductos.php");
} else {

    $Id_Producto = $_REQUEST['id'];

    $consulta = "SELECT Id_Producto, Nombre FROM productos WHERE Id_Producto LIKE $Id_Producto";
    $resultado = mysqli_query($connect, $consulta);
    
    $datos = mysqli_num_rows($resultado);

    if ($datos > 0){
        while($columna = mysqli_fetch_array($resultado)){
            $Id_Producto = $columna['Id_Producto'];
            $Nombre = $columna['Nombre'];
        }
    } else {
        header("location: consultaProductos.php");
    }
    if (!empty($_POST)){
        $Id_Producto = $_POST['Id_Producto'];

        $consultaEliminar = "DELETE FROM productos WHERE Id_Producto LIKE $Id_Producto";
        $resultado = mysqli_query($connect, $consultaEliminar);

        if($resultado){
            header("location: consultarProductos.php");
        } else {
            echo "Error al eliminar producto";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="css/Normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

</head>
<body>
    <div class="datos-eliminar">
        <h2>Se eliminara el producto con los siguientes datos</h2>
        <label>Id Producto:</label>
        <input type="number" readonly value="<?php echo $Id_Producto; ?>"><br>
        <label>Nombre:</label>
        <input type="text" readonly value="<?php echo $Nombre; ?>">
    </div>

    <form method="POST" action="" class="form-eliminar">
        <input type="hidden" name="Id_Producto" value="<?php echo "$Id_Producto"; ?>">
        <input class="btnAceptar" type="submit" value="Aceptar">
        <a class="btnCancelar" href="consultarProductos.php">Cancelar</a>
    </form>

</body>
</html>

