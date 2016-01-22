<?php
class Buscar_beneficiario extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function ObtenerTodos(){
        $this->db->select('sinos_int_oportunidades.NOMBRES,sinos_int_oportunidades.PATERNO,sinos_int_oportunidades.MATERNO,sinos_int_oportunidades.FECHA_NACIMIENTO, sinos_int_oportunidades.FOLIO_OPORT_INTEGRANTE,sinos_integrante_sp.FOLIO_SP_INTEGRANTE');
        $this->db->from('sinos_int_oportunidades');
        $this->db->join('sinos_integrante_sp', 'sinos_int_oportunidades.NOMBRES=sinos_integrante_sp.NOMBRES AND sinos_int_oportunidades.PATERNO=sinos_integrante_sp.PATERNO AND sinos_int_oportunidades.MATERNO=sinos_integrante_sp.MATERNO', 'left');
        //$this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_SP_INTEGRANTE');
        //$this->db->order_by('nombre');
        return $this->db->get()->result_array();
    }

}