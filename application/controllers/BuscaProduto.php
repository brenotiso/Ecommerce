<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuscaProduto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->database();
        $this->load->model("Produto");
        $this->load->library('cart');
    }

    public function buscarProduto() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => $dados["qtdCarrinho"] = $this->cart->total_items(),
            "scripts" => "<script src='" . base_url() . "assets/js/ultimosAdicionados.js'></script>"
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        if ($this->session->userdata("id")) {
            $dados["logado"] = "logado";
            $this->parser->parse('headerLogado', $dados);
        } else {
            $dados["logado"] = "naoLogado";
            $this->parser->parse('headerNaoLogado', $dados);
        }
        $form = $this->input->post();
        if(!isset($form["nome"])){
            $form["nome"] = "";
        }
        $produtos = $this->Produto->getByNome($form["nome"]);
        foreach($produtos as $key => $produto){
            $produtos[$key]["nDisponivel"] = "hidden";
            $imgs = explode(";", $produto["img"]);
            $produtos[$key]["img"] = $imgs[0];
            $produtos[$key]["logado"] = $dados["logado"];
            $produtos[$key]["url"] = $dados["url"];
            if($produto["quantidade"] == 0 or $produto["disponivel"] == 0){
                $produtos[$key]["nDisponivel"] = "";
                $produtos[$key]["disponivel"] = "hidden";
            }
        }
        $dados2["produtos"] = $produtos;
        $this->parser->parse('listaProdutos', $dados2);
        $this->parser->parse('footer', $dados);
    }
    
}
