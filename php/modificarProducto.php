<?php
    include ("connection.php");

    if (!empty($_REQUEST['id'])){
        $IdViejoProducto = $_REQUEST['id'];

        $consultaModificar = "SELECT * FROM productos WHERE Id_Producto LIKE $IdViejoProducto";
        $resultado = mysqli_query($connect, $consultaModificar);

        if ($resultado){
            while($datos = mysqli_fetch_array($resultado)){

                $IdViejoProducto = $datos['Id_Producto']; 
                $Nombre = $datos['Nombre']; 
                $Precio_Actual = $datos['PrecioActual'];
                $Stock = $datos['Stock']; 
                $Rut_Proveedor = $datos['FK_Proveedor']; 
                $Id_Categoria = $datos['FK_Categoria'];         
            }
        } else {
            header("location: consultarProductos.php");
        }
    }  
    if (isset($_POST['enviar'])){
        $nuevoIdPro = $_POST['Id_Producto'];
        $nuevoNombre = $_POST['nombre'];
        $nuevoPrecioActual = $_POST['precioActual'];
        $nuevoStock = $_POST['Stock'];
        $nuevoRutProveedor = $_POST['FK_Proveedor'];
        $nuevoIdCategoria = $_POST['FK_Categoria'];

        $consulta = "UPDATE productos SET Id_Producto=$nuevoIdPro, Nombre='$nuevoNombre', PrecioActual=$nuevoPrecioActual,
                        Stock=$nuevoStock, FK_Proveedor='$nuevoRutProveedor', FK_Categoria=$nuevoIdCategoria
                        WHERE Id_Producto LIKE $IdViejoProducto";
        
        $resultadoActualizar = mysqli_query($connect, $consulta);

        if ($resultadoActualizar){
            header("location: consultarProductos.php");
        } else {
            echo "Error" . $resultadoActualizar . "mysqli_error($connect)";
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="css/Normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
    <div class="contenedor-mod-productos">
        <h2>Modificar Producto</h2>
        <form method="POST" action="" class="form-mod-productos">
            <div class="labels-productos form-label-input">
                <label>Id Producto:</label>
                <input type="number" name="Id_Producto" value="<?php echo $IdViejoProducto; ?>"><br>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $Nombre; ?>"><br>
                <label>Precio Actual:</label>
                <input type="number" name="precioActual" value="<?php echo $Precio_Actual; ?>"><br>
                <label>Stock:</label>
                <input type="number" name="Stock" value="<?php echo $Stock; ?>"><br>
                <label>Rut Proveedor:</label>
                <input type="text" name="FK_Proveedor" value="<?php echo $Rut_Proveedor; ?>"><br>
                <label>Id Categoria:</label>          
                <input type="number" name="FK_Categoria" value="<?php echo $Id_Categoria; ?>">
            </div>
            <input type="hidden" name="IdViejoProducto" value="<?php echo "$IdViejoProducto"; ?>">
            <input class="btnAceptar" name ="enviar" type="submit" value="Aceptar">
            <a class="btnCancelar" href="consultarProductos.php">Cancelar</a>
    
        </form>
    </div>
</body>
</html>








