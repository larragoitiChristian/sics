<?php defined('BASEPATH') OR exit('No direct script access allowed');

$data['title'] = ":: Suive";
$data['css'] = array(
    "jw/jqx.base.css",
    "jw/jqx.repss.css"
);
$this->load->view("templetes/head",$data);
?>


    <h1 align="center">Muestra Suive</h1>
    <p></p>
    <br/>


    <div class="ui container">
        <form id="form" method="GET" action="<?=base_url()?>index.php/estadistica/siuve">
        <div class="ui segment form">
            <div class="fiels">
                <h3 class="ui header">Seleccione Rancho de Fecha de Reporte</h3>
            </div>
            <br/>
            <div class="fields">
                <div class="three wide field">
                    <label>De:</label>
                    <div id="dateInput" nane="dateInput" required="required" autofocus = "autofocus"></div>
                    <input type="hidden" id="fecha1" name="fecha1">
                </div>
                <div class="three wide field">
                    <label>Hasta:</label>
                    <div id='dateInput2'></div>
                    <input type="hidden" id="fecha2" name="fecha2">
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
            $("#tblDatos").jqxGrid('exportdata', 'xls', 'jqxGrid');
        });

        $(document).ready(function () {
            //llama al jqwid de calendario
            $("#dateInput").jqxDateTimeInput({ width: '150px', height: '25px', formatString: 'yyyy-MM-dd'});
            //asigna el valor del tex del dataInput al input fecha1
            $("#dateInput").on('change', function (event){
                $("#fecha1").val($('#dateInput').jqxDateTimeInput('getText'));
            });
            $("#dateInput2").jqxDateTimeInput({ width: '150px', height: '25px', formatString: 'yyyy-MM-dd' });
            $("#dateInput2").on('change', function (event){
                $("#fecha2").val($('#dateInput2').jqxDateTimeInput('getText'));
            });
            var $tblDatos=$('#tblDatos'), $data=JSON.parse('<?php echo json_encode($usuarios); ?>');

            var source =
            {
                localdata: $data,
                datatype: "local",
                datafields: [
                    {name: 'NOMBRE_GRUPO', type: 'string'},
                    {name: 'DESCRIPCION', type: 'string'},
                    {name: 'EPI_CLAVE', type: 'int'},
                    {name: 'Menor1_M', type: 'int'},
                    {name: 'Menor1_F', type: 'int'},
                    {name: 'DE_1_A_4_M', type: 'int'},
                    {name: 'DE_1_A_4_F', type: 'int'},
                    {name: 'DE_5_A_9_M', type: 'int'},
                    {name: 'DE_5_A_9_F', type: 'int'},
                    {name: 'DE_10_A_14_M', type: 'int'},
                    {name: 'DE_10_A_14_F', type: 'int'},
                    {name: 'DE_15_A_19_M', type: 'int'},
                    {name: 'DE_15_A_19_F', type: 'int'},
                    {name: 'DE_20_A_24_M', type: 'int'},
                    {name: 'DE_20_A_24_F', type: 'int'},
                    {name: 'DE_25_A_44_M', type: 'int'},
                    {name: 'DE_25_A_44_F', type: 'int'},
                    {name: 'DE_45_A_49_M', type: 'int'},
                    {name: 'DE_45_A_49_F', type: 'int'},
                    {name: 'DE_50_A_59_M', type: 'int'},
                    {name: 'DE_50_A_59_F', type: 'int'},
                    {name: 'DE_60_A_64_M', type: 'int'},
                    {name: 'DE_60_A_64_F', type: 'int'},
                    {name: 'Mayor65_M', type: 'int'},
                    {name: 'Mayor65_F', type: 'int'},
                    {name: 'Total_M', type: 'int'},
                    {name: 'Total_F', type: 'int'},
                    {name: 'Total', type: 'int'}
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
                        {text: 'Grupo', datafield: 'NOMBRE_GRUPO', width: 250, align: 'center', groupable: true},
                        {
                            text: 'Diagnostico y Codigo CIE 10a Revision',
                            datafield: 'DESCRIPCION',
                            width: 450,
                            align: 'center'
                        },
                        {text: 'EPI clave', datafield: 'EPI_CLAVE', width: 60, align: 'center'},
                        {text: 'M', columngroup: 'Menor1', datafield: 'Menor1_M', width: 30},
                        {text: 'F', columngroup: 'Menor1', datafield: 'Menor1_F', width: 30},
                        {text: 'M', columngroup: 'DE_1_A_4', datafield: 'DE_1_A_4_M', width: 30},
                        {text: 'F', columngroup: 'DE_1_A_4', datafield: 'DE_1_A_4_F', width: 30},
                        {text: 'M', columngroup: 'DE_5_A_9', datafield: 'DE_5_A_9_M', width: 30},
                        {text: 'F', columngroup: 'DE_5_A_9', datafield: 'DE_5_A_9_F', width: 30},
                        {text: 'M', columngroup: 'DE_10_A_14', datafield: 'DE_10_A_14_M', width: 30},
                        {text: 'F', columngroup: 'DE_10_A_14', datafield: 'DE_10_A_14_F', width: 30},
                        {text: 'M', columngroup: 'DE_15_A_19', datafield: 'DE_15_A_19_M', width: 30},
                        {text: 'F', columngroup: 'DE_15_A_19', datafield: 'DE_15_A_19_F', width: 30},
                        {text: 'M', columngroup: 'DE_20_A_24', datafield: 'DE_20_A_24_M', width: 30},
                        {text: 'F', columngroup: 'DE_20_A_24', datafield: 'DE_20_A_24_F', width: 30},
                        {text: 'M', columngroup: 'DE_25_A_44', datafield: 'DE_25_A_44_M', width: 30},
                        {text: 'F', columngroup: 'DE_25_A_44', datafield: 'DE_25_A_44_F', width: 30},
                        {text: 'M', columngroup: 'DE_45_A_49', datafield: 'DE_45_A_49_M', width: 30},
                        {text: 'F', columngroup: 'DE_45_A_49', datafield: 'DE_45_A_49_F', width: 30},
                        {text: 'M', columngroup: 'DE_50_A_59', datafield: 'DE_50_A_59_M', width: 30},
                        {text: 'F', columngroup: 'DE_50_A_59', datafield: 'DE_50_A_59_F', width: 30},
                        {text: 'M', columngroup: 'DE_60_A_64', datafield: 'DE_60_A_64_M', width: 30},
                        {text: 'F', columngroup: 'DE_60_A_64', datafield: 'DE_60_A_64_F', width: 30},
                        {text: 'M', columngroup: 'Mayor65', datafield: 'Mayor65_M', width: 30},
                        {text: 'F', columngroup: 'Mayor65', datafield: 'Mayor65_F', width: 30},
                        {text: 'M', columngroup: 'Total', datafield: 'Total_M', width: 30},
                        {text: 'F', columngroup: 'Total', datafield: 'Total_F', width: 30},
                        {text: 'Total', columngroup: '', datafield: 'Total', width: 50}
                    ],
                    columngroups: [
                        {text: '< de 1 año', align: 'center', name: 'Menor1', parentgroup: 'grupoEdad'},
                        {text: '1 - 4', align: 'center', name: 'DE_1_A_4', parentgroup: 'grupoEdad'},
                        {text: '5 - 9', align: 'center', name: 'DE_5_A_9', parentgroup: 'grupoEdad'},
                        {text: '10 - 14', align: 'center', name: 'DE_10_A_14', parentgroup: 'grupoEdad'},
                        {text: '15 - 19', align: 'center', name: 'DE_15_A_19', parentgroup: 'grupoEdad'},
                        {text: '20 - 24', align: 'center', name: 'DE_20_A_24', parentgroup: 'grupoEdad'},
                        {text: '25 - 44', align: 'center', name: 'DE_25_A_44', parentgroup: 'grupoEdad'},
                        {text: '45 - 49', align: 'center', name: 'DE_45_A_49', parentgroup: 'grupoEdad'},
                        {text: '50 - 59', align: 'center', name: 'DE_50_A_59', parentgroup: 'grupoEdad'},
                        {text: '60 - 64', align: 'center', name: 'DE_60_A_64', parentgroup: 'grupoEdad'},
                        {text: '65 Y >', align: 'center', name: 'Mayor65', parentgroup: 'grupoEdad'},
                        {text: 'Total', align: 'center', name: 'Total', parentgroup: 'grupoEdad'},
                        {text: 'Número de casos según grupo de edad y sexo', align: 'center', name: 'grupoEdad'},
                    ]

                });
        });



    </script>
<?php
$data['scripts'] = array(

);
$this->load->view("templetes/footer",$data);
?>