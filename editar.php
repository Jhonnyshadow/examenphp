<?php
session_start();
require_once './model/Producto.php';
                                    $listaProveedores = unserialize($_SESSION['listaProductos']);
                                    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TIENDA PRODUCTOS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <body style="background-color: #666666 ">

        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">
                <img src="img/logo_tiendanube.png" width="200" height="60" class="d-inline-block align-top" alt="">

            </a>
        </nav>
        <br/>

        <div style="width: 100%; float: left; clear: both; display: block;background-image: linear-gradient(
             rgba(0, 0, 0, 0.5), 
             rgba(0, 0, 0, 0.5)
             ), url('img/banner.jpg'); background-attachment: fixed;background-position: center;background-repeat: no-repeat;">
            <br/>
            <br/>
            <div style="text-align:center;">
                <h3 style="color: #ffffff">Actualizar Producto<span class="badge badge-secondary">New</span></h3>
            </div>

               
            <div style="position:relative ;right: 0; " class="container">
    <form action="./controller/controller.php"  >
                <input type="hidden" name="opcion" value="actualizar_producto">
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="Codigo">Codigo </label>
                    <input type="hidden" value='<?php echo $listaProveedores->getCodigo();?>' name="codigo" id="codigo" maxlength="13" class="form-control" placeholder="Ingrese Codigo de Producto">
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;">Recuerde que el codigo es unico: <?php echo $listaProveedores->getCodigo();?></small>
                </div>
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="descripcion">Descripción:</label>
                    <input placeholder="Ingrese la descripcion del Producto" type="text" name="descripcion" maxlength="100" class="form-control" >
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;"><?php echo $listaProveedores->getDescripcion();?></small>
                </div>
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" min="1" class="form-control" >
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;"><?php echo $listaProveedores->getCantidad();?></small>
                </div>
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" maxlength="100" class="form-control" >
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;"><?php echo $listaProveedores->getPrecio();?></small>
                </div>
                            
                <button type="submit" value="Crear" class="btn btn-dark" style="font-size: xx-large" ><span  class="fas fa-share-square"></span> Enviar</button>
                <br/>
                <br/>
            </form>
                </div>
        </div>
    

        
</body>


</html>


 