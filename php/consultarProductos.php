<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar productos</title>
    <link rel="stylesheet" href="css/Normalize.css" type="text/css">
    <script src="https://kit.fontawesome.com/3d2d747a7d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>

<?php

    include("connection.php");

    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($connect, $consulta);
?>
    <a class="back-consultar" href="../html/Productos.html"><i class="fas fa-hand-point-left"></i></a>

    <h2>Productos</h2>

    <table>
        <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Precio Actual</th>
            <th>Stock</th>
            <th>RUT Proveedor</th>
            <th>Id Categoria</th>
            <th>Acciones</th>
        </tr>
<?php
    while ($columna = mysqli_fetch_array($resultado)) {
    ?>    
        <tr>
            <td><?php echo $columna['Id_Producto']; ?></td>
            <td><?php echo $columna['Nombre']; ?></td>
            <td><?php echo $columna['PrecioActual']; ?></td>
            <td><?php echo $columna['Stock']; ?></td>
            <td><?php echo $columna['FK_Proveedor']; ?></td>
            <td><?php echo $columna['FK_Categoria']; ?></td>
            <td>
                <nav class="nave-borr-mod-productos">
                    <a class="btnEliminar" href="eliminarProducto.php?id=<?php echo $columna["Id_Producto"]; ?>">
                        <i class='fas fa-trash-alt'></i></a>
                    <a class="btnModificar" href="modificarProducto.php?id=<?php echo $columna["Id_Producto"]; ?>">
                        <i class='fas fa-edit'></i></a>
                </nav>
            </td>
        </tr>
    <?php
    }

    echo "</table>";

    mysqli_close($connect);

?>
 

</body>
</html>