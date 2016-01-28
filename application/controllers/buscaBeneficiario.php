<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class BuscaBeneficiario extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {

    }

    public function buscarBeneficiario()
    {
        $data=array();
        $query=$this->input->get('query',TRUE);
        $query2=$this->input->get('query2',TRUE);
        if ($query){
            $this->load->model('buscar_beneficiario');
            $data['usuarios']  = $this->buscar_beneficiario->ObtenerTodosNombre(trim($query));

        }else if ($query2) {
            $this->load->model('buscar_beneficiario');
            $data['usuarios']  = $this->buscar_beneficiario->ObtenerTodosFolio(trim($query2));
        }else {
            $data['usuarios']=array('');
        }


      $this->load->view('paginas/buscaBeneficiario_view',$data);
    }




}