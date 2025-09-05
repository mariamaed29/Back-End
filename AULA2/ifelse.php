<?php

$nota1 = 8.5;
$nota2 = 6.0;
$media = ($nota1 + $nota2) / 2;

if ($media >= 7) {
    echo "Aprovado com média: $media";
} else {
    echo "Reprovado com média: $media";
}
?>

<?php
// implemente tambem uma condição que verifique a presença do aluno.
// O aluno só será aprovado se tiver média maior ou igual a 7 e presença maior ou igual a 75%.

$nota1 = 8.5;
$nota2 = 8.0;
$media = ($nota1 + $nota2) / 2;


$presenca = $media * 10;

if ($media >= 7 && $presenca >= 75) {
    echo "Aprovado com média: $media e presença: $presenca%";
} else {
    echo "Reprovado com média: $media e presença: $presenca%";
}
?>

<?php
// caso o aluno tenha o nome "Ramon", ele será aprovado independente da média e presença. Crie uma variavel $nome.
$nota1 = 8.5;
$nota2 = 8.0;
$media = ($nota1 + $nota2) / 2;
$presenca = $media * 10;

$nome = "Ramon";

if ($nome === "Ramon") {
    echo "Aprovado (caso especial) - Nome: $nome";
} else {
    echo "Reprovado - Nome: $nome";
}
?>

<?php

/*  Exercicio 4: Crie um algoritmo que calcule a média entre 2 notas e fale se o aluno foi aprovado ou reprovado. Considere a média 7 como nota de corte. */

$nome = "Ramon";

echo "Boa tarde";

$nota1 = readline(prompt:"Digite a 1°nota do aluno: ");
$nota2 = readline(prompt:"Digite a 2°nota do aluno: ");

$presenca = readline(prompt:"Digite a porcentagem de presença do aluno: ");
$media = ($nota1 + $nota2) / 2;

if (($media >= 7 && $presenca >= 75) || $nome == "Ramon") {
    echo "Aluno aprovado com média: $media e presença: $presenca%";
} else {
    echo "Aluno reprovado com média: $media";
}

// Caso o aluno tenha o nome "Ramon", ele será aprovado independente da média e presença. Crie uma variavel $nome.

?>



