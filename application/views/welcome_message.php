<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Curso Ing Soft</title>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

	
</head>
<body>

<div id="container">
	<h1>Bienvenido a Codeigniter</h1>

	<form id="login">

		<div class="form-group">

			<input type="text" class="form-control" id="inputUsuario" placeholder="Usuario">

		</div>

		<div class="form-group">

			<input type="password" class="form-control" id="inputContraseña" placeholder="Contraseña">

		</div>	

		<button type="sumbit" class="btn btn-primary">Login</button>

	</form>
</div>	


</body>
</html>

<script>
	
$(document) .ready(function (){

	$('#login') .sumbit(
        function (event) {
        	event.preventDefault();
        	$.ajax({
        		url:<?= base_url('login/')?>,
        		type:"post",
        		data: $('#login').serialize(),
        		success: function (resp) {
        			alert(resp);
        		}
        	});	
        }    
	);
});


</script>