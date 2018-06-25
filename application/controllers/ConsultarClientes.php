<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultarClientes extends CI_Controller {

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
        $this->load->library('cart');
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => $dados["qtdCarrinho"] = $this->cart->total_items(),
            "scripts" => "<script src='" . base_url() . "assets/js/admClientes.js'></script>"
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        $clientes["clientes"] = $this->Usuario->get();
        foreach($clientes["clientes"] as $key => $cliente) {
            $clientes["clientes"][$key]["dataCadastro"] = date_format(date_create($cliente["dataCadastro"]), "d/m/Y - H:i:s");
            if($cliente["complemento"]) {
                 $clientes["clientes"][$key]["numero"] = $cliente["numero"] . " - " . $cliente["complemento"]; 
            }
        }
        $this->parser->parse('headerLogado', $dados);
        $this->parser->parse('clientes', array_merge($dados, $clientes));
        $this->parser->parse('footer', $dados);
    }

}
