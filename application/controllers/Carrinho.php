<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrinho extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->library('session');
        $this->load->library('cart');
        if(!$this->session->userdata("id")){
            redirect("/Login");
        }
    }
    public function index() {
        $carrinho = $this->cart->contents();
        foreach ($carrinho as $key => $car) {
            $carrinho[$key]["url"] = base_url();
        }
        $dados = array(
            "url" => base_url(),
            "scripts" => "<script src='" . base_url() . "assets/js/carrinho.js'></script>",
            "opcoesAdmin" => "",
            "totalCompra" => $this->cart->total(),
            "qtdCarrinho" => $this->cart->total_items(),
            "itensCarrinho" => $carrinho,
            "temProduto" => "hidden"
        );
        if (count($carrinho) == 0) {
            $dados["vazio"] = "hidden";
            $dados["temProduto"] = "pos-center m-text10 p-b-100";
        }
        if ($this->session->userdata("id")) {
            if ($this->session->userdata("privilegio") == 1) {
                $dados["opcoesAdmin"] = $dados["opcoesAdmin"] = $this->parser->parse('opcoesAdm', $dados, TRUE);
            }
            $this->parser->parse('headerLogado', $dados);
            $this->parser->parse('carrinho', $dados);
            $this->parser->parse('footer', $dados);
        }
    }
    public function add($id) {
        $this->load->database();
        $this->load->model("Produto");
        $produtos = $this->Produto->getById($id, "carrinho");
        if (count($produtos) == 1) {
            if ($produtos[0]["disponivel"] == 1 and $produtos[0]["quantidade"] > 0) {
                if (strlen($produtos[0]["nome"]) === 27) {
                    $produtos[0]["nome"] = $produtos[0]["nome"] . "...";
                }
                $img = explode(";", $produtos[0]["img"]);
                if($img[0] != ""){
                    $imagem = "produtos/".$img[0];
                }else{
                    $imagem = "item-10.jpg";
                }
                $dados = array(
                    "id" => $produtos[0]["id"],
                    "qty" => 1,
                    "price" => $produtos[0]["preco"],
                    "name" => $produtos[0]["nome"],
                    "img" => $imagem
                );
                $this->cart->insert($dados);
            }
        }
    }
    public function atualizar() {
        $itens = $this->input->post();
        $this->load->database();
        $this->load->model("Produto");
        for ($i = 0; $i < count($itens["rowid"]); $i++) {
            $reuslt = null;
            $result = $this->Produto->getById($itens["id"][$i], "carrinho");
            if($result[0]["quantidade"] < $itens["qty"][$i]){
                $retorno["erro"] = true;
                $retorno["msg"] = "Só existem " . $result[0]["quantidade"] . " disponíveis";
                $retorno["produto"] = $result[0]["nome"];
                echo json_encode($retorno);
                return;
            }
            $dados = array(
                "rowid" => $itens["rowid"][$i],
                "qty" => $itens["qty"][$i]
            );
            $this->cart->update($dados);
            $retorno["erro"] = false;
        }
        echo json_encode($retorno);
    }
    public function remover($rowid) {
        $this->cart->remove($rowid);
        redirect("/Carrinho");
    }
    
    public function finalizarCompra(){
        $itens = $this->cart->contents();
        if(count($itens) == 0){
            $retorno["erro"] = true;
        }
        $this->load->database();
        $this->load->model("Compra");
        $dados["idCliente"] = $this->session->userdata("id");
        $dados["status"] = "Pedido";
        $this->Compra->insert($dados);
        $idCompra = $this->db->insert_id();
        
        $this->load->model("ProdutoCompra");
        foreach($itens as $item){
            $dados2["idProduto"] = $item["id"];
            $dados2["idCompra"] = $idCompra;
            $dados2["quantidade"] = $item["qty"];
            $this->ProdutoCompra->insert($dados2);
            $retorno["erro"] = false;
        }
        $this->cart->destroy();
        echo json_encode($retorno);
    }
}