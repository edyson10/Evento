<?php


include ("Datos.php");

//metodo que conecta con la base de datos


$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Nombre"],$_POST["Cedula"],$_POST["Email"],$_POST["Telefono"])AND $_POST["Nombre"]!='' AND $_POST["Cedula"]!=''AND $_POST["Email"]!=''AND $_POST["Telefono"]!='' ){


//creacion de las variables
    $nombre=$_POST["Nombre"];
    $cedula=$_POST["Cedula"];
    $telefono=$_POST["Telefono"];
    $email=$_POST["Email"];

//validar cedula repetida
$consulta="SELECT *  FROM `cliente` WHERE Cedula='$cedula' ";
$q=mysqli_query($enlace,$consulta);

  if($row=mysqli_fetch_array($q)){
    echo '<script> alert ("La cedula ya se encuentra registrada")
        document.location="../php/Clientes.php"
        </script>';
  }else{


//insertar el cliente
    $consulta="INSERT INTO `cliente` (`Nombre`,`Cedula`,`Email`,`Telefono`) VALUES ('$nombre','$cedula','$email','$telefono')";

    $q=mysqli_query($enlace,$consulta);

    if($q==0){

 echo '<script> alert ("Ha ocurrido un error, intente de nuevo o mas tarde")
     document.location="../php/Clientes.php"
     </script>';

    }else{

 echo '<script> alert ("Creado Exitosamente")
     document.location="../php/Clientes.php"
     </script>';

 }
}
}else{
    echo '<script>
      alert("Faltan Datos")
      document.location="../php/Clientes.php"
     </script>';
    }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }

?>
