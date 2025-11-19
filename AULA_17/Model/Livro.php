<?php
namespace Aula_17;

class Livro {
    private $id;
    private $titulo;
    private $autor;
    private $ano;
    private $genero;
    private $qtde;

    public function __construct($id = '', $titulo = '', $autor = '', $ano = 0.0, $genero = '', $qtde = 0) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->qtde = $qtde;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->autor;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAno() {
        return $this->ano;
    }

      public function getGenero() {
        return $this->genero;
    }

    public function getQtde() {
        return $this->qtde;
    }

  

    // Setters
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
        return $this;
    }

    public function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }

     public function setGenero($genero) {
        $this->genero = $genero;
        return $this;
    }

    public function setQtde($qtde) {
        $this->qtde = $qtde;
        return $this;
    }

}