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
        $this->load->library('cart');
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => $dados["qtdCarrinho"] = $this->cart->total_items(),
            "scripts" => "<script src='" . base_url() . "assets/js/tabelaVendas.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/admVendas.js'></script>"
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        $dados["todosPedidos"] = $this->_montarVendas();
        if ($dados["todosPedidos"] == null) {
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
        if ($this->Compra->alter($id, $dados)) {
            $retorno["erro"] = false;
            $retorno["msg"] = "Alterado com sucesso!";
            $retorno["status"] = $status[$resultado["status"]];
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao alterar!";
        }
        echo json_encode($retorno);
    }

    public function cancelarPedido() {
        $resultado = $this->input->post();
        $id = $resultado["id"];
        if ($this->Compra->delete($id)) {
            $retorno["erro"] = false;
            $retorno["msg"] = "Deletado com sucesso!";
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao deletar essse pedido!";
        }
        echo json_encode($retorno);
    }

    public function vendasPorCliente() {
        $resultado = $this->input->post();
        $retorno["tabelaNova"] = $this->_montarVendas($resultado["nomeCliente"]);
        if ($retorno["tabelaNova"] == null) {
            $retorno["vazio"] = true;
        } else {
            $retorno["vazio"] = false;
        }
        echo json_encode($retorno);
    }

    private function _montarVendas($nomeCliente = null) {
        $retorno = null;
        if($nomeCliente == null){
            $todasCompras = $this->Usuario->getUsuarioJoinCompra();
        }else{
            $todasCompras = $this->Usuario->getUsuarioJoinCompra($nomeCliente);
        }
        foreach ($todasCompras as $key => $compra) {
            $resultado = null;
            $resultado = $this->Compra->getProdutosPorCompra($compra["idPedido"]);
            $compra["dataCadastro"] = date_format(date_create($compra["dataCadastro"]), "d/m/Y - H:i:s");
            $compra["data"] = date_format(date_create($compra["data"]), "d/m/Y - H:i:s");
            $retorno["pedido"][] = $compra;
            $retorno["pedido"][$key]["detalheProduto"] = $resultado;
        }
        if ($retorno != null) {
            $a = $this->parser->parse('vendasDetalhe', $retorno, TRUE);
            $retorno = $a;
        }
        return $retorno;
    }
    
}
