<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
@mysqli_query("set names'utf8'");

if($_POST["Combo"]=='SELECCIONE'){
  echo '<script>
    alert("Seleccione el combo a editar")
    document.location="../php/Combos.php"
   </script>';
 }else{
   $combo=$_POST["Combo"];
   $consulta="SELECT * FROM `combo` WHERE Nombre='$combo'  ";
   $q=mysqli_query($enlace,$consulta);
   $cam =mysqli_fetch_array($q);

 ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Combo</title>
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

  <form class="" action="http://localhost/Pagina/Php/EditarCombo.php" method="post" autocomplete="off">
    <table align=center>
      <tr>
        <td>
          <div class="" align=center>
            <h2>EDITAR COMBO</h2>
            <a>Al finalizar presiona Editar</a>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              ID
            </label>
            <?php
              $id=$cam["idCombo"];
              echo '<input type="text" name="Id" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$id.'" readonly>';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_32">
            <label for="field_1" class="required">
              NOMBRE
            </label>
            <?php
              $nombre=$cam["Nombre"];
              echo '<input type="text" name="Nombre" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$nombre.'">';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              DESCUENTO
              <em>(Porcentaje %)</em>
            </label>
            <?php
              $descuento=$cam["Descuento"];
              echo '<input type="text" name="Descuento" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$descuento.'">';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              ESTADO
              </label>
              <select name="Estado">
                <?php
                     $estado=$cam["Estado"];
                  if($estado=='Activo'){
                    echo '<option selected="selected" >Activo</option>';
                    echo '<option >Inactivo</option>';
                  }else {
                    echo '<option >Activo</option>';
                    echo '<option selected="selected">Inactivo</option>';
                  }
                ?>
              </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="buttons-set" align=center>
            <button type="submit" name="Editar">EDITAR</button>
          </div>
        </td>
      </tr>
    </table>
</form>


<form class="" action="../Php/AgregarProductoXCombo.php" method="post" autocomplete="off">
<table align=center>
  <tr>
    <td >
      <div class="std">
        <h2 align=center>AGREGAR PRODUCTO <br> A COMBO</h2>
        <?php
          $id=$cam["idCombo"];
          echo '<input type="hidden" name="Combo" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$id.'" readonly>';
        ?>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div id="field_32" class="">
        <label for="field_32" class="required">
          PRODUCTO
        </label>
        <select name="Producto">
          <option>SELECCIONE</option>
          <?php
            $consulta="SELECT * FROM `producto` ";
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
      <div class=" buttons-set" align=center>
        <br>
        <button type="submit" name="Registrar">AGREGAR</button>
      </div>
    </td>
  </tr>
</table>
</form>


<form class="" action="../Php/EliminarProductoXCombo.php" method="post" autocomplete="off">
<table align=center>
  <tr>
    <td align=center>
      <div class="std">
        <h2 align=center>ELIMINAR PRODUCTO <br> DE COMBO</h2>
        <?php
          $id=$cam["idCombo"];
          echo '<input type="hidden" name="Combo" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$id.'" readonly>';
        ?>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div id="field_32" class="">
        <label for="field_32" class="required">
          PRODUCTO
        </label>
        <select name="Producto">
          <option>SELECCIONE</option>
          <?php
          $id=$cam["idCombo"];
            $consulta="SELECT * FROM `producto` WHERE idProducto=(
              SELECT `Producto` FROM `productoxcombo` WHERE Combo='$id') ";
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
      <div class=" buttons-set" align=center>
        <br>
        <button type="submit" name="Registrar">ELIMINAR</button>
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
