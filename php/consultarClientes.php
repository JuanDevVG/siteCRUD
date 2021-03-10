<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
    <link rel="stylesheet" href="css/Normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://kit.fontawesome.com/3d2d747a7d.js" crossorigin="anonymous"></script>

</head>
<body>
    <a class="back-consultar" href="../html/Clientes.html"><i class="fas fa-hand-point-left"></i></a>

    <h2>Clientes</h2>
    <table>
        <tr>
            <th>RUT</th>
            <th>Nombre</th>
            <th>Calle</th>
            <th>Numero</th>
            <th>Comuna</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>

<?php

    include("connection.php");

    $consulta = "SELECT clientes.*, Calle, Numero, Comuna, Ciudad, Telefono  
                FROM clientes INNER JOIN direcciones ON clientes.RUT=direcciones.FK_Cliente
                INNER JOIN telefonos ON clientes.RUT=telefonos.FK_Cliente";
    
    $resultado = mysqli_query($connect, $consulta);

    while ($columna = mysqli_fetch_array($resultado)) {
?>
        <tr>
            <td><?php echo $columna['RUT']; ?></td>
            <td><?php echo $columna['Nombre']; ?></td>
            <td><?php echo $columna['Calle']; ?></td>
            <td><?php echo $columna['Numero']; ?></td>
            <td><?php echo $columna['Comuna']; ?></td>
            <td><?php echo $columna['Ciudad']; ?></td>
            <td><?php echo $columna['Telefono']; ?></td>
            <td>
                <nav class="nave-borr-mod-productos">
                    <a class="btnEliminar" href="eliminarClientes.php?RUT=<?php echo $columna["RUT"]; ?>">
                        <i class='fas fa-trash-alt'></i></a>
                    <a class="btnModificar" href="modificarClientes.php?RUT=<?php echo $columna["RUT"]; ?>">
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
