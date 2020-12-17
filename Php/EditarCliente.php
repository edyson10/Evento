<?php


include ("Datos.php");

//metodo que conecta con la base de datos


$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");

      //revisar que nombre y cedula no esten vacios
        if(isset($_POST["Cedula"],$_POST["Nombre"])AND $_POST["Cedula"]!='' AND $_POST["Nombre"]!=''){

//creacion de las variables

    $id=$_POST["Id"];
    $cedula=$_POST["Cedula"];
    $nombre=$_POST["Nombre"];
    $telefono=$_POST["Telefono"];
    $email=$_POST["Email"];


  $consulta="UPDATE `cliente` SET Nombre='$nombre',Cedula='$cedula',Telefono='$telefono',Email='$email'  WHERE idCliente='$id'";
  $q=mysqli_query($enlace,$consulta);

if($cam =mysqli_fetch_array($q)){
  echo '<script> alert ("ha ocurrido un error, intente de nuevo")
    document.location="../php/Clientes.php"
    </script>';
}else {
   echo '<script> alert ("El cliente ha sido modificado correctamente")
     document.location="../php/Clientes.php"
     </script>';
   }

///cierra metodo
}else{
echo '<script>
    alert("Los campos Nombre y Cedula no pueden estar vacios")
    document.location="../php/Clientes.php"
   </script>';
  }


}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="http://localhost/Pagina/html/index.html"
   </script>';
  }

?>
