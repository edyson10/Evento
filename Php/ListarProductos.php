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
  <title>Lista Productos</title>
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
				<a class="nav-link" href="../php/Productos.php" id="Regresar">Regresar</a>
			</li>
    </ul>
  </div>
  </div>
</nav>

<br><br><br><br><br>

<?php
//comienza el metodo de listado

//valida si hay un campo que contiene un valor
if(!isset($_POST["Nombre"],$_POST["Precio"],$_POST["Cantidad"],$_POST["Estado"],$_POST["Servicio"],$_POST["Color"])
OR $_POST["Nombre"]!='' OR $_POST["Precio"]!='' OR $_POST["Cantidad"]!='' OR $_POST["Color"]!=''OR $_POST["Estado"]!='SELECCIONE' OR $_POST["Servicio"]!='SELECCIONE'){

//consulta inicial
	$consulta="SELECT *  FROM `producto` WHERE ";

	//cont es una variable para saber si se deben concadenar AND

 	$cont=0;



	if($_POST["Nombre"]!=''){
		$nombre=$_POST["Nombre"];
		$consulta.="Nombre LIKE '%".$nombre."%'";
		$cont++;
	}

	if($_POST["Precio"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$precio=$_POST["Precio"];
		$consulta.="Precio='".$precio."'";
	}


	if($_POST["Color"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$color=$_POST["Color"];
		$consulta.="Color='".$color."'";
	}


	if($_POST["Cantidad"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$cantidad=$_POST["Cantidad"];
		$consulta.="Cantidad='".$cantidad."'";
	}


	if($_POST["Estado"]!='SELECCIONE'){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$estado=$_POST["Estado"];
		$consulta.="Estado='".$estado."'";
	}


	if($_POST["Servicio"]!='SELECCIONE'){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$servicio=$_POST["Servicio"];
		$consulta.="Servicio='".$servicio."'";
	}

}else {
	$consulta="SELECT *  FROM `producto`";
}

//para ver como se concadena la consulta
//echo '<script>
//		alert("'.$consulta.'");
//	 </script>';


$q=mysqli_query($enlace,$consulta);



echo "<table align=center cellpadding='10' border='2'>";
echo "<tr><td colspan='10' alig='center'><h3 align=center>LISTADO DE PRODUCTOS</h3></td></tr>";
echo "<tr><td ><h3 align=center >ID</h3></td>";
echo "<td><h3 align=center >NOMBRE</h3></td>";
echo "<td><h3 align=center >PRECIO</h3></td>";
echo "<td><h3 align=center >CANTIDAD</h3></td>";
echo "<td><h3 align=center >ESTADO</h3></td>";
echo "<td><h3 align=center >SERVICIO</h3></td>";
echo "<td><h3 align=center >DESCRIPCION</h3></td>";
echo "<td><h3 align=center >TIPO</h3></td>";
echo "<td><h3 align=center >TALLA</h3></td>";
echo "<td><h3 align=center >COLOR</h3></td></tr>";



while($row=mysqli_fetch_array($q)){

$id=$row["idProducto"];
$nombre=$row["Nombre"];
$precio=$row["Precio"];
$cantidad=$row["Cantidad"];
$estado=$row["Estado"];
$servicio=$row["Servicio"];
$descripcion=$row["Descripcion"];
$tipo=$row["Tipo"];
$talla=$row["Talla"];
$color=$row["Color"];

echo "</tr><td>";
echo "$id";
echo "</td><td>";
echo "$nombre";
echo "</td><td>";
echo "$precio";
echo "</td><td>";
echo "$cantidad";
echo "</td><td>";
echo "$estado";
echo "</td><td>";
echo "$servicio";
echo "</td><td>";
echo "$descripcion";
echo "</td><td>";
echo "$tipo";
echo "</td><td>";
echo "$talla";
echo "</td><td>";
echo "$color";

}

echo "</table>";
echo "<br><br><br>";
echo "<form  action='../php/Productos.php' method='post'>
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
