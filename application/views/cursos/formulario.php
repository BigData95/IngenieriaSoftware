<?= form_open("/cursos/recibirdatos") ?>
<?php

     $nombre = array(
     	'name' => 'nombre',
     	'placeholder' => 'Escribe tu nombre'
     );
     $videos = array(
     	'name' => 'videos',
     	'placeholder' => 'cantidad videos del curso'
     );

?>
<?= form_label('Nombre: ', 'nombre') ?>
<?= form_input($nombre) ?>
<br>
<?= form_label('Numero Videos: ', 'videos') ?>
<?= form_input($videos) ?>
<br>
<?= form_submit('','Actualizar curso') ?>
<?= form_close() ?>
</body>
</html>