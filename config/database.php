<?php
class Database {
    private static $host = "localhost";
    private static $db_name = "ninjas";
    private static $username = "root";
    private static $password = "";
    public static $conn;

    public static function connect() {
        if (self::$conn == null) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                // Mostra o erro para debug
                echo "Erro de conexão: " . $exception->getMessage();
                exit(); // Encerra a execução se houver um erro de conexão
            }
        }
        return self::$conn;
    }
}
?>
