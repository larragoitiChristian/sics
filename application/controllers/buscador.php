<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscador extends CI_Controller 
{
	
	public function __construct() 
	{
		
		parent::__construct();
		//carfamos la base de datos, los helpers
		//librerías y el modelo en el constructor
		$this->load->database('default');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('buscador_model');
		
	}
	
	public function index()
	{
		
		//pasamos el título y los resultados de la búsqueda a la vista
		//a través del array data
		$data = array('titulo' => 'Buscador con múltiples criterios', 
					  'resultados' => $this->busqueda());
					  
		$this->load->view('paginas/buscador_view',$data);
		
	}
	
	//aquí es donde hacemos toda la búsqueda del buscador
	public function busqueda()
	{
		
		if($this->input->post('buscar'))
		{
			
			//limpiamos los campos del formulario, no necesitamos validar
			$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|max_length[40]|xss_clean');		 

				
			//los campos del formulario deben tener el mismo nombre
			//que los de la base de datos a buscar, esto luego lo 
			//recorremos para comprobar como vienen				
			$campos = array('nombre');
			
			//envíamos los datos al modelo para hacer la búsqueda
			$resultados = $this->buscador_model->nueva_busqueda($campos);
			
			if($resultados !== FALSE)
			{
				
				return $resultados;
				
			}
			
		}
		
	}

	//a través de jquery llenamos el autocompletado
	public function poblaciones()
    {
        //si es una petición ajax y existe una variable post
        //llamada info dejamos pasar
        if($this->input->is_ajax_request() && $this->input->post('info'))
        {
 
            $abuscar = $this->security->xss_clean($this->input->post('info'));
 
            $search = $this->buscador_model->buscador_poblacion($abuscar);
 
            //si search es distinto de false significa que hay resultados
            //y los mostramos con un loop foreach
            if($search !== FALSE)
            {
 
                foreach($search as $fila)
                {
                ?>
 
                    <p><a title="<?php echo $fila->poblacion ?>" href="" 
                    	onclick="$('.poblacion').val($(this).attr('title')); ">
                    	<?php echo $fila->poblacion ?>
                    </a></p>
 
                <?php
                }
 
            //en otro caso decimos que no hay resultados
            }else{
            ?>
 
                <p><?php echo 'No hay resultados' ?></p>
 
            <?php
            }
 
        }
 
    }
}