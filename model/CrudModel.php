<?php

include_once 'Database.php';
include_once 'Producto.php';

/**
 * Clase para el manejo CRUD de clientes,empleado,buses y pedidos
 *
 * @author T30
 */
class CrudModel {

    
    
    /**
     * Retorna la lista de clientes de la bdd.
     * @return array
     */
    //56456456465456465456456
    //////////////////////////
    // CRUD PROVEEDORES:      //
    //////////////////////////
    /**
     * Retorna la lista de proveedores de la bdd.
     * @return array
     */
    public function getProductos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from Productos";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
		$producto = new Producto($res['Codigo'], $res['descripcion'], $res['cantidad'], $res['precio']);
		echo $producto;
            array_push($listado, $producto);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un cliente especifico.
     * @param type $idproveedor El numero de $idproveedor del proveedor.
     * @return type
     */
    
    /**
     * Inserta un nuevo proveedor en la bdd.
     * 
     */
    public function insertarProducto($codigo, $descripcion, $cantidad,$precio) {
        $pdo = Database::connect();
        $sql = "insert into Productos(Codigo, descripcion, cantidad,precio) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($codigo, $descripcion, $cantidad,$precio));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Elimina un proveedor especifico de la bdd.
     * @param type $idproveedor
     */
    public function eliminarProducto($codigo) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from Productos where Codigo=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($codigo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un proveedor existente.

     */
    public function actualizarProducto($codigo, $descripcion, $cantidad,$precio) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update Productos set descripcion=?,cantidad=?,precio=? where Codigo=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array( $descripcion, $cantidad,$precio,$codigo));
        Database::disconnect();
    }
	 public function getProducto($codigo) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from Productos where Codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $proveedor = new Proveedor($res['Codigo'], $res['descripcion'], $res['cantidad'], $res['precio']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $proveedor;
    }


    //////////////////////////
    //CRUD: USUARIOS       //
    /////////////////////////

    /**
     * Retorna la lista de usuarios de la bdd.
     * @return array
     */
   
}
