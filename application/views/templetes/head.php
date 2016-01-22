<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerencial <?php echo $title?></title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write(decodeURI('%3Cscript src="<?php echo ("/assets/js/jquery-2.1.4.min.js");?>"%3E%3C/script%3E'))</script>
    <link href="<?php echo ("/assets/css/semantic.min.css");?>" rel="stylesheet">
    <link href="<?php echo ("/assets/css/main.css");?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo ('/assets/js/semantic.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo ('/assets/js/jqx-all.js') ?>"></script>

    <link rel="icon" href="../assets/img/favicon.png">


    <?php
    if(isset($css)){
        for($i=0; $i<count($css);$i++){
            echo '<link href="'.  ("/assets/css/".$css[$i]) .'" rel="stylesheet">';
        }
    }
    ?>


</head>
<body>


<?php
    $this->load->view("/templetes/menu");
?>

<div class="pusher"><!-- start pusher-->

    <img class="ui centered image" src="<?php echo ("/assets/img/logos.png");?>">