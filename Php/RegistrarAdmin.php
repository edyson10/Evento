<?php


include ("Datos.php");

//metodo que conecta con la base de datos


$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Contrasena"],$_POST["Nombre"])AND $_POST["Contrasena"]!='' AND $_POST["Nombre"]!='' ){


//creacion de las variables
    $usuario=$_POST["Nombre"];
    $contrasena=$_POST["Contrasena"];
    $email=$_POST["Email"];
    $telefono=$_POST["Telefono"];


    $consulta="INSERT INTO `administrador` (`Nombre`,`Contraseña`,`Email`,`Telefono`) VALUES ('$usuario','$contrasena','$email','$telefono')";
    $q=mysqli_query($enlace,$consulta);

    if(mysqli_fetch_array($q)){

 echo '<script> alert ("Ha ocurrido un error, intente de nuevo o mas tarde")
     document.location="../php/Administradores.php"
     </script>';

    }else{

 echo '<script> alert ("Registrado nuevo administrador correctamente")
     document.location="../php/Administradores.php"
     </script>';

 }

}else{
    echo '<script>
      alert("El Nombre y la Contraseña son necesarios para registrar un administrador ")
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
