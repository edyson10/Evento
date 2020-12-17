<?php


include ("Datos.php");

//metodo que conecta con la base de datos


$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Contrasena"],$_POST["Usuario"])AND $_POST["Contrasena"]!='' AND $_POST["Usuario"]!='' ){


//creacion de las variables
    $usuario=$_POST["Usuario"];
    $contrasena=$_POST["Contrasena"];

//consulta
    $consulta="SELECT * FROM `administrador` WHERE Nombre='$usuario' AND Contraseña='$contrasena' ";
    $q=mysqli_query($enlace,$consulta);


// valida que encontro la busqueda
    if($row=mysqli_fetch_array($q)){

   echo '<script>
     document.location="http://localhost/Pagina/html/Menu.html"
     </script>';

    }else{

 echo '<script> alert ("Usuario o Contraseña incorrecta")
     document.location="http://localhost/Pagina/html/Login.html"
     </script>';

 }

///cierra metodo

}else{
    echo '<script>
      alert("Faltan Datos")
      document.location="http://localhost/Pagina/html/Login.html"
     </script>';
    }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="http://localhost/Pagina/html/index.html"
   </script>';
  }

?>
