<?php
namespace Aula_16;

class Connection {
    private static $instance = null;

    public static function getInstance() {
        if (!self::$instance) {
            try {
                // Ajuste seu usuario e senha aqui
                $host = 'localhost';
                $dbname = 'projeto_bebidas';
                $user = 'root';
                $pass = '1234';

                // Conecta sem especificar o banco para permitir criação
                $pdo = new \PDO("mysql:host=$host;charset=utf8mb4", $user, $pass);
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                // Cria o banco se não existir e seleciona
                $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                $pdo->exec("USE `$dbname`");

                self::$instance = $pdo;
            } catch (\PDOException $e) {
                die("Erro ao conectar ao MySQL: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
              