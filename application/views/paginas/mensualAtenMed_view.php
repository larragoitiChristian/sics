<?php defined('BASEPATH') OR exit('No direct script access allowed');

$data['title'] = ":: Reporte Mensual Aten Med";
$data['css'] = array(
    "jw/jqx.base.css",
    "jw/jqx.repss.css"
);
$this->load->view("templetes/head",$data);
?>


    <h1 align="center">Muestra Hoja Diaria</h1>
    <p></p>
    <br/>

    <?php $y= date ("Y"); ?>

    <div class="ui container">
        <form accept-charset="utf-8" id="form" method="GET" action="<?=base_url()?>index.php/estadistica/reporteMensualAtenMed">
            <div class="ui segment form">
                <div class="fiels">
                    <h3 class="ui header">Seleccione el Año y Mes Estadistico</h3>
                </div>
                <br/>
                <div class="fields">
                    <div class="three wide field">
                        <label>Año:</label>
                        <select class="ui fluid dropdown" id="anio" name="anio">
                            <option value="">Año</option>
                            <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                            <option value="<?php echo $y-1; ?>"><?php echo $y-1; ?></option>
                            <option value="<?php echo $y-2; ?>"><?php echo $y-2; ?></option>
                           </select>
                    </div>
                    <div class="three wide field">
                        <label>Mes:</label>
                        <select class="ui fluid dropdown" id="mes" name="mes">
                            <option value="">Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
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
            $("#tblDatos").jqxGrid('exportdata', 'xls', 'formatoAtencionMedica');
        });

        $(document).ready(function () {

            var $tblDatos=$('#tblDatos'), $data=JSON.parse('<?php echo json_encode($usuarios); ?>');

            var source =
            {
                localdata: $data,
                datatype: "local",
                datafields: [
                    {name: 'UNIDAD', type: 'string'},
                    {name: 'PRIMERAVEZ', type: 'int'},
                    {name: 'CONSECUTIVAS', type: 'int'},
                    {name: 'TRANSM', type: 'int'},
                    {name: 'SM', type: 'int'},
                    {name: 'SB', type: 'int'},
                    {name: 'CRONICOS', type: 'int'},
                    {name: 'CSANOS', type: 'int'},
                    {name: 'PF', type: 'int'},
                    {name: 'OTRAS', type: 'int'},
                    {name: 'TOTAL', type: 'int'}
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
                        {text: 'UNIDAD', datafield: 'UNIDAD', width: 330, align: 'center', cellsformat: 'd'},
                        {text: '1a. VEZ', datafield: 'PRIMERAVEZ', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'CONSECUTIVAS', datafield: 'CONSECUTIVAS', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'ENF. TRANSMISIBLES', datafield: 'TRANSM', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'SALUD MENTAL', datafield: 'SM', width: 80, align: 'center',columngroup:'CONSULTAMED'},
                        {text: 'SALUD BUCAL', datafield: 'SB', width: 80, align: 'center', columngroup:'CONSULTAMED'},
                        {text: 'CRONICO DEGENERATIVAS', datafield: 'CRONICOS', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'CONSULTA A SANOS', datafield: 'CSANOS', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'PLANIFICACION FAMILIAR', datafield: 'PF', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'OTRAS ENFERMEDADES', datafield: 'OTRAS', align: 'center', width: 80, columngroup:'CONSULTAMED'},
                        {text: 'TOTAL', datafield: 'TOTAL', align: 'center', width: 80}
                    ],
                    columngroups: [
                        {text: 'CONSULTAS MEDICAS EN SINOS', align: 'center', name: 'CONSULTAMED'}
                    ]

                });
        });



    </script>
<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>