<?php 

    include("connection.php");

    if(isset($_POST["enviar"])){

        $IdProducto = $_POST['IdProducto'];
        $Nombre = $_POST['nombre'];
        $PrecioActual = $_POST['precioActual'];
        $stock = $_POST['stock'];
        $RUT_Proveedor = $_POST['fk_proveedor'];
        $IdCategoria = $_POST['fk_categoria'];
  
        
        $insertar = "INSERT INTO productos (Id_Producto, Nombre, PrecioActual, Stock, FK_Proveedor, FK_Categoria)
                        VALUES ($IdProducto, '$Nombre', $PrecioActual, $stock, '$RUT_Proveedor', $IdCategoria)";

        if (mysqli_query($connect,$insertar)) {
            echo "<script>alert('Se ha resgistrado con exito'); window.location='../html/Productos.html'</script>";
        }
        else {
            echo "Error" . $insertar . "mysqli_error($connect)";
        }
         
        $connect->close();

    }

?>