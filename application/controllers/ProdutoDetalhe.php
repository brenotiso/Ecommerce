<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProdutoDetalhe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->database();
        $this->load->model("Produto");
        $this->load->library('cart');
    }

    public function index($id) {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => $dados["qtdCarrinho"] = $this->cart->total_items(),
            "scripts" => "<script src='" . base_url() . "assets/js/produto.js'></script>"
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        if ($this->session->userdata("id")) {
            $dados["logado"] = "logado";
            $this->parser->parse('headerLogado', $dados);
        } else {
            $dados["logado"] = "naoLogado";
            $this->parser->parse('headerNaoLogado', $dados);
        }
        $a["id"] = $id;
        $produto = $this->Produto->get($a);
        $imgs = explode(";", $produto[0]["img"]);
        unset($imgs[count($imgs) -1]);
        foreach($imgs as $img){
            $produto[0]["fotos"][]["imagem"] = $img;
            $produto[0]["fotos"][count($produto[0]["fotos"]) - 1]["url"] = base_url();
        }
        if ($produto[0]["disponivel"] == 0){
            $dados["botaoCompra"] = "<h5 class='pos-center indisponivel'><br>PRODUTO INDISPONÍVEL</h5>";
            $dados["qtdProduto"] = "hidden";
        }else{
            $dados["botaoCompra"] = "<button class='addCarinho-".$dados["logado"]." flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4'>Adicionar ao carrinho</button>";
        }
        $this->parser->parse('produto', array_merge($dados, $produto[0]));
        $this->parser->parse('footer', $dados);
    }
    
}
