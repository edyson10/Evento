<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");

      //revisar que nombre  no este vacio
        if(isset($_POST["Nombre"]) AND $_POST["Nombre"]!=''){

//creacion de las variables

    $id=$_POST["Id"];
    $nombre=$_POST["Nombre"];
    $descuento=$_POST["Descuento"];
    $estado=$_POST["Estado"];



  $consulta="UPDATE `combo` SET Nombre='$nombre',Estado='$estado',Descuento='$descuento'  WHERE idCombo='$id'";
  $q=mysqli_query($enlace,$consulta);

if($cam =mysqli_fetch_array($q)){
  echo '<script> alert ("ha ocurrido un error, intente de nuevo")
    document.location="../php/Clientes.php"
    </script>';
}else {
   echo '<script> alert ("El combo ha sido modificado correctamente")
     document.location="../php/Combos.php"
     </script>';
   }

///cierra metodo
}else{
echo '<script>
    alert("Los campo Nombre no puede estar vacio")
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
