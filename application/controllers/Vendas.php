<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata("privilegio") == 0) {
            exit('Acesso restrito!');
        }
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->database();
        $this->load->model("Usuario");
        $this->load->model("Produto");
        $this->load->model("Compra");
        $this->load->model("ProdutoCompra");
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => 0, //por enqanto
            "scripts" => "<script src='" . base_url() . "assets/js/tabelaVendas.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/admVendas.js'></script>"
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        $dados["pedido"] = $this->_montarVendas();
        if($dados["pedido"] == null){
            $dados["vazio"] = "true";
        }
        $this->parser->parse('headerLogado', $dados);
        $this->parser->parse('vendas', $dados);
        $this->parser->parse('footer', $dados);
    }
    
    public function alterarPedido() {
        $status = array(
            1 => "Pedido",
            2 => "Produção",
            3 => "Enviado",
            4 => "Entregue"
        );
        $resultado = $this->input->post();
        $id = $resultado["id"];
        $dados["status"] = $status[$resultado["status"]];
        if($this->Compra->alter($id, $dados)){
            $retorno["erro"] = false;
            $retorno["msg"] = "Alterado com sucesso!";
            $retorno["status"] = $status[$resultado["status"]];
        }else{
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao alterar!";
        }
        echo json_encode($retorno);
    }
    
    public function cancelarPedido() {
        $resultado = $this->input->post();
        $id = $resultado["id"];
        if($this->Compra->delete($id)){
            $retorno["erro"] = false;
            $retorno["msg"] = "Deletado com sucesso!";
        }else{
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao deletar essse pedido!";
        }
        echo json_encode($retorno);
    }

    private function _montarVendas() {
        $retorno = null;
        $todasCompras = $this->Compra->get();
        foreach ($todasCompras as $compra) {
            $consulta = null;
            $consulta["id"] = $compra["idCliente"];
            $cliente = $this->Usuario->get($consulta);
            unset($cliente["privilegio"]);
            unset($cliente["id"]);
            $consulta = null;
            $consulta["idCompra"] = $compra["id"];
            $itensCompra = $this->ProdutoCompra->get($consulta);
            $produto = null;
            foreach ($itensCompra as $item) {
                $produtoNome = $this->Produto->getNome($item["idProduto"]);
                $b["idProduto"] = $item["idProduto"];
                $b["nomeProduto"] = $produtoNome[0]["nome"];
                $b["quantidade"] = $item["quantidade"];
                $produto[] = $b;
            }
            $aux["idPedido"] = $compra["id"];
            $aux["nomeCliente"] = $cliente[0]["nome"];
            $aux["data"] = $compra["data"];
            $aux["status"] = $compra["status"];
            $retorno[] = $cliente[0] + $aux;
            $retorno[count($retorno) - 1]["detalheProduto"] = $produto;
        }
        return $retorno;
    }
}
