<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
session_start();
require_once './model/Producto.php';

?>
    <body>
         <form action="./controller/controller.php" style=" width: 100%;">
                                                        <input type="hidden" name="opcion" value="crear_producto">
                                                        <center><table style=" width: 100%;   border-collapse: collapse;width: 100%;">                                                                                    
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Codigo</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="codigo" id="codigo" maxlength="13"></br></td>
                                                                    
                                                                </tr>   
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>descripción:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input title="Se necesita un nombre" placeholder="Ej: es un celular" type="text" name="descripcion" maxlength="100" >  </br></td>                      
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Cantidad:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: 20"type="text" name="cantidad" maxlength="50">                    </br></td>
                                                                    
                                                                      
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Precio:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: 50" type="text" name="precio" maxlength="100" ></br></td>
                                                                    
                                                                </tr>
                                                                
                                                                <td>
                                                                <td style="padding: 8px;color: black;" colspan="4"><center><input type="submit" value="Crear" class="btn btn-sm" ></center></td>
                                                                </td>
                                                            </table></center>
                                                        
                                                    </form>
                                                </div>
                                                 <form action="./controller/controller.php" style=" width: 100%;">
                                                     <input type="hidden" name="opcion" value="listar_productos">
                                                 <input type="submit" value="listar_productos"  class="btn btn-sm" >
                                                    </form>
                                                
                                                <table  border="1" >   
                                                <tr class="titulo">
                                                    <th>CODIGO</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PRECIO</th>                        
                                                    
                                                </tr>
                                                <tbody >                    
                                                    <?php
                                                    //verificamos si existe en sesion el listado de productos:
                                                    if (isset($_SESSION['listaProductos'])) {
                                                        $listado = unserialize($_SESSION['listaProductos']);
                                                        foreach ($listado as $producto) {
                                                            echo "<tr>";
                                                            echo "<td>" . $producto->getCodigo() . "</td>";
                                                            echo "<td>" . $producto->getDescipcion() . "</td>";
                                                            echo "<td>" . $producto->getCantidad() . "</td>";
                                                            echo "<td>" . $producto->getPrecio() . "</td>";
                                                            
                                                            echo "<td><center><a title='Eliminar dato' href='./controller/controller.php?opcion=eliminar_producto=".$producto->getCodigo() . "'>Eliminar</a></center></td>";
                                                            echo "<td><center><a title='Actualizar dato' href='./controller/controller.php?opcion=editar_producto=".$producto->getCodigo() . "'>Editar</a></center></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "No se han cargado datos.";
                                                    }
                                                    ?>
                                                </tbody >                    

                                            </table >
                                
    </body>
    
     
</html>
