
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/botones.css">



<div class="container">
    <div class="header">
        <h1>Main de administrador</h1>
        <h2>Estudios</h2>
        <div class="form-group">
             <form method="" action="<?php echo base_url(); ?>User/verEstudios">
                <input type="submit" class="btnEstudios" value="Ver Estudios">
            </form>
            <form method="" action="<?php echo base_url(); ?>User/creacionEstudios">
                <input type="submit" class="btnEstudioNuevo" value="Crear Estudio"    > 
             </form>
        <div class="form-group">
            <input type='submit' class="btnUsuarioModificar"value = "Modificar Estudio">
            <input type='submit' class="btnEliminar"value = "Eliminar Estudio" >
        </div>

        
        <h2>Cuestionarios</h2>
        <div class="form-group">
            <input type="submit" class="btnUsuarios" value="Ver Cuestionario">
            <form method="" action="<?php echo base_url(); ?>User/creacionCuestionario">
            <input type='submit' class="btnUsuarioTipo"value = "Crear cuestionario">
            </form>
        </div>
        <div class ="form-group">
            <form method="" action="<?php echo base_url(); ?>User/agregaPregunta">
            <input type='submit' class="btnUsuarioTipo"value = "Agrega preguntas a cuestionario">
            </form>
        </div>
        
        <div class="form-group">
            <input type='submit' class="btnUsuarioModificar"value = "Modificar cuestionario">
            <input type='submit' class="btnEliminar"value = "Eliminar cuestionario" >
        </div>

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