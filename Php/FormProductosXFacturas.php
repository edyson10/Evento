<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
@mysqli_query("set names'utf8'");

if($_POST["Administrador"]=='SELECCIONE' OR $_POST["Cliente"]=='SELECCIONE'){
  echo '<script>
    alert("Seleccione el administrador y el cliente")
    document.location="../php/Factura.php"
   </script>';
 }else{

   $administrador=$_POST["Administrador"];
   $cliente=$_POST["Cliente"];
   $fecha=$_POST["Fecha"];

$consulta="SELECT * FROM `administrador` WHERE Nombre='$administrador'";
$q=mysqli_query($enlace,$consulta);
$row=mysqli_fetch_array($q);
$consulta="SELECT * FROM `cliente` WHERE Cedula='$cliente'";
$q=mysqli_query($enlace,$consulta);
$row2=mysqli_fetch_array($q);


   $consulta="INSERT INTO `factura` (`Cliente`,`Administrador`,`Fecha`) VALUES ('$row2[idCliente]','$row[IdAdministrador]','$fecha')";
   $q=mysqli_query($enlace,$consulta);
   $cam =mysqli_fetch_array($q);

$consulta= "SELECT idFactura from factura ORDER BY idFactura DESC LIMIT 1";
$q=mysqli_query($enlace,$consulta);
$cam =mysqli_fetch_array($q);

 ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar productos</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="../css/categoria.css" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>


  <nav class="navbar navbar-expand-lg fixed-top">

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
            <a class="nav-link" href="../html/About.html" id="contactanos">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../html/Contacto.html" id="contactanos">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/Menu.html" id="contactanos">Administrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<br><br><br><br><br>

  <form class="" action="http://localhost/Pagina/Php/AgregarProductoXFactura.php" method="post" autocomplete="off">
    <table align=center>
      <tr>
        <td colspan="2">
          <div class="" align=center>
            <h2>REGISTRAR PRODUCTOS <br> EN FACTURA </h2>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="field_1" class="">
            <label for="field_1" class="required">
              ID
            </label>
            <?php
              $id=$cam["idFactura"];
              echo '<input type="text" name="Id" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$id.'" readonly>';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad1" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto1">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad2" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto2">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad3" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto3">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad4" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto4">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad5" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto5">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad6" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto6">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad7" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto7">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad8" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto8">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad9" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto9">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              CANTIDAD
            </label>
            <input type="number" name="Cantidad10" value="" class="form-control input-text required-entry standard-matt-field  apellidos" >
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRODUCTO
            </label>
            <br>
            <select name="Producto10">
              <option>SELECCIONE</option>
              <?php
                $consulta="SELECT * FROM `producto` WHERE Estado='Activo' ";
                $q=mysqli_query($enlace,$consulta);
                while ($con =mysqli_fetch_array($q)) {
                   echo '<option>'.$con[Nombre].'</option>';
                }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="buttons-set" align=center>
            <button type="submit" name="Editar">AGREGAR</button>
          </div>
        </td>
      </tr>
    </table>
  </form>



  <section id="footer" class="g-light-dark">
    <div class="container">
      <img src="../imagenes/logo.png" class="logo-brand" alt="logo">
      <ul class="list-inline">
        <li class="list-inline-item footer-menu"> <a href="../html/index.html">Home</a></li>
        <li class="list-inline-item footer-menu"> <a href="../html/Novias.html">Novias</a></li>

        <li class="list-inline-item footer-menu"> <a href="../html/Tuxedos.html">Tuxedos</a></li>
        <li class="list-inline-item footer-menu"> <a href="../html/Fiestas.html">Fiestas</a></li>

        <li class="list-inline-item footer-menu"> <a href="../html/About.html">About</a></li>
        <li class="list-inline-item footer-menu"> <a href="../html/Contacto.html">Contacto</a></li>
      </ul>
      <ul class="list-inline">
        <li class="list-inline-item"> <a href="https://www.instagram.com/anasandovaldisenadora/?hl=es-la">
            <ion-icon name="logo-instagram"></ion-icon>
          </a> </li>
        <li class="list-inline-item"> <a href="https://www.facebook.com/Anasancoval0410/">
            <ion-icon name="logo-facebook"></ion-icon>
          </a> </li>
        <li class="list-inline-item"> <a href=https://api.whatsapp.com/send?phone=573103378210&text=Hola%20estoy%20interesad@%20en%20tus%20dise%C3%B1os">
            <ion-icon name="logo-whatsapp"></ion-icon>
          </a> </li>
        <li class="list-inline-item"> <a href="https://www.youtube.com/channel/UCZr_SX8tIogDdUo7r_DaEsQ">
            <ion-icon name="logo-youtube"></ion-icon>
          </a> </li>
      </ul>
      <small>Todos los derechos reservados ® Ana Sandoval 2020</small>
    </div>
  </section>
</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>

<?php
}
}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }
 ?>
