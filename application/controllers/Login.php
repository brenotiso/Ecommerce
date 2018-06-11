<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
            . "<script src='" . base_url() . "assets/js/formLogin.js'></script>"
        );
        $this->parser->parse('headerNaoLogado', $dados);
        $this->parser->parse('login', $dados);
        $this->parser->parse('footer', $dados);
    }

    public function fazerLogin() {
        $dados = $this->input->post();
        $dados["senha"] = md5($dados["senha"]);
        $query["email"] = $dados["email"];
        $this->load->database();
        $this->load->model("Usuario");
        $testeEmail = $this->Usuario->get($query);
        if (count($testeEmail) > 0) {
            $resultado = $this->Usuario->get($dados);
            if (count($resultado) > 0) {
                $sessao = array(
                    "id" => $resultado[0]["id"],
                    "privilegio" => $resultado[0]["privilegio"]
                );
                $this->session->set_userdata($sessao);
                $retorno["erro"] = false;
            } else {
                $retorno["erro"] = true;
                $retorno["tipo"] = "error";
                $retorno["msg"] = "Email ou senha inválidos!";
            }
        } else {
            $retorno["erro"] = true;
            $retorno["tipo"] = "warning";
            $retorno["msg"] = "Email não registrado!";
        }
        echo json_encode($retorno);
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
