<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata("id")) {
            redirect(base_url() . "Login");
        }
        $this->load->library('parser');
        $this->load->library('cart');
        $this->load->database();
        $this->load->model("Usuario");
    }

    private function _carregarHeader() {
        $dados = array(
            "url" => base_url(),
            "qtdCarrinho" => $this->cart->total_items(),
            "scripts" => "<script src='" . base_url() . "assets/vendor/jquery-validation/dist/jquery.validate.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/dadosUsuario.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/usuarioCompras.js'></script>",
            "opcoesAdmin" => ""
        );
        if ($this->session->userdata("privilegio") == 1) {
            $dados["opcoesAdmin"] = $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        }
        $this->parser->parse('headerLogado', $dados);
        return $dados;
    }

    public function compras() {
        $this->load->model("Produto");
        $this->load->model("Compra");
        $dados = $this->_carregarHeader();

        $compras = $this->Usuario->getUsuarioJoinCompra(null, $this->session->userdata("id"));
        $retorno["temCompra"] = "hidden";
        if (count($compras) == 0) {
            $retorno["vazio"] = "hidden";
            $retorno["temCompra"] = "pos-center m-text10 p-b-100";
        }
        foreach ($compras as $key => $compra) {
            $compra["total"] = 0;
            $compra["data"] = date_format(date_create($compra["data"]), "d/m/Y - H:i:s");
            $resultado = null;
            $resultado = $this->Compra->getProdutosPorCompra($compra["idPedido"]);
            foreach ($resultado as $key2 => $result) {
                $compra["total"] += $result["preco"] * $result["quantidade"];
                $resultado[$key2]["totalProduto"] = $result["preco"] * $result["quantidade"];
            }
            $retorno["compras"][] = $compra;
            $retorno["compras"][$key]["produtos"] = $resultado;
        }
        $retorno["url"] = base_url();
        $this->parser->parse('comprasRealizadas', $retorno);
        $this->parser->parse('footer', $dados);
    }

    public function dadosPessoais() {
        $dados = $this->_carregarHeader();
        $a["id"] = $this->session->userdata("id");
        $usuario = $this->Usuario->get($a);
        unset($usuario[0]["senha"]);
        if ($usuario[0]["complemento"]) {
            $usuario[0]["complemento"] = " - " . $usuario[0]["complemento"];
        }
        $usuario[0]["dataCadastro"] = date_format(date_create($usuario[0]["dataCadastro"]), "d/m/Y - H:i:s");
        $this->parser->parse('dadosUsuario', array_merge($dados, $usuario[0]));
        $this->parser->parse('footer', $dados);
    }

    public function alterarDadosPessoais() {
        $dados = $this->_carregarHeader();
        $a["id"] = $this->session->userdata("id");
        $usuario = $this->Usuario->get($a);
        unset($usuario[0]["senha"]);
        unset($usuario[0]["id"]);
        $this->parser->parse('alterar', array_merge($dados, $usuario[0]));
        $this->parser->parse('footer', $dados);
    }

    public function alterarDados() {
        $dados = array_filter($this->input->post());
        $a["id"] = $this->session->userdata("id");
        if ($this->Usuario->alterar($dados, $a["id"])) {
            $retorno["erro"] = false;
            $retorno["msg"] = "Dados alterados com sucesso!";
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao alterar!";
        }
        echo json_encode($retorno);
    }

    public function alterarSenha() {
        $dados = array_filter($this->input->post());
        unset($dados["senhaNovaConfirmacao"]);
        $resultado["id"] = $this->session->userdata("id");
        $resultado["senha"] = md5($dados["senhaAtual"]);
        $resultado = $this->Usuario->get($resultado);
        if (count($resultado) > 0) {
            $resultado[0]["senha"] = md5($dados["senhaNova"]);
            if ($this->Usuario->alterar($resultado[0], $resultado[0]["id"])) {
                $retorno["erro"] = false;
                $retorno["msg"] = "Senha alterada com sucesso!";
            } else {
                $retorno["erro"] = true;
                $retorno["msg"] = "Não foi possível alterar a senha!";
            }
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Senha atual não corresponde com a cadastrada!";
        }
        echo json_encode($retorno);
    }

}
