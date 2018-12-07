<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <?php
    session_start();
    require_once './model/Producto.php';
    ?>

    <body style="background-color: #666666 ">

        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">
                <img src="img/logo_tiendanube.png" width="200" height="60" class="d-inline-block align-top" alt="">

            </a>
        </nav>
        <br/>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Examen de Cloud!</h4>
            <p>Proyecto basado en php, con base de datos posgrest, esta alojado en la nube en los servidoresde heroku.</p>
            <hr>
            <p class="mb-0">Autores: Jhonny Teran y Wilson Yepez.</p>
        </div>

        <div style="width: 100%; float: left; clear: both; display: block;background-image: linear-gradient(
             rgba(0, 0, 0, 0.5), 
             rgba(0, 0, 0, 0.5)
             ), url('img/banner.jpg'); background-attachment: fixed;background-position: center;background-repeat: no-repeat;">
            <br/>
            <br/>
            <div style="text-align:center;">
                <h3 style="color: #ffffff">Nuevo Producto<span class="badge badge-secondary">New</span></h3>
            </div>

               
            <div style="position:relative ;right: 0; " class="container">
    <form action="./controller/controller.php"  >
                <input  class="form-control" type="hidden" name="opcion" value="crear_producto">
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="Codigo">Codigo</label>
                    <input type="text" name="codigo" id="codigo" maxlength="13" class="form-control" placeholder="Ingrese Codigo de Producto">
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;">Recuerde que el codigo es unico</small>
                </div>
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="descripcion">Descripción:</label>
                    <input placeholder="Ingrese la descripcion del Producto" type="text" name="descripcion" maxlength="100" class="form-control" >
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;">Describe cual es el producto</small>
                </div>
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" min="1" class="form-control" >
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;">Número que tendremos en existencia</small>
                </div>
                <div class="form-group" style="font-size: xx-large;color: #ffffff">
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" maxlength="100" class="form-control" >
                    <small id="codigo" class="form-text text-muted" style="font-size: x-large;">Valor unitario de producto</small>
                </div>
                            
                <button type="submit" value="Crear" class="btn btn-dark" style="font-size: xx-large" ><span  class="fas fa-share-square"></span> Enviar</button>
                <br/>
                <br/>
            </form>
                </div>
        </div>
    
        <div style="width: 100%; float: left; clear: both; display: block;background-image: linear-gradient(
             rgba(0, 0, 0, 0.5), 
             rgba(0, 0, 0, 0.5)
             ), url('img/banner.jpg'); background-attachment: fixed;background-position: center;background-repeat: no-repeat;">
            <br/>
            <br/>
            <div style="text-align:center;">
                <h3 style="color: #ffffff">Listado de Productos<span class="badge badge-secondary">New</span></h3>
            </div>

               
            <div style="position:relative ;right: 0; " class="container">
                <table class=" table table-borderless"  style="background-color: rgba(234,234,122,0.80) " border="2" >   
        <tr class="titulo">
            <th>CODIGO</th>
            <th>DESCRIPCION</th>
            <th>CANTIDAD</th>
            <th>PRECIO</th> 
            <th colspan="2" style="text-align: center">Operaciones</th> 
        

        </tr>
        <tbody >                    
            <?php
            //verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listaProductos'])) {
                $listado = unserialize($_SESSION['listaProductos']);
                foreach ($listado as $producto) {
                    echo "<tr>";
                    echo "<td>" . $producto->getCodigo() . "</td>";
                    echo "<td>" . $producto->getDescripcion() . "</td>";
                    echo "<td>" . $producto->getCantidad() . "</td>";
                    echo "<td>" . $producto->getPrecio() . "</td>";

                    echo "<td><center><a href='./controller/controller.php?opcion=eliminar_producto&codigo=" . $producto->getCodigo() . "'>".'<button  type="submit" value="Crear" class="btn btn-danger" style="font-size: x-large" ><span  class="fas fa-trash-alt"></span> Eliminar</button></a></center></td>';
                    echo "<td><center><a href='./controller/controller.php?opcion=editar_producto&codigo=" . $producto->getCodigo() . "'>".'<button type="submit" value="Crear" class="btn btn-primary" style="font-size: x-large" ><span  class="fas fa-edit"</span> Editar</button></a></center></td>';
                    echo "</tr>";
                }
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </tbody >                    

    </table >
    <i class="fas fa-download"></i>
    <a href='./controller/controller.php?opcion=listar_productos'><button type="submit" value="Crear" class="btn btn-dark" style="font-size: xx-large" ><span  class="fas fa-download"></span> Cargar Listados</button>
                </div>
        </div>
        
</body>


</html>
