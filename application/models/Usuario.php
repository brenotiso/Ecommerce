<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

    public function get($dados = null) {
        if($dados){
            $this->db->where($dados);
        }
        $retorno = $this->db->get('usuario');
        return $retorno->result_array();
    }
    
    public function getIdByNomeSimilar($nome) {
        $this->db->select('id');
        $this->db->like('nome', $nome);
        $retorno = $this->db->get('usuario');
        return $retorno->result_array();
    }

    public function getUsuarioJoinCompra($nome = null, $id = null) {
        $this->db->select('U.id, U.nome as nomeCliente, U.cpf , U.telefone, '
                . 'U.email, U.rua, U.bairro, U.numero, U.complemento, U.cep, '
                . 'U.cidade, U.estado, U.dataCadastro, C.id as idPedido, C.data, C.status');
        $this->db->from('usuario U');
        $this->db->join('compra C', 'U.id = C.idCliente');
        $this->db->group_by('C.id');
        $this->db->order_by('C.id', 'DESC');
        if($nome != null){
            $this->db->like('U.nome', $nome, 'both');
        }
        if($id != null){
            $this->db->where('U.id', $id);
        }
        $retorno = $this->db->get();
        return $retorno->result_array();
    }
    
    public function insert($dados = NULL) {
        if ($this->db->insert("usuario", $dados)) {
            return true;
        }
        return false;
    }
    
    public function alterar($dados, $id) {
        $this->db->where("id", $id);
        if ($this->db->update("usuario", $dados)) {
            return true;
        }
        return false;
    }
}

