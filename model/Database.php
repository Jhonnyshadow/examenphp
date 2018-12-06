<?php
/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
* @author Mateo Salcedo
 */
class Database {
    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'dceqhevks0lb3u';
    private static $port = '5432';
    private static $dbHost = 'ec2-50-19-249-121.compute-1.amazonaws.com';
    private static $dbUsername = 'xpikfedbmmbilw';
    private static $dbUserPassword = '1b056d95e1b3f0143da0717020a719c5f166e425733ed53db2cae3dacd724b2e';
    //Propiedad para control de la conexion:
    private static $conexion = null;
    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }
    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("pgsql:host=" . self::$dbHost . ";"."port=".self::$port .";". "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }
    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }
}
?>
