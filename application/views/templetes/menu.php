<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$_img = "" . $this->session->userdata("imagen");
//if(strlen($_img)<=0){
    $_img = "empty.jpg";
//}



?>


<div class="ui right vertical inverted sidebar labeled menu" id="menuSide">
    <a class="item" href="<?php echo site_url(""); ?>">
        <i class="home icon"></i>
        Página principal SINOS
    </a>

        <a class="item" href="<?php echo site_url("buscaBeneficiario/buscarBeneficiario") ?>">
            <i class="configure icon"></i>
            Buscar Beneficiario
        </a>
        <div class="item">
            <a class="header" href="<?php echo site_url("/ao/") ?>">
                Estadisticas
                <div class="menu">
                    <a class="item" href="<?php echo site_url('ao/ver/estadisticas')?>">Hoja Diaria</a>
                    <a class="item" href="<?php echo site_url('ao/ver/foliosap')?>">Suive</a>
                    <a class="item" href="<?php echo site_url('ao/ver/estadisticas')?>">SIS</a>
                    <a class="item" href="<?php echo site_url('ao/ver/foliosap')?>">Causes</a>
                    <a class="item" href="<?php echo site_url('ao/ver/foliosap')?>">Reporte Consumibles</a>
                </div>

            </a>
        </div>
        <div class="item">
            <a class="header" href="<?php echo site_url("/ao/") ?>">
                Consulta Segura
                <div class="menu">
                <a class="item" href="<?php echo site_url('ao/ver/estadisticas')?>">Listado de Meta</a>
                <a class="item" href="<?php echo site_url('ao/ver/foliosap')?>">Listado Realizado</a>
                <a class="item" href="<?php echo site_url('ao/ver/estadisticas')?>">Listado Faltante</a>
                <a class="item" href="<?php echo site_url('ao/ver/foliosap')?>">Insumos Medicos y Consumibles</a>
                <a class="item" href="<?php echo site_url('ao/ver/foliosap')?>">Avance</a>
            </div>
            </a>
        </div>
        <a class="item" href="<?php echo site_url("configuraciones") ?>">
            <i class="configure icon"></i>
            Sincronizacion
        </a>
        <a class="item" href="<?php echo site_url("configuraciones") ?>">
            <i class="configure icon"></i>
            Carga de Catalogos
        </a>
        <a class="item" href="<?php echo site_url("configuraciones") ?>">
            <i class="configure icon"></i>
            Respaldo de Base de datos
        </a>
        <a class="item" href="<?php echo  site_url(("welcome/logout"));?>">
            Cerrar sesión
            <i class="red power icon"></i>
        </a>
</div>

<div class="ui fixed top btnmenu">
    <button class="ui black icon button">Menú <i class="sidebar icon"></i></button>
</div>
