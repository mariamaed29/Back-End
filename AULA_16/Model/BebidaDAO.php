<?php
namespace Aula_16;

require_once __DIR__ . '/Bebida.php';
<?php
namespace Aula_16;

require_once __DIR__ . '/Bebida.php';
require_once __DIR__ . '/Connection.php';

use PDO;

class BebidaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec(
            "CREATE TABLE IF NOT EXISTS bebidas (\n" .
            "id INT AUTO_INCREMENT PRIMARY KEY,\n" .
            "nome VARCHAR(100) NOT NULL UNIQUE,\n" .
            "categoria VARCHAR(50) NOT NULL,\n" .
            "volume VARCHAR(20) NOT NULL,\n" .
            "valor DECIMAL(10,2) NOT NULL,\n" .
            "qtde INT NOT NULL\n)"
        );
    }

    // CREATE
    public function criarBebida(Bebida $bebida) {
        $stmt = $this->conn->prepare(
            "INSERT INTO bebidas (nome, categoria, volume, valor, qtde) VALUES (:nome, :categoria, :volume, :valor, :qtde)"
        );
        $stmt->execute([
            ':nome' => $bebida->getNome(),
            ':categoria' => $bebida->getCategoria(),
            ':volume' => $bebida->getVolume(),
            ':valor' => $bebida->getValor(),
            ':qtde' => $bebida->getQtde()
        ]);
    }

    // Compatibilidade com controller (plural)
    public function criarBebidas(Bebida $bebida) {
        $this->criarBebida($bebida);
    }

    // READ
    public function lerBebidas() {
        $stmt = $this->conn->query("SELECT * FROM bebidas ORDER BY nome");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Bebida(
                $row['nome'],
                $row['categoria'],
                $row['volume'],
                $row['valor'],
                $row['qtde']
            );
        }
        return $result;
    }

    // UPDATE (rename/full update)
    public function atualizarBebida($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde) {
        $stmt = $this->conn->prepare(
            "UPDATE bebidas SET nome = :novoNome, categoria = :categoria, volume = :volume, valor = :valor, qtde = :qtde WHERE nome = :nomeOriginal"
        );
        $stmt->execute([
            ':novoNome' => $novoNome,
            ':categoria' => $categoria,
            ':volume' => $volume,
            ':valor' => $valor,
            ':qtde' => $qtde,
            ':nomeOriginal' => $nomeOriginal
        ]);
    }

    // Atualização mínima usada pelo controller: atualiza valor e quantidade por nome
    public function atualizarBebidas($nome, $valor, $qtde) {
        $stmt = $this->conn->prepare("UPDATE bebidas SET valor = :valor, qtde = :qtde WHERE nome = :nome");
        $stmt->execute([
            ':valor' => $valor,
            ':qtde' => $qtde,
            ':nome' => $nome
        ]);
    }

    // DELETE
    public function excluirBebida($nome) {
        $stmt = $this->conn->prepare("DELETE FROM bebidas WHERE nome = :nome");
        $stmt->execute([':nome' => $nome]);
    }

    // BUSCAR POR NOME (internal)
    public function buscarPorNome($nome) {
        $stmt = $this->conn->prepare("SELECT * FROM bebidas WHERE nome = :nome LIMIT 1");
        $stmt->execute([':nome' => $nome]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Bebida(
                $row['nome'],
                $row['categoria'],
                $row['volume'],
                $row['valor'],
                $row['qtde']
            );
        }
        return null;
    }

    // Compatibilidade com controller
    public function buscarBebidaPorNome($nome) {
        return $this->buscarPorNome($nome);
    }

    // Editar — atualiza categoria, volume, valor e qtde para um nome existente
    public function editarBebida($nome, $categoria, $volume, $valor, $qtde) {
        $stmt = $this->conn->prepare(
            "UPDATE bebidas SET categoria = :categoria, volume = :volume, valor = :valor, qtde = :qtde WHERE nome = :nome"
        );
        $stmt->execute([
            ':categoria' => $categoria,
            ':volume' => $volume,
            ':valor' => $valor,
            ':qtde' => $qtde,
            ':nome' => $nome,
        ]);
    }
}
<?php
namespace Aula_16;

require_once __DIR__ . '/Bebida.php';
require_once __DIR__ . '/Connection.php';

use PDO;

class BebidaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        <?php
        namespace Aula_16;

        require_once __DIR__ . '/Bebida.php';
        require_once __DIR__ . '/Connection.php';

        use PDO;

        class BebidaDAO {
            private $conn;

            public function __construct() {
                $this->conn = Connection::getInstance();

                // Cria a tabela se não existir
                $this->conn->exec(
                    "CREATE TABLE IF NOT EXISTS bebidas (\n" .
                    "id INT AUTO_INCREMENT PRIMARY KEY,\n" .
                    "nome VARCHAR(100) NOT NULL UNIQUE,\n" .
                    "categoria VARCHAR(50) NOT NULL,\n" .
                    "volume VARCHAR(20) NOT NULL,\n" .
                    "valor DECIMAL(10,2) NOT NULL,\n" .
                    "qtde INT NOT NULL\n)"
                );
            }

            // CREATE
            public function criarBebida(Bebida $bebida) {
                $stmt = $this->conn->prepare(
                    "INSERT INTO bebidas (nome, categoria, volume, valor, qtde) VALUES (:nome, :categoria, :volume, :valor, :qtde)"
                );
                $stmt->execute([
                    ':nome' => $bebida->getNome(),
                    ':categoria' => $bebida->getCategoria(),
                    ':volume' => $bebida->getVolume(),
                    ':valor' => $bebida->getValor(),
                    ':qtde' => $bebida->getQtde()
                ]);
            }

            // Compatibilidade com controller (plural)
            public function criarBebidas(Bebida $bebida) {
                $this->criarBebida($bebida);
            }

            // READ
            public function lerBebidas() {
                $stmt = $this->conn->query("SELECT * FROM bebidas ORDER BY nome");
                $result = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = new Bebida(
                        $row['nome'],
                        $row['categoria'],
                        $row['volume'],
                        $row['valor'],
                        $row['qtde']
                    );
                }
                return $result;
            }

            // UPDATE (rename/full update)
            public function atualizarBebida($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde) {
                $stmt = $this->conn->prepare(
                    "UPDATE bebidas SET nome = :novoNome, categoria = :categoria, volume = :volume, valor = :valor, qtde = :qtde WHERE nome = :nomeOriginal"
                );
                $stmt->execute([
                    ':novoNome' => $novoNome,
                    ':categoria' => $categoria,
                    ':volume' => $volume,
                    ':valor' => $valor,
                    ':qtde' => $qtde,
                    ':nomeOriginal' => $nomeOriginal
                ]);
            }

            // Atualização mínima usada pelo controller: atualiza valor e quantidade por nome
            public function atualizarBebidas($nome, $valor, $qtde) {
                $stmt = $this->conn->prepare("UPDATE bebidas SET valor = :valor, qtde = :qtde WHERE nome = :nome");
                $stmt->execute([
                    ':valor' => $valor,
                    ':qtde' => $qtde,
                    ':nome' => $nome
                ]);
            }

            // DELETE
            public function excluirBebida($nome) {
                $stmt = $this->conn->prepare("DELETE FROM bebidas WHERE nome = :nome");
                $stmt->execute([':nome' => $nome]);
            }

            // BUSCAR POR NOME (internal)
            public function buscarPorNome($nome) {
                $stmt = $this->conn->prepare("SELECT * FROM bebidas WHERE nome = :nome LIMIT 1");
                $stmt->execute([':nome' => $nome]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    return new Bebida(
                        $row['nome'],
                        $row['categoria'],
                        $row['volume'],
                        $row['valor'],
                        $row['qtde']
                    );
                }
                return null;
            }

            // Compatibilidade com controller
            public function buscarBebidaPorNome($nome) {
                return $this->buscarPorNome($nome);
            }

            // Editar — atualiza categoria, volume, valor e qtde para um nome existente
            public function editarBebida($nome, $categoria, $volume, $valor, $qtde) {
                $stmt = $this->conn->prepare(
                    "UPDATE bebidas SET categoria = :categoria, volume = :volume, valor = :valor, qtde = :qtde WHERE nome = :nome"
                );
                $stmt->execute([
                    ':categoria' => $categoria,
                    ':volume' => $volume,
                    ':valor' => $valor,
                    ':qtde' => $qtde,
                    ':nome' => $nome,
                ]);
            }
        }