<?php
/*
Template Name: Agregar Leads
*/
$mensaje = ''; // Mensaje para mostrar al usuario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = sanitize_text_field($_POST['nombre']);
    $apellido = sanitize_text_field($_POST['apellido']);
    $celular = sanitize_text_field($_POST['celular']);
    $correo = sanitize_email($_POST['correo']);
    $documento = sanitize_text_field($_POST['documento']);
    $mensaje = sanitize_text_field($_POST['mensaje']);
    
    // Validación de campos (agrega tu lógica de validación aquí)
    if (empty($nombre) || empty($apellido) || empty($celular) || empty($correo) || empty($documento)) {
        $mensaje = 'Por favor, completar todos los campos.';
    } else {
        // Crear un nuevo Custom Post Type "Leads"
        $nuevo_contacto = array(
            'post_title' => $nombre . ' ' . $apellido,
            'post_type' => 'leads',
            'post_status' => 'publish'
        );
        $contacto_id = wp_insert_post($nuevo_contacto);
        
        // Asignar los valores de los campos personalizados
        update_post_meta($contacto_id, 'nombre', $nombre);
        update_post_meta($contacto_id, 'apellido', $apellido);
        update_post_meta($contacto_id, 'celular', $celular);
        update_post_meta($contacto_id, 'correo', $correo);
        update_post_meta($contacto_id, 'documento', $documento);
        update_post_meta($contacto_id, 'mensaje', $mensaje);
        
        // Mostrar mensaje de confirmación
        $mensaje = '¡Registro agregado con éxito!';
    }
}
?>
<!-- Header -->
<?php get_header();?>
<div class="container-fluid portada d-flex flex-colum justify-content-center align-items-center flex-direction-column">
        <div class="text-center">
            <h1 class="display-4">Lorem ipsum dolor sit </h1>
        </div>
        
    </div> 

<div class="jumbotron">
    <h1 class="display-4"><center>Formulario de registro</center></h1>
    <hr class="my-4">
    <div class="container my-5">
        <form method="post"> 
            <div class="form-group">
                <!-- Mostrar mensaje de confirmación o error -->
                <?php if ($mensaje) : ?>
                    <div  role="alert" class="alert alert-<?php echo ($contacto_id ? 'success' : 'danger'); ?>">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">Nombre</label>
                    <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="nombre">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellido">Apellido</label>
                    <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" name="apellido">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">Documento de identidad</label>
                    <input type="number" class="form-control" id="inputDocumento" placeholder="No. de identidad" name="documento">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellido">Teléfono</label>
                    <input type="number" class="form-control" id="inputTelefono" placeholder="311..." name="celular">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="ejemplo@hotmail.com" name="correo">
            </div>
            <div class="form-group">
                <label for="inputEmail">Mensaje</label>
                <textarea name="mensaje" placeholder="Descripción" class="form-control"></textarea>
            </div>
            
        
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Agregar </button>
            </div>
        </form>
    </div>
    
</div>



<!-- footer -->
<?php get_footer();?>
