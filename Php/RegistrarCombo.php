<?php


include ("Datos.php");

//metodo que conecta con la base de datos


$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
  @mysqli_query("set names'utf8'");
//revisar campos no esten vacios
    if(isset($_POST["Nombre"],$_POST["Descuento"],$_POST["Estado"])AND $_POST["Nombre"]!='' AND $_POST["Descuento"]!=''AND $_POST["Estado"]!='SELECCIONE'){


//creacion de las variables
    $nombre=$_POST["Nombre"];
    $descuento=$_POST["Descuento"];
    $estado=$_POST["Estado"];

    //validar nombre repetido
    $consulta="SELECT *  FROM `combo` WHERE Nombre='$nombre' ";
    $q=mysqli_query($enlace,$consulta);

      if($row=mysqli_fetch_array($q)){
        echo '<script> alert ("El nombre del combo ya se encuentra registrado")
            document.location="../php/Combos.php"
            </script>';
      }else{

//insertar el combo
    $consulta="INSERT INTO `combo` (`Nombre`,`Descuento`,`Estado`) VALUES ('$nombre','$descuento','$estado')";

    $q=mysqli_query($enlace,$consulta);

    if($q==0){

 echo '<script> alert ("Ha ocurrido un error, intente de nuevo o mas tarde")
     document.location="../Php/Combos.php"
     </script>';

    }else{

 echo '<script> alert ("Combo creado Exitosamente")
     document.location="../Php/Combos.php"
     </script>';

 }
}
}else{
    echo '<script>
      alert("Faltan Datos")
      document.location="../Php/Combos.php"
     </script>';
    }

}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }

?>
