<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Nombre"],$_POST["Precio"],$_POST["Cantidad"],$_POST["Estado"],$_POST["Servicio"],$_POST["Imagen"],
    $_POST["Tipo"],$_POST["Talla"],$_POST["Color"],$_POST["Descripcion"])
    AND $_POST["Nombre"]!='' AND $_POST["Precio"]!='' AND $_POST["Cantidad"]!=''AND $_POST["Descripcion"]!=''
    AND $_POST["Estado"]!='SELECCIONE' AND $_POST["Servicio"]!='SELECCIONE'AND $_POST["Tipo"]!='SELECCIONE'AND $_POST["Talla"]!='SELECCIONE'AND $_POST["Color"]!=''){


//creacion de las variables
    $nombre=$_POST["Nombre"];
    $precio=$_POST["Precio"];
    $cantidad=$_POST["Cantidad"];
    $servicio=$_POST["Servicio"];
    $imagen=$_POST["Imagen"];
    $descripcion=$_POST["Descripcion"];
    $tipo=$_POST["Tipo"];
    $talla=$_POST["Talla"];
    $color=$_POST["Color"];
    $estado=$_POST["Estado"];

    //validar nombre repetido
    $consulta="SELECT *  FROM `producto` WHERE Nombre='$nombre' ";
    $q=mysqli_query($enlace,$consulta);

      if($row=mysqli_fetch_array($q)){
        echo '<script> alert ("El nombre del producto ya se encuentra registrado")
            document.location="../php/Productos.php"
            </script>';
      }else{

        //traer el id del tipo de accesorio
        $consultaID= "SELECT idTipo FROM `tipo` WHERE Nombre='$tipo' ";
        $con=mysqli_query($enlace,$consultaID);
        $contipo =mysqli_fetch_array($con);

   $consulta="INSERT INTO `producto` (`Nombre`, `Precio`, `Cantidad`, `Servicio`, `Imagen`, `Descripcion`, `Tipo`, `Talla`, `Color`, `Estado`)
              VALUES ('$nombre','$precio','$cantidad','$servicio', '$imagen', '$descripcion', '$contipo[idTipo]' ,'$talla', '$color', '$estado')";
    $q=mysqli_query($enlace,$consulta);

   if($q==0){

 echo '<script> alert ("Ha ocurrido un error, intente de nuevo o mas tarde")
     document.location="../php/Productos.php"
   </script>';

    }else{

 echo '<script> alert ("Registrado nuevo producto correctamente")
     document.location="../php/Productos.php"
     </script>';

 }
}
}else{
    echo '<script>
      alert("Faltan datos por llenar")
      document.location="../php/Productos.php"
     </script>';
    }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }

?>
