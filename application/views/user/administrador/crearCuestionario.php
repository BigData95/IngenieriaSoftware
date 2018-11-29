<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    h1,#boton {
        text-align: center;
    }

</style>


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
				<h1>Crea un nuevo cuestionario</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group" >
					<label for="Nombre_estudio">Pregunta 1</label>
                    <input type="text" class="form-control" id="Nombre_estudio" name="Nombre_estudio" placeholder="Agrega una pregunta">
                    <label for="Nombre_estudio">Pregunta 2</label>
                    <input type="text" class="form-control" id="Nombre_estudio" name="Nombre_estudio" placeholder="Agrega una pregunta">
                    <label for="Nombre_estudio">Pregunta 3</label>
					<input type="text" class="form-control" id="Nombre_estudio" name="Nombre_estudio" placeholder="Agrega una pregunta">
				</div>
				
				<div class="form-group" id = "boton">
					<input type="submit" class="btn btn-default" value="Crea un cuestionario">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->