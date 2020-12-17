<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");

      //revisar que se nombre y contra no esten vacios
        if(isset($_POST["Contrasena"],$_POST["Nombre"])AND $_POST["Contrasena"]!='' AND $_POST["Nombre"]!='' ){

//creacion de las variables

    $id=$_POST["Id"];
    $contrasena=$_POST["Contrasena"];
    $nombre=$_POST["Nombre"];
    $telefono=$_POST["Telefono"];
    $email=$_POST["Email"];


    $consulta="UPDATE `administrador` SET Nombre='$nombre',Contraseña='$contrasena',Telefono='$telefono',Email='$email'  WHERE IdAdministrador='$id'";
    $q=mysqli_query($enlace,$consulta);

  if($cam =mysqli_fetch_array($q)){
    echo '<script> alert ("ha ocurrido un error, intente de nuevo")
      document.location="../php/Administradores.php"
      </script>';
  }else {
   echo '<script> alert ("El administrador ha sido modificado correctamente")
     document.location="../php/Administradores.php"
     </script>';
   }

///cierra metodo
}else{
echo '<script>
    alert("Los campos Nombre y Cedula no pueden estar vacios")
    document.location="../php/Administradores.php"
   </script>';
  }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }

?>
