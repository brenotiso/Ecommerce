<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->library('session');
    }

    public function index() {
        $dados = array(
            "url" => base_url(),
            "scripts" => "<script src='" . base_url() . "assets/vendor/jquery-validation/dist/jquery.validate.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/formCadastro.js'></script>"
        );
        $this->parser->parse('headerNaoLogado', $dados);
        $this->parser->parse('cadastro', $dados);
        $this->parser->parse('footer', $dados);
    }

    public function cadastrar() {
        $dados = array_filter($this->input->post());
        $dados["cpf"] = str_replace(".", "", $dados["cpf"]);
        $dados["cpf"] = str_replace("-", "", $dados["cpf"]);
        $dados["cpf"] = str_replace(" ", "", $dados["cpf"]);
        $dados["senha"] = md5($dados["senha"]);
        $dados["privilegio"] = 0;
        unset($dados["senhaConfirmada"]);
        $this->load->database();
        $this->load->model("Usuario");
        $query["email"] = $dados["email"];
        $resultado = $this->Usuario->get($query);
        if (count($resultado) > 0) {
            $retorno = array(
                "erro" => true,
                "msg" => "Este email já foi utilizado por outro cliente!"
            );
        } else {
            $query2["cpf"] = $dados["cpf"];
            $resultado2 = $this->Usuario->get($query2);
            if (count($resultado2) > 0) {
                $retorno = array(
                    "erro" => true,
                    "msg" => "Já existe uma conta com este CPF!"
                );
            } else {
                if ($this->Usuario->insert($dados)) {
                    $retorno = array(
                        "erro" => false,
                        "msg" => "Cadastrado com sucesso!"
                    );
                } else {
                    $retorno = array(
                        "erro" => true,
                        "msg" => "Erro na operação!"
                    );
                }
            }
        }
        echo json_encode($retorno);
    }
}
