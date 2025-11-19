<?php

namespace Aula_17;

require_once __DIR__. '\\..\\Controller\\LivroController.php';

$controller = new LivroController();

$bebidaParaEditar = null;

// Quando o formulário de edição for submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (($_POST['acao'] ?? '') === 'atualizar')) {
    $id = $_POST['id'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? 0;
    $genero = $_POST['genero'] ?? '';
    $qtde = $_POST['qtde'] ?? 0;

    $controller->editar($id, $titulo, $autor, $ano, $genero,$qtde);

    header('Location: index.php');
    exit();
}

// Quando a página é acessada a partir do botão "Editar" na lista
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && (($_POST['acao'] ?? '') === 'editar')) {
    $id = $_POST['id'];
    $livroParaEditar = $controller->buscar($id);

    if (!$livroParaEditar) {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; 
            background-color: #ffd8faff; 
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Livro: <?php echo htmlspecialchars($livroParaEditar->getNome()); ?></h1>

    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <label for="nome_display">Nome (Chave, não editável):</label>
        <input type="text" id="nome_display" value="<?php echo htmlspecialchars($livroParaEditar->getNome()); ?>" disabled>

        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" required>
            <?php $currentCat = $livroParaEditar->getCategoria(); ?>
            <option value="Romance" <?php if ($currentCat === 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Fantasia" <?php if ($currentCat === 'Fantasia') echo 'selected'; ?>>Fantasia</option>
            <option value="Ficção Científica" <?php if ($currentCat === 'Ficção Científica') echo 'selected'; ?>>Ficção Científica</option>
            <option value="Terror" <?php if ($currentCat === 'Terror') echo 'selected'; ?>>Terror</option>
            <option value="Suspense" <?php if ($currentCat === 'Suspense') echo 'selected'; ?>>Suspense</option>
            <option value="Drama" <?php if ($currentCat === 'Drama') echo 'selected'; ?>>Drama</option>
            <option value="Comédia" <?php if ($currentCat === 'Comédia') echo 'selected'; ?>>Comédia</option>
        </select>

        <label for="volume">titulo:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" required>

        <label for="valor">Valor:</label>
        <input type="number" name="Valor" id="valor" step="0.01" value="<?php echo htmlspecialchars($livroParaEditar->getValor()); ?>" required>

        <label for="qtde">Quantidade:</label>
        <input type="number" name="qtde" id="qtde" value="<?php echo htmlspecialchars($livroParaEditar->getQtde()); ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>