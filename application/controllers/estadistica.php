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

    public function hojaDiaria()
    {
        $data=array();
        $query=$this->input->get('fecha1',TRUE);
        if ($query) {
            $this->load->model('estadistica_model');
            $data['usuarios']  = $this->estadistica_model->hojaDiaria(trim($query));
        }else {
            $data['usuarios']=array('');
        }
        $this->load->view('paginas/hojaDiaria_view',$data);
    }

    public function reporteMensualAtenMed()
    {
        $data=array();
        $anio=$this->input->get('anio',TRUE);
        $mes=$this->input->get('mes',TRUE);

        switch ($mes) {
            case 0:
                break;
            case 1:
                $fecha1 =  $anio-1 . "-12-26";
                $fecha2 = $anio."-01-25";
                break;
            case 2:
                $fecha1 = $anio."-01-26";
                $fecha2 = $anio."-02-25";
                break;
            case 3:
                $fecha1 = $anio."-02-26";
                $fecha2 = $anio."-03-25";
                break;
            case 4:
                $fecha1 = $anio."-03-26";
                $fecha2 = $anio."-04-25";
                break;
            case 5:
                $fecha1 = $anio."-04-26";
                $fecha2 = $anio."-05-25";
                break;
            case 6:
                $fecha1 = $anio."-05-26";
                $fecha2 = $anio."-06-25";
                break;
            case 7:
                $fecha1 = $anio."-06-26";
                $fecha2 = $anio."-07-25";
                break;
            case 8:
                $fecha1 = $anio."-07-26";
                $fecha2 = $anio."-08-25";
                break;
            case 9:
                $fecha1 = $anio."-08-26";
                $fecha2 = $anio."-09-25";
                break;
            case 10:
                $fecha1 = $anio."-09-26";
                $fecha2 = $anio."-10-25";
                break;
            case 11:
                $fecha1 = $anio."-10-26";
                $fecha2 = $anio."-11-25";
                break;
            case 12:
                $fecha1 = $anio."-11-26";
                $fecha2 = $anio."-12-25";
                break;
        }

        if ($mes) {
                $this->load->model('estadistica_model');
                $data['usuarios']  = $this->estadistica_model->reporteMensualAtenMed($fecha1,$fecha2);
        }else {
            $data['usuarios']=array('');
        }
        $this->load->view('paginas/mensualAtenMed_view',$data);
    }

}