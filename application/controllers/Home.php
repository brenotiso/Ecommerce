<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->library('session');
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "scripts" => ''
        );
        if ($this->session->userdata("id")) {
            $dados["qtdCarrinho"] = 0;
            $this->load->database();
            $this->load->model("Produto");
            $resultado = $this->Produto->getUltimosPorId(5);
            foreach ($resultado as $produto){
                $dados["produtoNovo"][] = array(
                    "url" => base_url(),
                    "nome" => $produto["nome"],
                    //adicionar link img
                    "preco" => $produto["preco"]
                );
            }
            $this->parser->parse('headerLogado', $dados);
            $this->parser->parse('homeLogado', $dados);
        } else {
            $this->parser->parse('headerNaoLogado', $dados);
            $this->parser->parse('homeNaoLogado', $dados);
        }
        $this->parser->parse('footer', $dados);
    }

}
