<?php

$numero1 = 10;
$numero2 = 5;
$operacao = 'soma';

switch ($operacao) { 
    case "+":
        echo $numero1 + $numero2;
        break;
    case "-":
        echo $numero1 - $numero2;
        break;
    case "*":
        echo $numero1 * $numero2;   
        break;
    case "/":
        echo $numero1 / $numero2;
        break;
    default:
        echo "Operação inválida";
}

?>