<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManterProdutos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata("privilegio") == 0) {
            exit('Acesso restrito!');
        }
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->database();
        $this->load->model("Produto");
        $this->load->library('cart');
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => $this->cart->total_items(),
            "scripts" => "<script src='" . base_url() . "assets/js/manterProdutos.js'></script>"
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        $dadosLinha["produtos"] = $this->Produto->get();
        $dados["produtos"] = $this->parser->parse("ManterProdutosLinha", $dadosLinha, true);
        $this->parser->parse('headerLogado', $dados);
        $this->parser->parse('ManterProdutos', $dados);
        $this->parser->parse('footer', $dados);
    }
    
    public function inativarProduto() {
        $id = $this->input->post();
        $dados["disponivel"] = 0;
        if($this->Produto->alterar($dados, $id["id"])) {
            $retorno["erro"] = false;
            $retorno["descricao"] = "inativado com sucesso!";
        }
        else {
           $retorno["erro"] = true;
            $retorno["descricao"] = "Erro ao tentar inativar!"; 
        }
        return json_encode($retorno);
    }
}

