<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class BuscaBeneficiario extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {

    }

    public function buscarBeneficiarioProspera()
    {
        $data=array();
        $query=$this->input->get('query',TRUE);
        $query2=$this->input->get('query2',TRUE);
        if ($query){
            $this->load->model('buscarBeneficiario_model');
            $data['usuarios']  = $this->buscarBeneficiario_model->BeneficiarioProsperaNombre(trim($query));

        }else if ($query2) {
            $this->load->model('buscarBeneficiario_model');
            $data['usuarios']  = $this->buscarBeneficiario_model->BeneficiarioProsperaFolio(trim($query2));
        }else {
            $data['usuarios']=array('');
        }
      $this->load->view('paginas/buscaBeneficiarioProspera_view',$data);
    }

    public function buscarBeneficiarioSegPop()
    {
        $data=array();
        $query=$this->input->get('query',TRUE);
        $query2=$this->input->get('query2',TRUE);
        if ($query){
            $this->load->model('buscarBeneficiario_model');
            $data['usuarios']  = $this->buscarBeneficiario_model->BeneficiarioSegPopNombre(trim($query));

        }else if ($query2) {
            $this->load->model('buscarBeneficiario_model');
            $data['usuarios']  = $this->buscarBeneficiario_model->BeneficiarioSegPopFolio(trim($query2));
        }else {
            $data['usuarios']=array('');
        }
        $this->load->view('paginas/buscaBeneficiarioSegPop_view',$data);
    }


}