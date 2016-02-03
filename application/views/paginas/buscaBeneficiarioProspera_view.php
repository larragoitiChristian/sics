<?php defined('BASEPATH') OR exit('No direct script access allowed');

$data['title'] = ":: Busca Beneficiario Prospera";
$data['css'] = array(
    "jw/jqx.base.css",
    "jw/jqx.repss.css"
);
$this->load->view("templetes/head",$data);
?>

    <h1 align="center">Buscar Beneficiario de Prospera</h1>
    <p></p>
    <div class="ui four column doubling stackable grid container" align="center">
        <div class="row">
            <div class="column">
                <div class="ui radio checkbox">
                    <input type="radio" name="check" id="check" value="1" checked="checked" onchange="javascript:showContent()">
                    <label>Por Nombre</label>
                </div>
            </div>
            <div class="column">
                <div class="ui radio checkbox">
                    <input type="radio" name="check" id="check" value="2" onchange="javascript:showContent()">
                    <label>Por Folio</label>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    <p></p>
    <div class="ui container">
        <div class="row">
            <form id="form" method="GET" action="<?=base_url()?>index.php/buscaBeneficiario/buscarBeneficiarioProspera">
                <div class="column"  style="display: block;" id="content">
                    <div class="ui action input">
                        <input type="text" placeholder="Nombre..." id="query" name="query">
                        <button class="ui icon button" type="submit" id="buscar">
                            <i class="search icon"></i>
                        </button>
                    </div>
                </div>
                <div class="column" style="display: none;" id="content2">
                    <div class="ui action input">
                        <input type="text" placeholder="Folio..." id="query2" name="query2">
                        <button class="ui icon button" type="submit" id="buscar">
                            <i class="search icon"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p></p>
    <p></p>
    <div class="ui center aligned container">
        <div class="ui center aligned container">
            <div class="row">
                <div class="column">
                    <div id="tblDatos"> </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showContent() {
            element = document.getElementById("content");
            element2 = document.getElementById("content2");
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display='block';
                element2.style.display='none';
            }
            else {
                element.style.display='none';
                element2.style.display='block';
            }
        }

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
                    { name: 'FOLIO_OPORT_INTEGRANTE', type: 'string' }
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
                        { text: 'Fecha Nacimiento', datafield: 'FECHA_NACIMIENTO', width:200, cellsformat: 'd' },
                        { text: 'Folio Prospera', datafield: 'FOLIO_OPORT_INTEGRANTE', width:200,cellsalign: 'center' }
                    ]
                });
        });
    </script>

<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>