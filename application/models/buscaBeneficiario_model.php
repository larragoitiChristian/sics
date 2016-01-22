<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buscaBeneficiario_model extends CI_Model{

    function mostrar($valor){
        $this->db->like("nombre",$valor);
        $consulta = $this->db->get("sinos_int_oportunidades");
        return $consulta->result();
    }
}


