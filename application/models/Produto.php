<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Model {

    public function get($dados = NULL) {
        if ($dados != NULL) {
            $this->db->where($dados);
        }
        $retorno = $this->db->get("produto");
        return $retorno->result_array();
    }
    
    public function getByDisponibilidade() {
        $this->db->where('disponivel', 1);
        $retorno = $this->db->get("produto");
        return $retorno->result_array();
    }
    
    public function getById($id, $tipo = null) {
        if($tipo == "carrinho"){
            $this->db->select("id, left(nome, 27) as nome, preco, disponivel, quantidade, img");
        }
        $this->db->where('id', $id);
        $retorno = $this->db->get("produto");
        return $retorno->result_array();
    }
    
    public function getByNome($nome) {
        $this->db->like('nome', $nome, 'both');
        $retorno = $this->db->get('produto');
        return $retorno->result_array();
    }
    
    public function getUltimosPorId($quantidade) {
        $this->db->limit($quantidade);
        $this->db->where('disponivel', 1);
        $this->db->order_by('id', 'DESC');
        $retorno = $this->db->get("produto");
        return $retorno->result_array();
    }

    public function insert($dados = NULL) {
        if ($this->db->insert("produto", $dados)) {
            return true;
        }
        return false;
    }

    public function alterar($dados, $id) {
        $this->db->where("id", $id);
        if ($this->db->update("produto", $dados)) {
            return true;
        }
        return false;
    } 
}
