<?php
class BuscarBeneficiario_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function BeneficiarioProsperaNombre($query){
        $this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_OPORT_INTEGRANTE');
        $this->db->like('NOMBRES',$query);
        return $this->db->get('sinos_int_oportunidades')->result_array();
    }

    public function BeneficiarioProsperaFolio($query){
        $this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_OPORT_INTEGRANTE');
        $this->db->like('FOLIO_OPORT_INTEGRANTE',$query);
        return $this->db->get('sinos_int_oportunidades')->result_array();
    }

    public function BeneficiarioSegPopNombre($query){
        $this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_SP_INTEGRANTE');
        $this->db->like('NOMBRES',$query);
        return $this->db->get('sinos_integrante_sp')->result_array();
    }

    public function BeneficiarioSegPopFolio($query){
        $this->db->select('NOMBRES,PATERNO,MATERNO,FECHA_NACIMIENTO,FOLIO_SP_INTEGRANTE');
        $this->db->like('FOLIO_SP_INTEGRANTE',$query);
        return $this->db->get('sinos_integrante_sp')->result_array();
    }

}