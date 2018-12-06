<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada          //
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas//
///////////////////////////////////////////////////////////////////////
require_once '../model/CrudModel.php';

session_start();
//instanciamos los objetos del pedido:
$crudModel = new CrudModel();
//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];

switch ($opcion) {

   
    // obtiene los datos de los usuarios de la base de datos
    
    

    //    -------------------LISTAR---------------------
    // obtiene los datos de los productoes de la base de datos
    case "listar_productos":
        //obtenemos la lista de empleados:
        $listaProductos = $crudModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
       // header('Location: ../index.php');
        break;
    
    case "crear_producto":
        //obtenemos los parametros del formulario producto:
        $codigo = $_REQUEST['codigo'];
        $descripcion = $_REQUEST['descripcion'];
        $precio = $_REQUEST['precio'];
        $cantidad = $_REQUEST['cantidad'];
        
        //creamos el nuevo registro:
        $crudModel->insertarProducto($codigo, $descripcion, $cantidad,$precio);
        //actualizamos el listado:
        $listaProductos = $crudModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../index.php');
        break;

   
    case "actualizar_producto":
        //obtenemos los parametros del formulario producto:
        $codigo = $_REQUEST['codigo'];
        $descripcion = $_REQUEST['descripcion'];
        $precio = $_REQUEST['precio'];
        $cantidad = $_REQUEST['cantidad'];
        //creamos el nuevo registro:
        $crudModel->actualizarProducto($codigo, $descripcion, $cantidad,$precio);
        //actualizamos el listado:
        $listaProductos = $crudModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../index.php');
        break;
   
    //elimina un empleado especifico
    case "eliminar_producto":
        //obtenemos el codigo del empleado a eliminar:
        $codigo = $_REQUEST['codigo'];
        //eliminamos del formulario:
        try {
            $crudModel->eliminarProducto($codigo);
        } catch (Exception $e) {
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje1'] = $e->getMessage();
        }
        //actualizamos la lista de empleados para grabar en sesion:
        $listaProductos = $crudModel->getProductos();
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../index.php');
        break;

    //edita los datos de un empleado especifico
    case "editar_producto":
        //obtenemos los parametros del formulario:
        $codigo = $_REQUEST['codigo'];
        //Buscamos los datos
        $listaProductos = $crudModel->getProducto($codigo);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redirigimos la navegación al formulario de edicion profeedor:
        header('Location: ../editar.php');
        break;
    
   

    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../index.php');
        break;
}
