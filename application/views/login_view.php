<?php defined('BASEPATH') OR exit('No direct script access allowed');
$data['title'] = ":: Inicio de sesión";
$data['css'] = array(
    "login.css"
);

$this->load->view("templetes/head",$data);
?>

    <div class="ui grid container">
        <section class="centered row">
            <article class="column" style="max-width: 350px;">
                <div class="ui segment form">

                    <form method="post" accept-charset="utf-8" autocomplete="off">

                        <p class="ui header">Iniciar Sesión</p>
                        <div class="field">
                            <label for="usuario">Usuario:</label>
                            <div class="ui left icon  fluid input">
                                <i class="user icon"></i>
                                <input type="text" id="usuario"  name="username" required="required" autofocus = "autofocus" class="login"/>
                            </div>
                        </div>

                        <div class="field">
                            <label for="clave">Constraseña:</label>
                            <div class="ui left icon fluid input">
                                <i class="lock icon"></i>
                                <input type="password" id="clave" name="password"  required="required" class="login"/>
                            </div>
                        </div>

                        <div class="field">
                            <input type="submit" value="Iniciar" class="ui fluid large button">
                        </div>
                    </form>
                </div>

                <?php if(@$error_login): ?>
                    <div class="ui bottom attached error small message">
                        <i class="icon error"></i>
                        Usuario o contraseña incorrecto
                    </div>
                <?php  endif; ?>

            </article>
        </section>
    </div>

<?php
if(empty($data)){
    $data = array("title"=>"");
}
//$this->load->view("templetes/footer",$data);
?>