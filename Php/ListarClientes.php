<?php
//importa clases para la coneccion
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
//correccion de error de insercion
@mysqli_query("set names'utf8'");
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Cliente</title>
		 <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link href="../css/style.css" rel="stylesheet">
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>



<nav class="navbar navbar-expand-lg fixed-top ">

  <div class="container">
  <a class="navbar-brand" href="../html/index.html"> <img src="../imagenes/1.jpg" class="logo-brand" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <ion-icon name="menu-outline"></ion-icon>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../html/index.html" id="home">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../html/Novias.html" id="portafolio">Novias</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../html/Tuxedos.html" id="quienessomos">Tuxedos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../html/Fiestas.html" id="contactanos">Fiestas</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../html/Quince.html" id="contactanos">Quince</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../html/About.html" id="contactanos">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../html/Contacto.html" id="contactanos">Contacto</a>
      </li>
			<li class="nav-item">
				<a class="nav-link" href="../php/Clientes.php" id="Regresar">Regresar</a>
			</li>
    </ul>
  </div>
  </div>
</nav>

<br><br><br><br><br>

<?php

//comienza el metodo de listado
if(!isset($_POST["Nombre"],$_POST["Cedula"],$_POST["Telefono"],$_POST["Email"])
OR $_POST["Nombre"]!='' OR $_POST["Cedula"]!='' OR $_POST["Telefono"]!='' OR $_POST["Email"]!=''){

//consulta inicial
	$consulta="SELECT *  FROM `cliente` WHERE ";
	//cont es una variable para saber si se deben concadenar AND
 	$cont=0;

	if($_POST["Nombre"]!=''){
		$nombre=$_POST["Nombre"];
		$consulta.="Nombre LIKE '%".$nombre."%'";
		$cont++;
	}

	if($_POST["Cedula"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$cedula=$_POST["Cedula"];
		$consulta.="Cedula LIKE '%".$cedula."%'";
	}


	if($_POST["Telefono"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$telefono=$_POST["Telefono"];
		$consulta.="Telefono LIKE '%".$telefono."%'";
	}


	if($_POST["Email"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$email=$_POST["Email"];
		$consulta.="Email LIKE '%".$email."%'";
	}

}else {
	$consulta="SELECT *  FROM `cliente`";
}



//para ver como se concadena la consulta
//echo '<script>
//		alert("'.$consulta.'");
//	 </script>';


$q=mysqli_query($enlace,$consulta);


echo "<table align=center cellpadding='5' border='2'>";
echo "<tr><td colspan='5' alig='center'><h3 align=center>LISTADO DE CLIENTES</h3></td></tr>";
echo "<tr><td ><h3 align=center >ID</h3></td>";
echo "<td><h3 align=center >CEDULA</h3></td>";
echo "<td><h3 align=center >NOMBRE</h3></td>";
echo "<td><h3 align=center >EMAIL</h3></td>";
echo "<td><h3 align=center >TELEFONO</h3></td></tr>";

while($row=mysqli_fetch_array($q)){

$idcliente=$row["idCliente"];
$Cedula=$row["Cedula"];
$Nombre=$row["Nombre"];
$Email=$row["Email"];
$Telefono=$row["Telefono"];


echo "</tr><td>";
echo "$idcliente";
echo "</td><td>";
echo "$Cedula";
echo "</td><td>";
echo "$Nombre";
echo "</td><td>";
echo "$Email";
echo "</td><td>";
echo "$Telefono";


}

echo "</table>";
echo "<br><br><br>";
echo "<form  action='../php/Clientes.php' method='post'>
  <div class='buttons-set' align=center>
    <button type='submit' name='Regresar'  >Regresar</button>
  </div>
</form>";

?>


   <section id="footer" class="g-light-dark">
       <div class="container">
       <img src="../imagenes/logo.png" class="logo-brand" alt="logo">
       <ul class="list-inline">
         <li class="list-inline-item footer-menu"> <a href="../html/index.html">Home</a></li>
         <li class="list-inline-item footer-menu"> <a href="../html/Novias.html">Novias</a></li>

         <li class="list-inline-item footer-menu"> <a href="../html/Tuxedos.html">Tuxedos</a></li>
         <li class="list-inline-item footer-menu"> <a href="../html/Fiestas.html">Fiestas</a></li>
         <li class="list-inline-item footer-menu"> <a href="../html/Quince.html">Quince</a></li>

         <li class="list-inline-item footer-menu"> <a href="../html/About.html">About</a></li>
         <li class="list-inline-item footer-menu"> <a href="../html/Contacto.html">Contacto</a></li>
       </ul>
       <ul class="list-inline">
         <li class="list-inline-item"> <a href="https://www.instagram.com/anasandovaldisenadora/?hl=es-la"> <ion-icon name="logo-instagram"></ion-icon>  </a> </li>
         <li class="list-inline-item"> <a href="https://www.facebook.com/Anasancoval0410/"> <ion-icon name="logo-facebook"></ion-icon>  </a> </li>
         <li class="list-inline-item"> <a href=https://api.whatsapp.com/send?phone=573103378210&text=Hola%20estoy%20interesad@%20en%20tus%20dise%C3%B1os"> <ion-icon name="logo-whatsapp"></ion-icon>  </a> </li>
         <li class="list-inline-item"> <a href="https://www.youtube.com/channel/UCZr_SX8tIogDdUo7r_DaEsQ"> <ion-icon name="logo-youtube"></ion-icon>  </a> </li>
     </ul>
       <small>Todos los derechos reservados ® Ana Sandoval 2020</small>
     </div>
   </section>
 </body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="../js/jquery-3.5.1.slim.min.js" ></script>
 <script src="../js/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="../js/bootstrap.min.js" ></script>
 </body>
 </html>


<?php
}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }
 ?>
