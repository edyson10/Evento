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
  <title>Lista Facturas</title>
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
				<a class="nav-link" href="../php/Factura.php" id="Regresar">Regresar</a>
			</li>
    </ul>
  </div>
  </div>
</nav>

<br><br><br><br><br>

<?php
//comienza el metodo de listado

//valida si hay un campo que contiene un valor
if(!isset($_POST["NombreCliente"],$_POST["NombreAdmin"],$_POST["Fecha"])
OR $_POST["NombreCliente"]!='' OR $_POST["NombreAdmin"]!='' OR $_POST["Fecha"]!=''){

//consulta inicial
	$consulta="SELECT *  FROM `factura` WHERE ";
	//cont es una variable para saber si se deben concadenar AND

 	$cont=0;

	if($_POST["NombreCliente"]!=''){
		$nombrecliente=$_POST["NombreCliente"];
		$consulta.="NombreCliente LIKE '%".$nombrecliente."%'";
		$cont++;
	}

	if($_POST["NombreAdmin"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$nombreadmin=$_POST["NombreAdmin"];
		$consulta.="NombreAdmin LIKE '%".$nombreadmin."%'";
	}


	if($_POST["Fecha"]!=''){
		if($cont==1){
				$consulta.=" AND ";
		}else {
			$cont++;
		}
		$fecha=$_POST["Fecha"];
		$consulta.="Fecha='".$fecha."'";
	}


}else {
	$consulta="SELECT *  FROM `factura`";
}

//para ver como se concadena la consulta
//echo '<script>
//		alert("'.$consulta.'");
//	 </script>';

$q=mysqli_query($enlace,$consulta);

echo "<table align=center cellpadding='10' border='2'>";
echo "<tr><td colspan='10' alig='center'><h3 align=center>LISTADO DE FACTURAS</h3></td></tr>";
echo "<tr><td ><h3 align=center >ID</h3></td>";
echo "<td><h3 align=center >FECHA</h3></td>";
echo "<td><h3 align=center >CLIENTE</h3></td>";
echo "<td><h3 align=center >ADMINISTRADOR</h3></td>";
echo "<td><h3 align=center >PRODUCTOS</h3></td>";
echo "<td><h3 align=center >TOTAL</h3></td>";

while($row=mysqli_fetch_array($q)){

$id=$row["idFactura"];
$fecha=$row["Fecha"];
$cliente=$row["Cliente"];
$administrador=$row["Administrador"];
$productos="";

$consulta="SELECT * FROM `cliente` WHERE idCliente='$cliente'";
$q1=mysqli_query($enlace,$consulta);
$tra=mysqli_fetch_array($q1);
$cliente=$tra["Nombre"];

$consulta="SELECT * FROM `administrador` WHERE IdAdministrador='$administrador'";
$q1=mysqli_query($enlace,$consulta);
$tra=mysqli_fetch_array($q1);
$administrador=$tra["Nombre"];

$consulta="SELECT * FROM `producto` WHERE idProducto=(
SELECT Producto FROM `productoxfactura` WHERE Factura='$id')";
$q1=mysqli_query($enlace,$consulta);

while($tra=mysqli_fetch_array($q1)){
	if($productos==""){
		$productos.=$tra["Nombre"];
	}else {
		$productos.=", ".$tra["Nombre"]."";
	}

}

//metodo para calcular el total de la factura
$total=0;
$consulta="SELECT producto.Precio , productoxfactura.Cantidad FROM `producto`,`productoxfactura`
WHERE producto.idProducto=productoxfactura.Producto AND Factura='$id'";
	$q1=mysqli_query($enlace,$consulta);
while($tra=mysqli_fetch_array($q1)){
$precio=$tra["Precio"];
$cantidad=$tra["Cantidad"];
$total+=$cantidad*$precio;
}


echo "</tr><td>";
echo "$id";
echo "</td><td>";
echo "$fecha";
echo "</td><td>";
echo "$cliente";
echo "</td><td>";
echo "$administrador";
echo "</td><td>";
echo "$productos";
echo "</td><td>";
echo "$total";
}

echo "</table>";
echo "<br><br><br>";
echo "<form  action='../php/Factura.php' method='post'>
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
