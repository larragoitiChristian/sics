$(document).on("ready",inicio);

function inicio(){
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
        url:"http://localhost/index.php/buscaBeneficiario/mostrar",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
        alert(respuesta);

    }

});
}
