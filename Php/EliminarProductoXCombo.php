<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Producto"])AND $_POST["Producto"]!='SELECCIONE'){

//creacion de las variables
    $combo=$_POST["Combo"];
    $producto=$_POST["Producto"];

//traer la id del combo y del producto
$consulta="SELECT idProducto FROM `producto` WHERE Nombre='$producto' ";
$q=mysqli_query($enlace,$consulta);

$cam =mysqli_fetch_array($q);

  $consulta="DELETE FROM `productoxcombo` WHERE Producto='$cam[idProducto]' AND Combo='$combo' ";
  $q=mysqli_query($enlace,$consulta);


if ($cam =mysqli_fetch_array($q)) {
  echo '<script> alert ("Ha ocurrido un error")
      document.location="../php/Combos.php"
      </script>';
}else {
  echo '<script> alert ("El producto se borro correctamete en ese combo")
      document.location="../php/Combos.php"
      </script>';
}

}else{
    echo '<script>
      alert("Seleccione el producto a eliminar")
      document.location="../php/Combos.php"
     </script>';
    }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }

?>
