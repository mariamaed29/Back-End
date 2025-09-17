<?php
namespace AULA10;
// Polimorfismo

// O termo Polimorfismo significa "várias formas". Associando isso a Programação Orientada a Objetos, o conceito se trata de várias classes e suas instâncias (objetos) respondendo a um mesmo método de formas diferentes.
// No exemplo do Interface da Aula 09, temos um método CalcularArea() que responde de forma diferente á classe Quadrado, á classe Pentágono e a classe Círculo.
// isso quer dizer que a função é a mesma - calcular a área da forma geométrica - mas a operação muda de acordo com a figura.

// Crie um método chamado "mover()", aonde ele responde de varias formas diferentes, para sub-classes: Carro, Avião, Barco e Elevador. Dica: utilize Interfaces.

interface Veiculo {
    public function mover(): void;
}
class Carro implements Veiculo {
    public $nome;
    public function mover(): void {
        echo "O carro está dirigindo na estrada.\n";
    }
}

class Aviao implements Veiculo {
    public $nome;
    public function mover(): void {
        echo "O avião está voando no céu.\n";
    }
}

class Barco implements Veiculo {
    public $nome;
    public function mover(): void {
        echo "O barco está navegando.\n";
    }
}
class Elevador implements Veiculo {
    public function mover(): void {
        echo "O elevador está subindo ou descendo no prédio.\n";
    }
}

$carro1 = new Carro();
$carro1->nome = "Fusca";
$carro1->mover();
$aviao1 = new Aviao();
$aviao1->nome = "Cessna";
$aviao1->mover();
$barco1 = new Barco();
$barco1->nome = "Titanic";
$barco1->mover();


    


    

    