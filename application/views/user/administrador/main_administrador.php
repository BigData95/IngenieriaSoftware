
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/botones.css">



<div class="container">
    <div class="header">
        <h1>Main de administrador</h1>
        <h2>Estudios</h2>
        <div class="form-group">
            <input type="submit" class="btnEstudios" value="Ver Estudios">
            <input type="submit" class="btnEstudioNuevo" value="Crea nuevo Estudio" >
        </div>
        <div class="form-group">
            <input type="submit" class="btnEstudioModificado" value="Modificar Estudio" > 
            <input type="submit" class="btnEliminar" value="Eliminar estudio" > 
        </div>
        <h2>Usuarios</h2>
        <div class="form-group">
         <input type="submit" class="btnUsuarios" value="Lista Usuarios">
         <input type='submit' class="btnUsuarioTipo"value = "Dar privilegios usuario">
        </div>
        <div class="form-group">
         <input type='submit' class="btnUsuarioModificar"value = "Modificar usuario">
         <input type='submit' class="btnEliminar"value = "Eliminar usuario" >
        </div>

    </div> <!-- End header  -->
</div> <!-- End container -->