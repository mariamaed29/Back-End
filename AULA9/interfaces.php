<?php 

// Modificadores de acesso:
//Existem 3 tipos: public, private e protected
// Public NomeDoAtributo: métodos e atributos públicos 

//Private NomeDoAtributo: métodos e atributos privados para acesso somente dentro da própria classe. Utilizamos os getters e setters para acessa-los.

//protected class NomeDaAtributo: métodos e atributos protegidos para acesso somente dentro da classe e suas subclasses

//pacotes: sintaxe logo no inicio do código, que atribui de onde os arquivos pertencem, ou seja, o caminho da pasta em que ele está contido. Exemplo:

 //namespace aula 09;

//Caso tenham mais arquivos que formam o backend de uma página Web e possuem a mesma raiz, o namespace será o mesmo.

namespace aula09;

Interface Pagamento {
    public function pagar($valor): void;

}

class CartaoDeCredito implements Pagamento {
    public function pagar($valor): void {
        echo "Pagamento realizado com cartão de crédito valor de R$ $valor\n";
    }
}

class PIX implements Pagamento {
    public function pagar ($valor): void {
        echo "Pagamento realizado com PIX valor de R$ $valor\n";
    }
}

// 1.Criando uma interface simples 

// Crie uma interface chamada Forma que obrigue qualquer classe a ter um método calcularArea(). 

//Depois, crie as classes Quadrado e Circulo que implemnetam a interface. 

// Quadrado deve receber o lado e calcular a área.

//Circulo deve receber o raio e calcular a área.

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

// Exemplo de uso:
$q = new Quadrado(4);
echo "Área do quadrado: " . $q->calcularArea() . "\n";

$c = new Circulo(3);
echo "Área do círculo: " . $c->calcularArea() . "\n"; 

