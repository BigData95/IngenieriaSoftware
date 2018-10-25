<?= form_open("/login/recibirdatos") ?>
<?php

     $usuario = array(
     	'name' => 'usuario',
     	'placeholder' => 'Escribe tu usuario'
     );
     $contraseña = array(
     	'name' => 'contraseña',
     	'placeholder' => 'escribe tu contra'
     );

?>
<?= form_label('username: ', 'usuario') ?>
<?= form_input($usuario) ?>
<br>
<?= form_label('password: ', 'contraseña') ?>
<?= form_input($contraseña) ?>
<br>
<?= form_submit('','registrarse') ?>
<?= form_close() ?>
</body>
</html>