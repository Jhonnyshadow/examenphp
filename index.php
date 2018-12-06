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
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Identificación producto:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="idproducto" id="idproducto" maxlength="13"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Tipo Identificación</br></td>
</tr>   
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Nombres:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input title="Se necesita un nombre" placeholder="Ej: Luis Lomas" pattern="^[a-zA-Z]+[ ][a-zA-Z]+"  type="text" name="nombreproducto" maxlength="100" >  </br></td>                      
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Fecha Nacimiento:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="date" name="fecnacproducto" required="true" autocomplete="off"  max="today" min="01-01-1800"  value="<?php echo date('d-m-Y'); ?>"></br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Ciudad Nacimiento:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: Quito" pattern="^[A-Za-z]+" type="text" name="ciudnacproducto" maxlength="50">                    </br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Tipo producto:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <table>
                                                                            <tr>
                                                                                <td><input type="radio" name="tipoproducto" value='true' required="true">Credito</td>
                                                                                <td width="20"></td>
                                                                                <td><input type="radio" name="tipoproducto" value='false' required="true">Efectivo</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Dirección:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: Quito y Via. Amazonas" pattern="^[0-9A-Za-z- ]+" type="text" name="direccionproducto" maxlength="100" ></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Teléfono:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: 0909785967" pattern="^[0-9]+" type="tel" name="telefonoproducto" maxlength="10" ></br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Email:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="emailproducto" maxlength="50" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  ></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Estado:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <table>
                                                                            <tr>
                                                                                <td style="text-align: left;padding: 8px;color: black;"><input type="radio" name="estadoproducto" value='true' >Activo</td>
                                                                                <td width="20"></td>
                                                                                <td style="text-align: left;padding: 8px;color: black;"><input type="radio" name="estadoproducto" value='false' >Inactivo</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <td>
                                                                <td style="padding: 8px;color: black;" colspan="4"><center><input type="submit" value="Crear" class="btn btn-sm" ></center></td>
                                                                </td>
                                                            </table></center>
                                                        
                                                    </form>
                                                </div>
                                                 <form action="./controller/controller.php" style=" width: 100%;">
                                                     <input type="hidden" name="opcion" value="listar_productos">
                                                 <input type="submit" value="listar_productoes"  class="btn btn-sm" >
                                                    </form>
                                                
                                                <table  border="1" >   
                                                <tr class="titulo">
                                                    <th>CODIGO</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PRECIO</th>                        
                                                    <th>ELIMINAR</th>
                                                    <th>EDITAR</th>
                                                </tr>
                                                <tbody >                    
                                                    <?php
                                                    //verificamos si existe en sesion el listado de productoes:
                                                    if (isset($_SESSION['listaProductos'])) {
                                                        $listado = unserialize($_SESSION['listaProductos']);
                                                        foreach ($listado as $producto) {
                                                            echo "<tr>";
                                                            echo "<td>" . $producto->getCodigo() . "</td>";
                                                          
                                                            echo "<td>" . $producto->getDescipcion() . "</td>";
                                                            echo "<td>" . $producto->getCantidad() . "</td>";
                                                            echo "<td>" . $producto->getPrecio() . "</td>";
                                                            
                                                            echo "<td><center><a title='Eliminar dato' href='./controller/controller.php?opcion=eliminar_producto&idproducto=" . $producto->getIdproducto() . "'>Eliminar</a></center></td>";
                                                            echo "<td><center><a title='Actualizar dato' href='./controller/controller.php?opcion=editar_producto&idproducto=" . $producto->getIdproducto() . "'>Editar</a></center></td>";
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
