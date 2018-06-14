<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProdutoCompra extends CI_Model {

    public function get($dados) {
        $this->db->where($dados);
        $retorno = $this->db->get("produto_compra");
        return $retorno->result_array();
    }

    public function insert($dados = NULL) {
        if ($this->db->insert("produto_compra", $dados)) {
            return true;
        }
        return false;
    }

}

