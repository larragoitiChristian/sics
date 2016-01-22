<?php defined('BASEPATH') OR exit('No direct script access allowed');

$data['title'] = ":: Busca Beneficiario";
$data['css'] = array(
    "jw/jqx.base.css",
    "jw/jqx.repss.css"
);
$this->load->view("templetes/head",$data);
?>



<div class="ui grid container" ">
<div class="item">
    <div class="ui icon input">
      <input type="text" placeholder="Nombre...">
      <i class="search icon"></i>
    </div>
  </div>

    <div class="row">
        <div class="column">
            <div id="tblDatos">

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var $tblDatos=$('#tblDatos'), $data=JSON.parse('<?php echo json_encode($usuarios); ?>');

        var source =
        {
            localdata: $data,
            datatype: "local",
            datafields: [
                { name: 'NOMBRES', type: 'string' },
                { name: 'PATERNO', type: 'string' },
                { name: 'MATERNO', type: 'string' },
                { name: 'FECHA_NACIMIENTO', type: 'date' },
                { name: 'FOLIO_SP_INTEGRANTE', type: 'string' }
              ]
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        $tblDatos.jqxGrid(
            {
                //width: 650,
                source: dataAdapter,
                pageable: true,
                autoheight: true,
                autowidth:true,
                sortable: true,
                //altrows: true,
                //enabletooltips: true,
                //editable: true,
                selectionmode: 'multiplecellsadvanced',
                columns: [
                    { text: 'Nombre',  datafield: 'NOMBRES', width:250 },
                    { text: 'A Paterno', datafield: 'PATERNO', width:200 },
                    { text: 'A Materno', datafield: 'MATERNO', width:200 },
                    { text: 'Fecha Nacimiento', datafield: 'FECHA_NACIMIENTO', width:200 },
                    { text: 'Folio Seguro Popular', datafield: 'FOLIO_SP_INTEGRANTE', width:200 }
                ]
            });
    });
</script>

<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>