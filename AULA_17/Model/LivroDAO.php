<?php

namespace Aula_17;

use PDO;

require_once 'Livro.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS bebidas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(200) NOT NULL,
                autor VARCHAR(150) NOT NULL,
                ano INT,
                genero VARCHAR(100) NOT NULL,
                qtde INT 
            )
        ");
    }
    

    // CREATE
    public function criarLivro(Livros $livro) {
        $stmt = $this->conn->prepare("
            INSERT INTO bebidas (id, titulo, autor, ano, genero, qtde)
            VALUES (:id, :titulo, :autor, :ano, :genero, :qtde)
        ");
        $stmt->execute([
            ':id' => $livros->getId(),
            ':titulo' => $livros->getTitulo(),
            ':autor' => $livros->getAutor(),
            ':ano' => $livros->getAno(),
            ':genero' => $livros->getGenero()
            ':qtde' => $livros->getQtde()
        ]);
    }

    // READ
    public function lerLivro() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY nome");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Livro(
                $row['nome'],
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['qtde']
            );
        }
        return $result;
    }

    // UPDATE
    public function atualizarLivro($id, $titulo, $autor, $ano, $genero, $qtde) {
        $stmt = $this->conn->prepare("
            UPDATE Livros
            SET nome = :id, titulo = :titulo, autor = :autor, ano = :ano, genero = :genero, qtde = :qtde
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano' => $ano,
            ':genero' => $genero,
            ':qtde' => $qtde,
           
        ]);
    }

    // DELETE
    public function excluirLivro($nome) {
        $stmt = $this->conn->prepare("DELETE FROM livro WHERE nome = :nome");
        $stmt->execute([':nome' => $nome]);
    }

    // BUSCAR POR NOME
    public function buscarPorNome($nome) {
        $stmt = $this->conn->prepare("SELECT * FROM livro WHERE nome = :nome LIMIT 1");
        $stmt->execute([':nome' => $nome]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Livro (
                $row['id'],
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['qtde']
            );
        }
        return null;
    }
}
?>