<?php


include ("Datos.php");

//metodo que conecta con la base de datos


$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");


      //revisar que se escriba el dato a modificar
        if(isset($_POST["Nombre"],$_POST["Precio"],$_POST["Cantidad"]
        ,$_POST["Color"],$_POST["Descripcion"])AND $_POST["Nombre"]!='' AND $_POST["Precio"]!=''AND $_POST["Cantidad"]!=''
        AND $_POST["Color"]!=''OR $_POST["Descripcion"]!=''){

//creacion de las variables
$id=$_POST["Id"];
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

    //traer el id del tipo de accesorio
    $consultaID= "SELECT idTipo FROM `tipo` WHERE Nombre='$tipo' ";
    $con=mysqli_query($enlace,$consultaID);
    $contipo =mysqli_fetch_array($con);

$consulta="UPDATE `producto` SET Nombre='$nombre',Precio='$precio',Cantidad='$cantidad',
                                  Servicio='$servicio', Descripcion='$descripcion',
                                  Tipo='$contipo[idTipo]', Talla='$talla', Color='$color',Imagen='$imagen',Estado='$estado'
                              WHERE idProducto='$id'";
$q=mysqli_query($enlace,$consulta);

if($q==0){

echo '<script> alert ("Ha ocurrido un error, intente de nuevo o mas tarde")
 document.location="../php/Productos.php"
</script>';

}else{

echo '<script> alert ("El producto ha sido modificado correctamente")
 document.location="../php/Productos.php"
 </script>';

}




///cierra metodo
}else{
echo '<script>
    alert("Todos los campos deben estar completos")
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
