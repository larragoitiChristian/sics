<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$data['title'] = ":: Busca Beneficiario";
$data['css'] = array(
"jw/jqx.base.css",
"jw/jqx.repss.css"
);

$this->load->view("templetes/head",$data);
?>



<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>