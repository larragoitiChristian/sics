<?php
class Buscar_beneficiario extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function ObtenerTodosNombre($query){
        $this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_OPORT_INTEGRANTE');
        $this->db->like('NOMBRES',$query);
        return $this->db->get('sinos_int_oportunidades')->result_array();
    }

    public function ObtenerTodosFolio($query){
        $this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_OPORT_INTEGRANTE');
        $this->db->like('FOLIO_OPORT_INTEGRANTE',$query);
        return $this->db->get('sinos_int_oportunidades')->result_array();
    }

}