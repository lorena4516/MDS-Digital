<?php
/*
Template Name: Detalle de Contacto
*/

get_header();


echo '
    <div class="container my-5">
';
if (have_posts()) {
    while (have_posts()) {
        the_post();
        echo '<h1>Información del contacto</h1>';
        echo '<p><strong>Nombre:</strong> ' . get_post_meta(get_the_ID(), 'nombre', true) . '</p>';
        echo '<p><strong>Apellido:</strong> ' . get_post_meta(get_the_ID(), 'apellido', true) . '</p>';
        echo '<p><strong>Celular:</strong> ' . get_post_meta(get_the_ID(), 'celular', true) . '</p>';
        echo '<p><strong>Correo electrónico:</strong> ' . get_post_meta(get_the_ID(), 'correo', true) . '</p>';
    }
}
echo '</div>';

get_footer();
?>
