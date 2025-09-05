<?php 
 
for ($i = 0; $i < 5; $i++) {
    echo "1 - Olá\n";
    echo "2 - Data Atual\n";
    echo "3 - Sair\n";
    $opcao = readline("Escolha uma opção: ");

    switch ($opcao) {
        case 1:
        case "1":
            echo "Olá\n";
            break;
        case 2:
        case "2":
            echo "Data Atual: " . date("d/m/Y H:i:s") . "\n";
            break;
        case 3:
        case "3":
            echo "Saindo...\n";
            break 2; // Sai do for e do switch
        default:
            echo "Opção inválida!\n";
    
    }
    echo "\n";
}

echo "Fim do programa.\n";
?>






