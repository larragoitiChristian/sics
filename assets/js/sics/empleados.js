$(document).on("ready",inicio);

function inicio(){
    mostrarDatos("");
    $("form").submit(function(event){
        event.preventDefault();

        $.ajax({
            url:$("form").attr("action"),
            type:$("form").attr("method"),
            data:$("form").serialize(),
            success:function(respuesta){
                alert(respuesta);
            }
        })
    })
}

function mostrarDatos(valor){

    $.ajax({
        url:"http://http://localhost/CodeIgniter/index.php/empleados/mostrar",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
            var registros=eval(respuesta);

            var $tblDatos=$('#tblDatos'), $data=JSON.parse('<?php echo json_encode($registros); ?>');

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

        }

    });
}

