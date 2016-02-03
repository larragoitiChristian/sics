<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$data['title'] = ":: Página Principal";
$data['css'] = array(
    "jw/jqx.base.css",
    "jw/jqx.repss.css"
);

$this->load->view("templetes/head",$data);

?>

<div class="ui grid container">
    <section class="row">
        <article class="column">
            <div class="ui cards">
                
                        <div class="ui centered card">
                            <div class="content">
                                <div class="header" align="center" >
                                    Secretaria de Salud de Hidalgo
                                    Sistema de Informacion en Salud
                                </div>
                            </div>
                        </div>
                   
            </div>
        </article>
    </section>
</div>

<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>