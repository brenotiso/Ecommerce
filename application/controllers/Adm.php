<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->_verificarAdm();
        $this->load->helper('url');
        $this->load->library('parser');
    }

    public function Vendas() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => 0, //por enqanto
            "scripts" => "<script src='" . base_url() . "assets/js/tabelaVendas.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/admVendas.js'></script>"
        );
        $this->parser->parse('headerLogado', $dados);
        $this->parser->parse('vendas', $dados);
        $this->parser->parse('footer', $dados);
    }

    private function _verificarAdm(){
        if($this->session->userdata("privilegio") == 0){
            exit('Acesso restrito!');
        }
    }
}
