<?= form_open("/ingsoft/recibirdatos") ?>
<?php

     $usuario = array(
     	'name' => 'username',
     	'placeholder' => 'Escribe tu usuario'
     );
     $contra = array(
     	'name' => 'password',
     	'placeholder' => 'escribe tu contra'
     );

?>
<?= form_label('username: ', 'username') ?>
<?= form_input($usuario) ?>
<br>
<?= form_label('password: ', 'password') ?>
<?= form_input($contra) ?>
<br>
<?= form_submit('','registrarse') ?>
<?= form_close() ?>
</body>
</html>