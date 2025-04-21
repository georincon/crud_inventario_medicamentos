<?php

class Conexion
{
    private const SERVIDOR = 'localhost';
    private const NOMBRE_BD = 'crud_2025';
    private const USUARIO = 'root';
    private const PASSWORD = '';

    public static function Conectar(): ?PDO
    {
        $dsn = "mysql:host=" . self::SERVIDOR . ";dbname=" . self::NOMBRE_BD . ";charset=utf8mb4";

        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,               // Lanza excepciones en errores
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // Devuelve resultados como arrays asociativos
            PDO::ATTR_EMULATE_PREPARES => false,                      // Desactiva emulación de prepare para más seguridad
        ];

        try {
            return new PDO($dsn, self::USUARIO, self::PASSWORD, $opciones);
        } catch (PDOException $e) {
            error_log("Error de conexión a la base de datos: " . $e->getMessage());
            return null;
        }
    }
}
?>
