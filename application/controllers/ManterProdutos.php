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
        $dados["produtos"] = $this->_produtosLinha();
        $this->parser->parse('headerLogado', $dados);
        if ($dados["produtos"] == null) {
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
    
    public function recuperarProduto() {
        $resultado = $this->input->post();
        $id = $resultado["id"];
        $dados = $this->Produto->getById($id);
        echo json_encode($dados[0]);
    }
    
    public function atualizarProduto() {
        $dados = array_filter($this->input->post());
        //echo $this->input->post("nome");
        if(!isset($dados["nome"])){
            $dados["nome"] = 0;
        }
        if(!isset($dados["quantidade"])){
            $dados["quantidade"] = 0;
        }
        if(!isset($dados["preco"])){
            $dados["preco"] = 0;
        }
        if(!isset($dados["descricao"])){
            $dados["descricao"] = 0;
        }
        if(!isset($dados["informacoes"])){
            $dados["informacoes"] = 0;
        }
        if($dados["quantidade"] == 0){
            $dados["disponivel"] = 0;
        }else{
            $dados["disponivel"] = 1;
        }
        $id = $dados["id"];
        unset($dados["id"]);
        if ($this->Produto->alterar($dados, $id)) {
            $retorno["erro"] = false;
            $retorno["msg"] = "Produto alterado com sucesso!";
        }
        else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Ocorreu um erro ao alterar!";
        }
        //echo $this->db->last_query();
        echo json_encode($retorno);
    }

    public function buscarProduto() {
        $resultado = $this->input->post();
        $retorno["tabelaNova"] = $this->_produtosLinha($resultado["nomeProduto"]);
        if ($retorno["tabelaNova"] == null) {
            $retorno["vazio"] = true;
        } else {
            $retorno["vazio"] = false;
        }
        echo json_encode($retorno);
    }

    public function adicionarProduto() {
        $form = $this->input->post();
        $files = $_FILES;

        if ($form["quantidade"] > 0) {
            $form["disponivel"] = 1;
        } else {
            $form["disponivel"] = 0;
        }
        if ($this->Produto->insert($form)) {
            $id = $this->db->insert_id();
            $retorno = $this->_uparImagens($files, $id);
            if ($retorno) {
                $atualizar["img"] = "";
                foreach ($retorno as $img) {
                    $atualizar["img"] = $atualizar["img"] . $img . ";";
                }
                $this->Produto->alterar($atualizar, $id);
            } else {
                $retorno["erro"] = false;
                $retorno["msg"] = "Erro ao upar foto.";
            }
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao inserir.";
        }
        redirect(base_url() . "ManterProdutos");
    }

    private function _uparImagens($files, $id) {
        $this->load->library('upload');
        print_r($files);
        $cpt = count($files['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
            $nomeArqv = $id . "-" . $i;
            $this->upload->initialize($this->_set_upload_options($nomeArqv));
            if (!$this->upload->do_upload()) {
                return false;
            } else {
                $retorno[] = $nomeArqv . "." . (pathinfo($files['userfile']['name'][$i], PATHINFO_EXTENSION));
            }
        }
        return $retorno;
    }

    private function _set_upload_options($nome) {
        $config['file_name'] = $nome;
        $config['upload_path'] = './assets/images/produtos';
        $config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG|PNG';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    private function _produtosLinha($nome = null) {
        if($nome == null){
            $dadosLinha["produtos"] = $this->Produto->get();
        }else{
            $dadosLinha["produtos"] = $this->Produto->getByNome($nome);
        }
        if(count($dadosLinha["produtos"]) == 0){
            return null;
        }
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
        return $this->parser->parse("ManterProdutosLinha", $dadosLinha, true);
    }

}
