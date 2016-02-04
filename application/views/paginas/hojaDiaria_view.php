<?php defined('BASEPATH') OR exit('No direct script access allowed');

$data['title'] = ":: Hoja Diaria";
$data['css'] = array(
    "jw/jqx.base.css",
    "jw/jqx.repss.css"
);
$this->load->view("templetes/head",$data);
?>


    <h1 align="center">Muestra Hoja Diaria</h1>
    <p></p>
    <br/>


    <div class="ui container">
        <form id="form" method="GET" action="<?=base_url()?>index.php/estadistica/hojaDiaria">
            <div class="ui segment form">
                <div class="fiels">
                    <h3 class="ui header">Seleccione la Fecha de Reporte</h3>
                </div>
                <br/>
                <div class="fields">
                    <div class="three wide field">
                        <div id="dateInput" nane="dateInput" required="required" autofocus = "autofocus"></div>
                        <input type="hidden" id="fecha1" name="fecha1">
                    </div>
                    <div class="three wide field">
                        <label></label>
                        <button class="ui button" type="submit" id="buscar">
                            Buscar
                        </button>
                    </div>
                    <div class="six wide field"></div>
                    <div class="two wide field">
                        <button class="circular ui icon button" type="button" value="Export to Excel" id='excelExport'>
                            <i class="file excel outline icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <p></p>
    <br/>

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

        $("#excelExport").jqxButton();
        $("#excelExport").click(function () {
            $("#tblDatos").jqxGrid('exportdata', 'xls', 'hojaDiaria');
        });

        $(document).ready(function () {
            //llama al jqwid de calendario
            $("#dateInput").jqxDateTimeInput({ width: '150px', height: '25px', formatString: 'yyyy-MM-dd'});
            //asigna el valor del tex del dataInput al input fecha1
            $("#dateInput").on('change', function (event){
                $("#fecha1").val($('#dateInput').jqxDateTimeInput('getText'));
            });

            var $tblDatos=$('#tblDatos'), $data=JSON.parse('<?php echo json_encode($usuarios); ?>');

            var source =
            {
                localdata: $data,
                datatype: "local",
                datafields: [
                    {name: 'FECHA', type: 'date'},
                    {name: 'NOMBRE', type: 'string'},
                    {name: 'EDAD', type: 'int'},
                    {name: 'SEXO', type: 'string'},
                    {name: 'SPSS', type: 'int'},
                    {name: 'PROSPERA', type: 'int'},
                    {name: 'CONSULTA', type: 'int'},
                    {name: 'PADECIMIENTO', type: 'string'}
            ]
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            $tblDatos.jqxGrid(
                {
                    width: 1130,
                    source: dataAdapter,
                    columnsresize: true,
                    //pageable: true,
                    //autoheight: true,
                    //autowidth:true,
                    //sortable: true,
                    //altrows: true,
                    //enabletooltips: true,
                    //editable: true,
                    selectionmode: 'multiplecellsadvanced',
                    columns: [
                        {text: 'FECHA', datafield: 'FECHA', width: 100, align: 'center', cellsformat: 'd'},
                        {text: 'NOMBRE', datafield: 'NOMBRE', width: 350},
                        {text: 'EDAD', datafield: 'EDAD', width: 50},
                        {text: 'SEXO', datafield: 'SEXO', width: 50},
                        {text: 'SPSS', datafield: 'SPSS', width: 50},
                        {text: 'PROSPERA', datafield: 'PROSPERA', width: 50},
                        {text: '1a vez (Diagnostico)', datafield: 'CONSULTA', width: 50},
                        {text: 'PADECIMIENTO', datafield: 'PADECIMIENTO', width: 450}
                    ]

                });
        });



    </script>
<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>