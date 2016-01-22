<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="ui inverted vertical footer segment">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
            <div class="three wide column">
                <h4 class="ui inverted header">Acerca de</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Contacto</a>
                </div>
            </div>

            <div class="seven wide column">
                <h4 class="ui inverted header">Derechos reservados</h4>
                <p> Todos los derechos reservados &copy; <?php $data = new DateTime(); echo $data->format('Y');?></p>
            </div>
        </div>
    </div>
</div>

</div><!-- end pusher-->

<script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/semantic.min.js"></script>
<script >
    if(typeof $.fn.sidebar === 'undefined'){
        console.log("NO INTERNET");
        document.write(decodeURI('%3Cscript src="<?php echo ("/assets/js/semantic.min.js");?>"%3E%3C/script%3E'));
    }
</script>
<script src="<?php echo ("/assets/js/comm.js");?>"></script>

<?php if(isset($scripts)){
    for($i=0;$i<count($scripts);$i++){
        echo '<script src="' . ("/assets/js/" . $scripts[$i] . '"></script>');
    }
}?>
<script>
    $(document).ready(function(){

        $("#menuSide").sidebar({dimPage:false,transition:'push'});

        shortcut.add('F11', function () {
                $("#menuSide").sidebar('toggle');
        });

        $(".btnmenu").click(function(){
            $("#menuSide").sidebar('toggle');
        });

    });
</script>
</body>
</html>
