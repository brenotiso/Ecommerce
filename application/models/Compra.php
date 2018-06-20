<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Model {

    public function get($dados = null) {
        if ($dados != null) {
            $this->db->where($dados);
        }
        $this->db->order_by('id', 'DESC');
        $retorno = $this->db->get("compra");
        return $retorno->result_array();
    }

    public function getProdutosPorCompra($id) {
        $this->db->select("PC.idCompra AS idPedido, P.nome AS nomeProduto, PC.idProduto, PC.quantidade");
        $this->db->from("produto_compra PC, produto P");
        $this->db->where("PC.idProduto = P.id");
        $this->db->where("PC.idCompra", $id);
        $retorno = $this->db->get();
        return $retorno->result_array();
    }

    public function alter($id, $dados) {
        $this->db->where("id", $id);
        if ($this->db->update("compra", $dados)) {
            return true;
        }
        return false;
    }

    public function delete($id) {
        $this->db->where("id", $id);
        if ($this->db->delete("compra")) {
            return true;
        }
        return false;
    }

    public function insert($dados = NULL) {
        if ($this->db->insert("compra", $dados)) {
            return true;
        }
        return false;
    }

}
