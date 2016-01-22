<!DOCTYPE html>
<html>
	
	<head>
		
		<meta charset="UTF-8" />
		<title><?php echo $titulo ?></title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/estilos.css?'.time()) ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('css/960.css?'.time()) ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('css/reset.css?'.time()) ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('css/text.css?'.time()) ?>" type="text/css" media="screen" />
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/sics/funciones.js?'.time()) ?>"></script>
	</head>
	
<body>
<div class="container_12">
	<div class="grid_12" id="buscador_multipe">
		<h2>Buscador múltiples criterios</h2>
		<?php $atributos = array('class' => 'formulario') ?>
		<?php echo form_open('buscador',$atributos) ?>

			<?php echo form_label('A buscar') ?>
			<input type="text" name="descripcion" class="descripcion" id="descripcion" placeholder="Tus palabras clave" />
			
			<?php echo form_label('Sector') ?>	
			<select name="sector" class="sector" id="select">
				<option value="" selected="selected">Sector</option>
				<option value="Programación">Programación</option>
				<option value="Medicina">Medicina</option>
				<option value="Comerciales">Comerciales</option>
				<option value="Almacén">Almacén</option>
			</select>
			
			<!--este es nuestro autocompletado-->
			<input type="text" autocomplete="off" onpaste="return false" name="poblacion" 
			id="poblacion" class="poblacion" placeholder="Busca tu población" />
			
            <div class="muestra_poblaciones"></div>
				
			<?php echo form_submit('buscar','Buscar') ?>
			
		<?php echo form_close() ?>
		
	</div>	
			
	<?php //si hay resultados los mostramos

	if(is_array($resultados) && !is_null($resultados))
	{
	?>
	<div class="grid_12 resultados">
		<h2>Resultados</h2>
		<div class="grid_12" id="head_resultados">
			<div class="grid_2">Sector</div>	
			<div class="grid_2">Población</div>	
			<div class="grid_7">Descripción</div>
		</div>
			
		<div class="grid_12" id="body_resultados">
		<?php
		foreach($resultados as $fila)
		{
		?>
			
			<div class="grid_2"><?php echo $fila->sector ?></div>	
			<div class="grid_2"><?php echo $fila->poblacion ?></div>	
			<div class="grid_7"><?php echo $fila->descripcion ?></div>	
				
		<?php
		}
		?>
		</div>
	</div>
	<?php
	}
	?>	
</div>
</body>
</html>



