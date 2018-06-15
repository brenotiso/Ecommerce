<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Model {

    public function get($dados = null) {
        if($dados != null){
            $this->db->where($dados);
        }
        $this->db->order_by('id', 'DESC');
        $retorno = $this->db->get("compra");
        return $retorno->result_array();
    }
    
    public function getByIdUsuario($id) {
        $this->db->where('idCliente',$id);
        $retorno = $this->db->get("compra");
        return $retorno->result_array();
    }
    
    public function alter($id, $dados){
        $this->db->where("id", $id);
        if($this->db->update("compra", $dados)){
            return true;
        }
        return false;
    }
    
    public function delete($id){
        $this->db->where("id", $id);
        if($this->db->delete("compra")){
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

