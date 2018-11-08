<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Registrarte</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="first_name">Nombre</label>
					<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Tu nombre">
				</div>
				<div class="form-group">
					<label for="last_name">Apellido</label>
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Tu apellido">
				</div>
				<div class="form-group">
					<label for="username">Nombre de usuario</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
					<p class="help-block">Al menos 4 caracteres, solamente letras o numeros</p>
				</div>
				<div class="form-group">
					<label for="email">Correo electrónico</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					<p class="help-block">Un correo valido: ejemplo@ejemplo.com</p>
				</div>
				<div class="form-group">
					<label for="password">Constraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Constraseña nueva">
					<p class="help-block">Al menos 6 caracteres</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirme contraseña</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirme contraseña">
					<p class="help-block">Tiene que coincidir</p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Registrarse">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->