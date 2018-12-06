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
				<div class="form-group" style="text-align:center;" >
					<label for="Nombre_estudio">Pon nombre a tu cuestionario</label>
                    <input type="text" class="form-control" id="Nombre_cuestionario" name="Nombre_cuestionario" placeholder="Nombre del cuestionario">
				</div>


			<div class = "form-group">
       			<select class="form-control">
           	 		<?php 
						foreach ($Nombre_estudio as $row) {
							echo '<option value="' . $row->id_estudio . '">' . $row->Nombre_estudio . '</option>';
						}
					?>
            	</select>
			</div>









				
				<div class="form-group" id = "boton">
					<input type="submit" class="btn btn-default" value="Crea un cuestionario">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->