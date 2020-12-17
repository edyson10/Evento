<?php
include ("Datos.php");
//metodo que conecta con la base de datos
$enlace=@ new mysqli($host,$usuario,$clave,$base);
if ($enlace){
@mysqli_query("set names'utf8'");
 ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
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

      <br> <br> <br> <br> <br><br><br>

  <!--Registro-->
<form class="" action="http://localhost/Pagina/Php/RegistrarProducto.php" method="post" autocomplete="off">
<table align=center >
  <tr>
    <td colspan="2">
      <h2 align=center>REGISTRAR PRODUCTO</h2>
    </td>
  </tr>
  <tr>
    <td>
      <div id="field_1" class="">
        <label for="field_1" class="required">
          NOMBRE
        </label>
        <input type="text" name="Nombre" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
    <td>
      <div id="field_32" class="">
        <label for="field_32" class="required">
          PRECIO
        </label>
        <input type="text" name="Precio" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div id="field_32" class="">
        <label for="field_32" class="required">
          CANTIDAD
        </label>
        <input type="text" name="Cantidad" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
    <td>
      <div id="field_32" class="">
        <label for="field_32" class="required">
          COLOR
        </label>
        <input type="text" name="Color" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
  </tr>
<tr>
  <td >
    <div id="field_3" class="" >
            <label for="field_3" class="required">
            ESTADO
            </label>
            <select name="Estado" >
            <option>SELECCIONE</option>
            <option >Activo</option>
            <option >Inactivo</option>
            </select>
    </div>
  </td>
  <td>
    <div id="field_32" class="" >
      <label for="field_32" class="required">
        SERVICIO
        </label>
        <select name="Servicio">
        <option>SELECCIONE</option>
        <option >Venta</option>
        <option >Alquiler</option>
        </select>
    </div>
  </td>
</tr>
<tr>
  <td>
    <div id="field_32" class="" >
      <label for="field_32" class="required">
        TIPO
      </label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <select name="Tipo">
        <option >SELECCIONE</option>
        <?php
        $consulta="SELECT * FROM `tipo` ";
        $q=mysqli_query($enlace,$consulta);

        while ($cam =mysqli_fetch_array($q)) {
           echo '<option >'.$cam[Nombre].'</option>';

        }
        ?>
      </select>
    </div>
  </td>
  <td>
    <div id="field_32" class="" >
      <label for="field_32" class="required">
        TALLA
      </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <select name="Talla">
        <option >SELECCIONE</option>
        <?php
        $consulta="SELECT * FROM `talla` ";
        $q=mysqli_query($enlace,$consulta);

        while ($cam =mysqli_fetch_array($q)) {
           echo '<option >'.$cam[Nombre].'</option>';

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
      <textarea name="Descripcion" rows="2" cols="68" maxlength=200 ></textarea>
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
        <input type="file" name="Imagen" />
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div class=" buttons-set" align=center>
        <br>
        <button type="submit" name="Login">REGISTRAR</button>
      </div>
    </td>
  </tr>
</table>
</form>

<br><br>

  <form class="" action="http://localhost/Pagina/Php/FormEditProducto.php" method="post" autocomplete="off">
<table align=center>
  <tr>
    <td>
      <div class="" align=center>
        <h2>EDITAR PRODUCTO</h2>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div id="field_1" class="" align=center>
        <label for="field_1" class="required">
          PRODUCTO
        </label>
        <select name="Producto">
          <?php
            echo "<option>SELECCIONE</option>";
            $consulta="SELECT * FROM `producto` ";
            $q=mysqli_query($enlace,$consulta);
            while ($cam =mysqli_fetch_array($q)) {
               echo '<option>'.$cam[Nombre].'</option>';
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

<br><br>


<form class="" action="http://localhost/Pagina/Php/ListarProductos.php" method="post" autocomplete="off">
<table  align=center class="">
  <tr>
    <td colspan="2">
      <h2 align=center>BUSCAR PRODUCTOS</h2>
      <h3>Filtrar por:</h3>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div id="field_1" class="">
        <label for="field_1" class="required">
          NOMBRE
        </label>
        <input type="text" name="Nombre" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div id="field_32" class="">
        <label for="field_32" class="required">
          PRECIO
        </label>
        <input type="text" name="Precio" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div id="field_32" class="">
        <label for="field_32" class="required">
          COLOR
        </label>
        <input type="text" name="Color" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div id="field_32" class="">
        <label for="field_32" class="required">
          CANTIDAD
        </label>
        <input type="text" name="Cantidad" id="field32" class="form-control input-text required-entry standard-matt-field  apellidos" style=" " value="">
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <label for="field_3" class="required">
        ESTADO
      </label>
      <select name="Estado">
      <option>SELECCIONE</option>
      <option >Activo</option>
      <option >Inactivo</option>
    </select>
    </td>
    <td>
      <label for="field_32" class="required">
        SERVICIO
        </label>
        <select name="Servicio">
        <option>SELECCIONE</option>
        <option >Venta</option>
        <option >Alquiler</option>
        </select>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div class="" align="center">
          <button type="submit" name="listarProductos" >BUSCAR</button>
      </div>
    </td>
  </tr>
</table>
</form>


  </section>

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
}else{
echo '<script>
    alert("Servicio Interumpido")
    document.location="../html/index.html"
   </script>';
  }
 ?>
