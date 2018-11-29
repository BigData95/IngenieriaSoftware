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
				<h1>Crea un nuevo estudio</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="Nombre_estudio">Nombre del estudio</label>
					<input type="text" class="form-control" id="Nombre_estudio" name="Nombre_estudio" placeholder="Tu nombre">
				</div>
				<div class="form-group">
					<label for="Descripcion_estudio">Descripcion del estudio</label>
					<textarea placeholder="Esto es una prueba" rows="4" cols="50" type="text" class="form-control" id="Descripcion_estudio" name="Descripcion_estudio" >Agrega una descripcion significativa</textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Registrarse">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->