<?php 

class Aluno { 
    private $id;
    private $nome;
    private $curso;

    public function __construct($id, $nome, $curso) {
        $this->id = $id;
        $this->nome = $nome;
        $this->curso = $curso;
    }

    public function setId($id): void{
        $this->id = $id;
    }

    public function setNome($nome): void{
        $this->nome = $nome;
    }

    public function setCurso($curso): void{
        $this->curso = $curso;
    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCurso(){
        return $this->curso;
    }
}
?>
