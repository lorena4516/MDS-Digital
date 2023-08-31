<?php 
// Registrar ubicación del menú
if (function_exists('register_nav_menus')) {
    register_nav_menus(array('superior' => 'Menú Superior'));
}

// Agregar clase a enlaces del menú
function clase_menu($atts, $item, $args) {
    $class = 'nav-link'; // Clase que deseas aplicar
    $atts['class'] = $class;
    return $atts;
}
add_filter('nav_menu_link_attributes', 'clase_menu', 10, 3);

// agrega las imagenes del sitio
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}



// Registrar el Custom Post Type "Contactos"
function registrar_custom_post_type_leads() {
    $labels = array(
        'name'               => 'Leads',
        'singular_name'      => 'Leads',
        'menu_name'          => 'Leads',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nuevo Leads',
        'edit_item'          => 'Editar Leads',
        'new_item'           => 'Nuevo Leads',
        'view_item'          => 'Ver Leads',
        'all_items'          => 'Todos los Leads',
        'search_items'       => 'Buscar Leads',
        'not_found'          => 'No se encontraron leads',
        'not_found_in_trash' => 'No se encontraron leads en la papelera',		
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'leads' ),
        'capability_type'     => 'post',
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'categories', 'tags' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
    );

    register_post_type( 'leads', $args );
}
add_action( 'init', 'registrar_custom_post_type_leads' );

flush_rewrite_rules();




?>