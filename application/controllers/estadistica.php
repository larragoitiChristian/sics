<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Estadistica extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function siuve()
    {
        $data=array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Añadimos las reglas necesarias.
        $this->form_validation->set_rules('dateInput', 'dateInput', 'required');
       // $this->form_validation->set_rules('password', 'Password', 'required');

        // Generamos el mensaje de error personalizado para la accion 'required'
        $this->form_validation->set_message('required', 'El campo %s es requerido.');

        $query=$this->input->get('fecha1',TRUE);
        $query2=$this->input->get('fecha2',TRUE);

        if ($query) {
            if ($query2){
                $this->load->model('estadistica_model');
                $data['usuarios']  = $this->estadistica_model->siuve($query,$query2);
            }
        }else {
            $data['usuarios']=array('');
        }



            $this->load->view('paginas/suive_view',$data);

    }

}