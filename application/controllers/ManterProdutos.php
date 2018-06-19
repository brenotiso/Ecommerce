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
            "scripts" => "<script src='" . base_url() . "assets/vendor/jquery-validation/dist/jquery.validate.js'></script>\n"
            . "<script src='" . base_url() . "assets/js/manterProdutos.js'></script>",
            "pVazio" => ""
        );
        $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
        $dadosLinha["produtos"] = $this->Produto->get();
        foreach ($dadosLinha["produtos"] as $key => $prod) {
            if ($prod["disponivel"] == 1) {
                $dadosLinha["produtos"][$key]["inativar"] = "";
                $dadosLinha["produtos"][$key]["ativar"] = "hidden";
            } else {
                $dadosLinha["produtos"][$key]["inativar"] = "hidden";
                $dadosLinha["produtos"][$key]["ativar"] = "";
                if ($prod["quantidade"] <= 0) {
                    $dadosLinha["produtos"][$key]["ativar"] = "disabled";
                }
            }
        }
        $dados["produtos"] = $this->parser->parse("ManterProdutosLinha", $dadosLinha, true);
        $this->parser->parse('headerLogado', $dados);
        if (count($dadosLinha["produtos"]) == 0) {
            $dados["vazio"] = "hidden";
            $dados["pVazio"] = "Nao";
        }
        $this->parser->parse('ManterProdutos', $dados);
        $this->parser->parse('footer', $dados);
    }

    public function inativarProduto() {
        $resultado = $this->input->post();
        $id = $resultado["id"];
        $dados["disponivel"] = 0;
        if ($this->Produto->alterar($dados, $id)) {
            $retorno["erro"] = false;
            $retorno["msg"] = "Produto inativado com sucesso!";
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao inativar!";
        }
        echo json_encode($retorno);
    }

    public function ativarProduto() {
        $resultado = $this->input->post();
        $id = $resultado["id"];
        $dados["disponivel"] = 1;
        if ($this->Produto->alterar($dados, $id)) {
            $retorno["erro"] = false;
            $retorno["msg"] = "Produto ativado com sucesso!";
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao ativar!";
        }
        echo json_encode($retorno);
    }

    public function adicionarProduto() {
        $form = $this->input->post();
        $arqvs = $_FILES["fotos"];
        if ($this->Produto->insert($form)) {
            $idProduto = $this->db->insert_id();
            $total = count($_FILES['fotos']['name']);
            for ($i = 0; $i < $total; $i++) {
                $tmpFilePath = $_FILES['fotos']['tmp_name'][$i];
                if ($tmpFilePath != "") {
                    $newFilePath = "../../imgs/" . $idProduto . "-" . $i;
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $retorno["erro"] = true;
                        $retorno["msg"] = "tudo ok.";
                    } else {
                        $retorno["erro"] = false;
                        $retorno["msg"] = "Erro ao upar foto.";
                    }
                }
            }
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao inserir.";
        }
        print_r($retorno);
        //redirect(base_url());
    }

}
