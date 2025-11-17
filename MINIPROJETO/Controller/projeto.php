<?php

namespace mini_projeto;

require_once __DIR__ . '/../Model/oficinaDAO.php';
require_once __DIR__ . '/../Model/oficina.php';

class ProjetoController {
    private $dao;

    public function __construct() {
        $this->dao = new OrdemServicoDAO();
    }

    // Lista todas as ordens de serviço
    public function ler() {
        return $this->dao->lerOrdensServico();
    }

    // Cadastra nova ordem de serviço
    public function criar($status, $observacao, $dataAbertura, $dataFechamento) {
        // Data de abertura padrão (se não for fornecida)
        $dataAbertura = $dataAbertura ?: date('Y-m-d');
        
        // Data de fechamento pode ser vazia na criação
        $dataFechamento = $dataFechamento ?: '';

        $os = new OrdemServico($status, $observacao, $dataAbertura, $dataFechamento);
        return $this->dao->criarOrdemServico($os);
    }

    public function buscar($codOS) {
        return $this->dao->buscarOrdemServico($codOS);
    }

    // Atualiza ordem de serviço existente
    public function editar($codOS, $status, $observacao, $dataAbertura, $dataFechamento) {
        return $this->dao->editarOrdemServico($codOS, $status, $observacao, $dataAbertura, $dataFechamento);
    }

    // Deleta uma ordem de serviço
    public function deletar($codOS) {
        return $this->dao->excluirOrdemServico($codOS);
    }
}
?>