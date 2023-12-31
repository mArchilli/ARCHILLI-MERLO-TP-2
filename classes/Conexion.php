<?PHP

/**
 * Clase para proveer la conexión de PDO al proyecto.
 */
class Conexion
{
    #region ATRIBUTOS
    private const DB_HOST = 'localhost';
    //private const DB_HOST = '127.0.0.1';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'discosdb';

    private const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    private static ?PDO $db = null;
    #endregion

    #region METODOS

    public static function conectar()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die('Error al conectar con MySQL.');
        }
    }

    /**
     * Función que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {
        if (self::$db === null) {
            self::conectar();
        }
        return self::$db;
    }
    #endregion
}
