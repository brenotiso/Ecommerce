<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Model {

    public function get($dados) {
        $this->db->where($dados);
        $retorno = $this->db->get("produto");
        return $retorno->result_array();
    }
    
    public function getUltimosPorId($quantidade) {
        $this->db->limit($quantidade);
        $this->db->order_by('id', 'DESC');
        $retorno = $this->db->get("produto");
        return $retorno->result_array();
    }

    public function insert($dados = NULL) {
        if ($this->db->insert("produto", $dados)) {
            return true;
        } else {
            return false;
        }
    }

}

