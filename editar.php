<?php
session_start();
require_once './model/Proveedor.php';
                                    $listaProveedores = unserialize($_SESSION['listaProveedores']);
                                    ?>

 <form action="./controller/controller.php">
                                        <input type="hidden" name="opcion" value="actualizar_proveedor">
                                        <div class="panel panel-info">

                                            <div class="panel-body">
       <table>
                                                    <tr>
                                                        <td>Identificador:</td>
                                                        <td>
                                                            <?php echo $listaProveedores->getIdproveedor();
                                                            ?>
                                                            <input maxlength="13" type="hidden" name="idproveedor" value="<?php echo $listaProveedores->getIdproveedor(); ?>" />
                                                        </td>
                                                        <td>Tipo de identificación:</td>
                                                        <td>
                                                            <select name="tipoidproveedor">
                                                                <?php
                                                                if ($listaProveedores->getTipoidproveedor() == 'Cedula' || $listaProveedores->getTipoidproveedor() == 'c' || $listaProveedores->getTipoidproveedor() == 'C' || $listaProveedores->getTipoidproveedor() == 'cedula' || $listaProveedores->getTipoidproveedor() == 'CEDULA') {
                                                                    echo"<option value=c select=true>CÉDULA</option>";
                                                                    echo"<option value=p>PASAPORTE</option>";
                                                                    echo"<option value=r>RUC</option>";
                                                                } else if ($listaProveedores->getTipoidproveedor() == 'ruc' || $listaProveedores->getTipoidproveedor() == 'r' || $listaProveedores->getTipoidproveedor() == 'R' || $listaProveedores->getTipoidproveedor() == 'Ruc' || $listaProveedores->getTipoidproveedor() == 'RUC') {
                                                                    echo"<option value=r select=true>RUC</option>";
                                                                    echo"<option value=c>CÉDULA</option>";
                                                                    echo"<option value=p>PASAPORTE</option>";
                                                                } else if ($listaProveedores->getTipoidproveedor() == 'pasaporte' || $listaProveedores->getTipoidproveedor() == 'p' || $listaProveedores->getTipoidproveedor() == 'P' || $listaProveedores->getTipoidproveedor() == 'Pasaporte' || $listaProveedores->getTipoidproveedor() == 'PASAPORTE') {
                                                                    echo"<option value=p select=true>PASAPORTE</option>";
                                                                    echo"<option value=c >CÉDULA</option>";
                                                                    echo"<option value=r>RUC</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombres:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getNombreproveedor(); ?>" type="text" name="nombreproveedor"  required="true" title="Se necesita un nombre" placeholder="Ej: Luis" pattern="^[a-zA-Z]+[ ][a-zA-Z]+" maxlength="100" >
                                                        </td>
                                                        <td>DOB:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getFecnacproveedor(); ?>" type="date" name="fecnacproveedor"  required="true" max="today" min="01-01-1800" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ciudad de nacimiento:</td>
                                                        <td>
                                                            <input  placeholder="Ej: Quito" pattern="^[A-Za-z]+" value="<?php echo $listaProveedores->getCiudnacproveedor(); ?>" type="text" name="ciudnacproveedor"  maxlength="50" required="true">
                                                        </td>
                                                        <td>Tipo de proveedor</td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <?php
                                                                    if ($listaProveedores->getTipoproveedor() == true) {
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'true' required = 'true' checked=true>Crédito</td>";
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'false' required = 'true' >Efectivo</td>";
                                                                    } else if ($listaProveedores->getTipoproveedor() == false) {
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'false' required = 'true' >Crédito</td>";
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'true' required = 'true' checked=true>Efectivo</td>";
                                                                    }
                                                                    //                                                            <td><input type = "radio" name = "tipoproveedor" value = 'true' required = "true">Credito</td>
                                                                    //                                                            <td width = "20"></td>
                                                                    //                                                            <td><input type = "radio" name = "tipoproveedor" value = 'false' required = "true">Efectivo</td>
                                                                    ?>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dirección:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getDireccionproveedor(); ?>" placeholder="Ej: Quito y Via. Amazonas" type="text" name="direccionproveedor" maxlength="100" required="true" pattern="^[0-9A-Za-z- ]+">
                                                        </td>
                                                        <td>Teléfono:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getTelefonoproveedor(); ?>" placeholder="Ej: 0909785967" pattern="^[0-9]+" type="tel" name="telefonoproveedor" maxlength="10" required="true">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td>
                                                            <input autocomplete="on" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="<?php echo $listaProveedores->getEmailproveedor(); ?>" type="email" name="emailproveedor" maxlength="50" required="true">
                                                        </td>
                                                        <td>Estado</td>
                                                        <td>
                                                            <table>
                                                                <?php
                                                                if ($listaProveedores->getEstadoproveedor() == true) {
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'true' required = 'true' checked=true>Activo</td>";
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'false' required = 'true' >Inactivo</td>";
                                                                } else if ($listaProveedores->getEstadoproveedor() == false) {
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'false' required = 'true' >Activo</td>";
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'true' required = 'true' checked=true>Inactivo</td>";
                                                                }

//                                                        <tr>
//                                                        <td><input type = "radio" name = "estadoproveedor" value = 'true' required = "true">Activo</td>
//                                                        <td width = "20"></td>
//                                                        <td><input type = "radio" name = "estadoproveedor" value = 'false' required = "true">Inactivo</td>
//                                                        </tr>
                                                                ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><center><input 
                                                            
                                                            type="submit" value="Actualizar Proveedor" class="btn btn-sm" ></center></td>
                                                    <td colspan="2"><center><input  
                                                            
                                                            type="submit" value="Cancelar" class="btn btn-sm" ><a href="./controller/controller.php?opcion=listar_proveedores"></a></center></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
 </form>