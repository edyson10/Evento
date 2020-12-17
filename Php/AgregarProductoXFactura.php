<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Cantidad1"],$_POST["Cantidad2"],$_POST["Cantidad3"],
              $_POST["Cantidad4"],$_POST["Cantidad5"],$_POST["Cantidad6"],
              $_POST["Cantidad7"],$_POST["Cantidad8"],$_POST["Cantidad9"],
              $_POST["Cantidad10"])
               OR $_POST["Producto1"]!='SELECCIONE' OR $_POST["Producto2"]!='SELECCIONE'
             OR $_POST["Producto3"]!='SELECCIONE'OR $_POST["Producto4"]!='SELECCIONE'
           OR $_POST["Producto5"]!='SELECCIONE'OR $_POST["Producto6"]!='SELECCIONE'
         OR $_POST["Producto7"]!='SELECCIONE'OR $_POST["Producto8"]!='SELECCIONE'
       OR $_POST["Producto9"]!='SELECCIONE'OR $_POST["Producto10"]!='SELECCIONE'){


//creacion de las variables
    $id=$_POST["Id"];

    $cantidad1=$_POST["Cantidad1"];
    $producto1=$_POST["Producto1"];
    $cantidad2=$_POST["Cantidad2"];
    $producto2=$_POST["Producto2"];
    $cantidad3=$_POST["Cantidad3"];
    $producto3=$_POST["Producto3"];
    $cantidad4=$_POST["Cantidad4"];
    $producto4=$_POST["Producto4"];
    $cantidad5=$_POST["Cantidad5"];
    $producto5=$_POST["Producto5"];
    $cantidad6=$_POST["Cantidad6"];
    $producto6=$_POST["Producto6"];
    $cantidad7=$_POST["Cantidad7"];
    $producto7=$_POST["Producto7"];
    $cantidad8=$_POST["Cantidad8"];
    $producto8=$_POST["Producto8"];
    $cantidad9=$_POST["Cantidad9"];
    $producto9=$_POST["Producto9"];
    $cantidad10=$_POST["Cantidad10"];
    $producto10=$_POST["Producto10"];

//traer la id del producto

$consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto1' ";
$q=mysqli_query($enlace,$consulta);
$cam =mysqli_fetch_array($q);

//insertar
    $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad1','$id')";
    $q=mysqli_query($enlace,$consulta);
    if($producto2!=''){
      $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto2' ";
      $q=mysqli_query($enlace,$consulta);
      $cam =mysqli_fetch_array($q);

      //insertar
          $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad2','$id')";
          $q=mysqli_query($enlace,$consulta);
    }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto3' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad3','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto4' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad4','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto5' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad5','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto6' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad6','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto7' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad7','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto8' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad8','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto9' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad9','$id')";
        $q=mysqli_query($enlace,$consulta);
        }
      if($producto2!=''){
        $consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto10' ";
        $q=mysqli_query($enlace,$consulta);
        $cam =mysqli_fetch_array($q);

        //insertar
        $consulta="INSERT INTO `productoxfactura` (`Producto`,`Cantidad`,`Factura`) VALUES ('$cam[idProducto]','$cantidad10','$id')";
        $q=mysqli_query($enlace,$consulta);
        }

 echo '<script> alert ("Productos agregado a factura Exitosamente")
     document.location="../php/Factura.php"
     </script>';



}else{
    echo '<script>
      alert("Faltan Datos")
      document.location="../php/Factura.php"
     </script>';
    }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }

?>
