<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$data['title'] = ":: Afiliación y Operación";
$data['css'] = array(

);

$this->load->view("/templetes/head",$data);

?>

<div class="ui grid container">

    <section class="row">
        <article class="column">
            <h1 class="ui header">
                Subdirección de Afiliación y Operación
            </h1>
            <p class="ui segment">Coordina los Módulos de Afiliación en el estado, la planeación, elaboración y ejecución de estrategias para la afiliación, reafiliación, toma de huellas, difusión, promoción y consulta segura que permitan mantener la cobertura universal del padrón de afiliados en el estado de hidalgo al Sistema de Protección Social en Salud, así como establecer estrategias que permitan regular la obtención y generación de información para la adecuada operación de las diversas áreas del Régimen Estatal de Protección Social en Salud.</p>
        </article>
    </section>


    <section class="row">
        <article class="column">
           
                <a class="ui button" href="<?php echo site_url('ao/ver/estadisticas') ?>">Estadísticas</a>
                
                <a class="ui button" href="<?php echo site_url('ao/ver/foliosap')?>">Folios para SAP</a>


        </article>
    </section>



</div>






<?php
$data['scripts'] = array(

);
$this->load->view("/templetes/footer",$data);
?>