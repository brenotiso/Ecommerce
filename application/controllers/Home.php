<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->library('session');
        $this->load->library('cart');
        $this->load->database();
        $this->load->model("Produto");
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "scripts" => "<script src='" . base_url() . "assets/js/ultimosAdicionados.js'></script>"
        );
        $dados["produtoNovo"] = $this->_carregarUltimosProdutos();
        $dados["opcoesAdmin"] = "";
        if ($this->session->userdata("id")) {
            $dados["qtdCarrinho"] = $this->cart->total_items();
            if ($this->session->userdata("privilegio") == 1) {
                $dados["opcoesAdmin"] = $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
            }
            $this->parser->parse('headerLogado', $dados);
            $this->parser->parse('homeLogado', $dados);
        } else {
            $this->parser->parse('headerNaoLogado', $dados);
            $this->parser->parse('homeNaoLogado', $dados);
        }
        $this->parser->parse('footer', $dados);
    }

    private function _carregarUltimosProdutos() {
        $resultado = $this->Produto->getUltimosPorId(5);
        if (count($resultado) > 0) {
            foreach ($resultado as $produto) {
                $produtosNovos["produtos"][] = array(
                    "url" => base_url(),
                    "id" => $produto["id"],
                    "nome" => $produto["nome"],
                    "preco" => $produto["preco"]
                );
                $imagem = explode(";", $produto["img"]);
                if($imagem[0] != ""){
                    $produtosNovos["produtos"][count($produtosNovos["produtos"]) - 1]["img"] = "produtos/".$imagem[0];
                }else{
                    $produtosNovos["produtos"][count($produtosNovos["produtos"]) - 1]["img"] = "item-02.jpg";
                }
                if ($this->session->userdata("id")) {
                    $produtosNovos["produtos"][count($produtosNovos["produtos"]) - 1]["logado"] = "logado";
                } else {
                    $produtosNovos["produtos"][count($produtosNovos["produtos"]) - 1]["logado"] = "naoLogado";
                }
            }
            $dados = $this->parser->parse('ultimosAdicionados', $produtosNovos, TRUE);
        } else {
            $dados = "Nenhum produto foi adicionado ainda :(";
        }
        return $dados;
    }

}
