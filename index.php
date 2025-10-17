<?php 

require_once "CRUD.php";
require_once "AlunoDAO.php";

// Objeto da classe AlunoDAO para gerenciar os métodos do CRUD 

$dao = new AlunoDAO();

// CREATE 
$dao-> criarAluno(new Aluno (1, "Maria", "Design"));
$dao-> criarAluno(new Aluno (2, "Gabriel", "Moda"));
$dao-> criarAluno(new Aluno (3, "Eduardo", "Manicure"));
$dao-> criarAluno(new Aluno (4, "Aurora", "Arquitetura"));
$dao -> criarAluno(new Aluno (5, "Oliver", "Director"));
$dao -> criarAluno(new Aluno (6, "Amanda", "Lutadora"));
$dao -> criarAluno(new Aluno (7, "Geysa", "Engenhaira"));
$dao -> criarAluno(new Aluno (8, "Joab", "Professor"));
$dao -> criarAluno(new Aluno (9, "Bernardo", "Streamer"));

//Crie mais 6 objetos obedecendo a seguinte lista:
// Id - Nome - Curso
// 4 - Aurora - Arquitetura
// 5 - Oliver - Director
// 6 - Amanda - Lutadora 
// 7 - Geysa - Engenheira 
// 8 - Joab - Professor 
// 9 - Bernardo - Streamer 

// READ 

echo "Listagem Inicial:";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} -  {$aluno->getNome()} -  {$aluno->getCurso()} \n";
}

// UPDATE
$dao->atualizarAluno(3, "Viviane", "Eletricista");
$dao->atualizarAluno(7, "Clotilde", "Engenharia");
$dao->atualizarAluno(8, "Joana", "Professor");
$dao->atualizarAluno(9, "Bernardo", "Dev");
$dao->atualizarAluno(6, "Amanda", "Logistica");
$dao->atualizarAluno(5, "Oliver", "Eletrica");

// Faça as seguintes atualizações:
// - Alterar nome da Geysa para Clotilde 
// - Alterar nome do Joab para Joana 
// - Alterar curso do Bernardo para Dev
// - Alterar curso da Amanda para Logistica 
// - Alterar curso do Oliver para Eletrica

echo "Após atualização:";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} -  {$aluno->getNome()} -  {$aluno->getCurso()} \n";
}

// DELETE
$dao->excluirAluno(2);

echo "\nApós exclusão:\n";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} -  {$aluno->getNome()} -  {$aluno->getCurso()} \n";
}
?>