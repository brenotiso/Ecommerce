<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

    public function get($dados) {
        $this->db->where($dados);
        $retorno = $this->db->get("usuario");
        return $retorno->result_array();
    }

    public function insert($dados = NULL) {
        if ($this->db->insert("usuario", $dados)) {
            return true;
        }
        return false;
    }

}

