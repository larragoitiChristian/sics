/**
 * Created by Usuario on 03/12/2015.
 */
var MY = function () {
    "use strict";
    var
        $modalUsarioEditar          = $("#modalUsarioEditar"),
        $tblUsuarios                = $("#tblUsuarios"),
        $btnUsuarioNuevo            = $("#btnUsuarioNuevo"),
        $btnUsuarioEditar           = $("#btnUsuarioEditar"),
        $btnUsuarioUsuario          = $("#btnUsuarioUsuario"),
        selectedUser                = {},
        $frmUsuarioEditar           = $("#frmUsuarioEditar"),
        $txtNombreCompleto          = $("#txtNombreCompleto"),
        $txtContrasenia             = $("#txtContrasenia"),
        $cmdPerfil                  = $("#cmdPerfil"),
        $txtImagenUsuario           = $("#txtImagenUsuario"),
        $chkUsuarioActivo           = $("#chkUsuarioActivo"),
        $txtUsuario                 = $("#txtUsuario"),
        $imgPreview                 = $("#imgPreview"),
        $modalNombreUsuarioEditar   = $("#modalNombreUsuarioEditar"),
        $txtNombreUsuario           = $("#txtNombreUsuario"),
        $btnNombreUsuarioEditar     = $("#btnNombreUsuarioEditar")

        ;


    function loadPefiles() {
        $cmdPerfil.html('<option value="">--Elije--</option>');
        $.ajax({
            url: _REPSS.getURL('configuraciones/get/perfiles')
        }).done(function (e) {
            if (e) {
                var obj = JSON.parse(e), i;
                for (i = 0; i < obj.length; i++) {
                    $cmdPerfil.append($('<option></option>').val(obj[i].id).text(obj[i].nombre));
                }
            }
        });
    }

    function getUserData() {
        var source = {
            datatype: 'json',
            datafields: [
                {name: 'id'            , type: 'int'},
                {name: 'nombre'        , type: 'string'},
                {name: 'usuario'       , type: 'string' },
                {name: 'id_perfil'     , type: 'int'},
                {name: 'perfil'        , type: 'string'},
                {name: 'activo'        , type: 'bool'},
                {name: 'imagen'        , type: 'string'}
            ],
            url:  _REPSS.getURL("configuraciones/get/usuarios"),
            root: 'data',
            id: 'id'
        };
        return new $.jqx.dataAdapter(source);
    }

    function saveUsuario() {


        var formData = new FormData($('#frmUsuarioEditar')[0]);
        if (selectedUser.hasOwnProperty('id')) {
            formData.append("id", selectedUser.id);
        }

        $.ajax({
            url: _REPSS.getURL('configuraciones/set/usuario'),
            type: 'post',
            data: formData,
            xhr: function() {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // Check if upload property exists
                    myXhr.upload.addEventListener('progress',function(e){if(e.lengthComputable){console.log(e);} }, false); // For handling the progress of the upload
                }
                return myXhr;
            },
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        }).done(function () {
            toastr.success("Usuario guardado");
            $tblUsuarios.jqxGrid({source: getUserData()});
        }).fail(function () {
            toastr.error("Error al guardar usuario");
        }).complete(function () {
            $modalUsarioEditar.modal('hide');
        });
    }

    function previewImg(input) {
        if (input.files && input.files[0]) {
            var imageType = /image.*/, reader = new FileReader();

            if (!input.files[0].type.match(imageType) || input.files[0].size > 524288) {
                $(input).val('');
                return;
            }


            reader.onload = function (e) {
                $imgPreview.attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    return{
        init: function () {

            loadPefiles();

            $btnNombreUsuarioEditar.click(function(){
                var data =  $tblUsuarios.jqxGrid('getrowdata', $tblUsuarios.jqxGrid('getselectedrowindex'));
                if(data) {
                    selectedUser = data;
                }
                if(selectedUser.hasOwnProperty('id')){
                    $.ajax({
                        type: 'post',
                        url: _REPSS.getURL('configuraciones/set/nombreUsuario'),
                        data: {id: selectedUser.id, usuario: $txtNombreUsuario.val().trim()},
                        success: function(e){
                            if(e.length && e === "ok"){
                                toastr.success('Cambio correcto');
                                $tblUsuarios.jqxGrid({source: getUserData()});
                            }else{
                                toastr.error('Cambio incorrecto');
                            }
                        },
                        error: function(e){
                            toastr.error('Ocurrio un error al guardar la información '+ e.responseText);
                        },
                        complete: function(){
                            $modalNombreUsuarioEditar.modal('hide');
                        }
                    });
                }
            });

            $tblUsuarios.jqxGrid({
                width: '100%',
                groupable: true,
                theme : "repss",
                localization : lang_es(),
                sortable: true,
                pageable: true,
                autoheight: true,
                rowsheight: 60,
                pagermode: 'simple',
                columns: [
                    { text: 'Nombre usuario', datafield: 'usuario', width: 150 },
                    { text: 'Nombre completo', datafield: 'nombre'},
                    { text: 'Imagen', datafield: 'imagen', width: 80, cellsrenderer: function(a,b,c){
                        if(!c.length){
                            c = 'empty.jpg';
                        }
                        var img = _REPSS.getSiteUrl("assets/img/users/"+ c);
                        console.log(img);
                        return '<img style="margin-left: 5px;" width="60" src="' + img  + '"/>';
                    } },
                    { text: 'Perfil', datafield: 'perfil', width: 120},
                    { text: 'Activo', datafield: 'activo', width: 80 }
                ],
                source: getUserData()
            });

            $btnUsuarioNuevo.click(function () {
                $frmUsuarioEditar.get(0).reset();
                $modalUsarioEditar.find("img").attr("src", _REPSS.getSiteUrl("assets/img/users/empty.jpg"));
                $modalUsarioEditar.modal("show");
            });

            $modalUsarioEditar.find(".primary.button").click(function () {
                saveUsuario();
            });

            $btnUsuarioEditar.click(function () {

                var data =  $tblUsuarios.jqxGrid('getrowdata', $tblUsuarios.jqxGrid('getselectedrowindex'));

                if (data) {
                    $frmUsuarioEditar.get(0).reset();
                    selectedUser = data;
                    $txtNombreCompleto.val(selectedUser.nombre);
                    $txtContrasenia.val("nochange");
                    $cmdPerfil.val(selectedUser.id_perfil);
                    $chkUsuarioActivo.attr('checked', (selectedUser.activo));
                    if(!selectedUser.imagen){
                        $modalUsarioEditar.find("img").attr("src", _REPSS.getSiteUrl("assets/img/users/empty.jpg"));
                    }else{
                        $modalUsarioEditar.find("img").attr("src", _REPSS.getSiteUrl("assets/img/users/"+ selectedUser.imagen));
                    }

                    $txtUsuario.val(selectedUser.usuario);
                    $modalUsarioEditar.modal("show");

                }



            });


            $txtImagenUsuario.change(function () {
                previewImg(this);
            });

            $btnUsuarioUsuario.click(function(){

                    $modalNombreUsuarioEditar.modal('show');

            });
        }
    };

}();

$(document).ready(function () {
    "use strict";
    MY.init();
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
});