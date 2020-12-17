<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
@mysqli_query("set names'utf8'");

if($_POST["Producto"]=='SELECCIONE'){
  echo '<script>
    alert("Seleccione el producto a editar")
    document.location="../php/Productos.php"
   </script>';
 }else{
   $producto=$_POST["Producto"];
   $consulta="SELECT * FROM `producto` WHERE Nombre='$producto'  ";
   $q=mysqli_query($enlace,$consulta);
   $cam =mysqli_fetch_array($q);

 ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>
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

  <form class="" action="http://localhost/Pagina/Php/EditarProducto.php" method="post" autocomplete="off">
    <table align=center>
      <tr>
        <td colspan="2">
          <div class="" align=center>
            <h2>EDITAR PRODUCTO</h2>
            <a>Al finalizar presiona Editar</a>
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
              $id=$cam["idProducto"];
              echo '<input type="text" name="Id" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$id.'" readonly>';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_1" class="">
            <label for="field_1" class="required">
              NOMBRE
            </label>
            <?php
              $nombre=$cam["Nombre"];
              echo '<input type="text" name="Nombre" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$nombre.'">';
            ?>
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              PRECIO
            </label>
            <?php
              $precio=$cam["Precio"];
              echo '<input type="text" name="Precio" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$precio.'">';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              CANTIDAD
            </label>
            <?php
              $cantidad=$cam["Cantidad"];
              echo '<input type="text" name="Cantidad" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$cantidad.'">';
            ?>
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              COLOR
            </label>
            <?php
              $color=$cam["Color"];
              echo '<input type="text" name="Color" class="form-control input-text required-entry standard-matt-field  apellidos" value="'.$color.'">';
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
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              SERVICIO
              </label>
              <select name="Servicio">
                <?php
                     $servicio=$cam["Servicio"];
                  if($servicio=='Venta'){
                    echo '<option selected="selected" >Venta</option>';
                    echo '<option >Alquiler</option>';
                  }else {
                    echo '<option >Venta</option>';
                    echo '<option selected="selected">Alquiler</option>';
                  }
                ?>
              </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              TIPO
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="Tipo">
              <?php
              $tipo=$cam["Tipo"];
              $consulta="SELECT * FROM `tipo` ";
              $q=mysqli_query($enlace,$consulta);

              while ($cem =mysqli_fetch_array($q)) {
                if($cem[idTipo]==$tipo){
                  echo '<option selected="selected" >'.$cem[Nombre].'</option>';
                }else{
                  echo '<option >'.$cem[Nombre].'</option>';
                }
              }
              ?>
            </select>
          </div>
        </td>
        <td>
          <div id="field_32" class="">
            <label for="field_32" class="required">
              TALLA
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="Talla">
              <?php
              $talla=$cam["Talla"];
              $consulta="SELECT * FROM `talla` ";
              $q=mysqli_query($enlace,$consulta);

              while ($cem =mysqli_fetch_array($q)) {
                if($cem[Nombre]==$talla){
                  echo '<option selected="selected" >'.$cem[Nombre].'</option>';
                }else{
                  echo '<option >'.$cem[Nombre].'</option>';
                }
              }
              ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="field_3" class="">
            <label for="field_3" class="required">
              DESCRIPCION
            </label>
            <br>
            <?php
            $descripcion=$cam["Descripcion"];
              echo '<textarea name="Descripcion" rows="2" cols="78" maxlength=200 >'.$descripcion.'</textarea>';
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="field_3" class="">
            <label for="field_3" class="required">
              IMAGEN
              <em>(Opcional)</em>
            </label>
            <?php
                 $imagen=$cam["Imagen"];
              if($imagen==null){
                echo '<input type="file" name="Imagen" />';
                echo '<img src="dinosaur.jpg">';
              }else {
                echo '<input type="file" name="Imagen" value"'.$imagen.'"/>';
              }
            ?>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="buttons-set" align=center>
            <button type="submit" name="Editar">EDITAR</button>
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
