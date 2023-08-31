<?php
/*
Template Name: Archivo de leads
*/
// header
get_header();

echo'<div class="container-fluid portada d-flex flex-colum justify-content-center align-items-center flex-direction-column">
    <div class="text-center">
        <h1 class="display-4">Lorem ipsum dolor sit </h1>
    </div>
    
</div> ';
    
// barra de busqueda
echo  '
<div class="container my-5">
    <nav class="navbar navbar-light bg-light">
        <div class="form-group">
            <h3 for="inputEmail">Lista de Leads</h3>
        </div>
        <form class="form-inline" method="post">
            <input class="form-control mr-sm-4" type="search" name="celular_busqueda" placeholder="Celular" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar lead</button>  
        </form>
        <button class="btn btn-outline-warning my-2 my-sm-0" id="refreshButton">Limpiar filtro</button>
        
    </nav>
</div>';






if (isset($_POST['celular_busqueda'])) {
    $celular_busqueda = sanitize_text_field($_POST['celular_busqueda']);
    
    // Consulta para buscar el número de celular en los leads
    $args = array(
        'post_type' => 'leads',
        'meta_query' => array(
            array(
                'key' => 'celular',
                'value' => $celular_busqueda,
                'compare' => '=',
            ),
        ),
    );
    
    $leads = new WP_Query($args);

    if ($leads->have_posts()) { 
        echo '<div class="container my-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>    
                            <th scope="col">Nombres y apellidos</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($leads->have_posts()) {
                        $leads->the_post();
                        echo '<tr>
                            <td><a href="'.get_permalink().'">' . get_the_title() . '</a></td>
                            <td>'.get_post_meta(get_the_ID(), 'documento', true).'</td>
                            <td>'.get_post_meta(get_the_ID(), 'celular', true).'</td>
                            <td>'.get_post_meta(get_the_ID(), 'correo', true).'</td>
                        </tr>';
                    }
                    echo '</tbody>
                </table>
            </div>';
    } else {
        echo '<div class="container my-5">
                <div class="alert alert-danger" role="alert">
                    No se encontraron resultados para el número de celular ingresado.
                </div>
            </div>';
    }

    wp_reset_postdata();
}else{
    $args2 = array(
        'post_type' => 'leads',
        'posts_per_page' => -1, // Mostrar todos los leads
    );
    $lead = new WP_Query($args2);
    if ($lead->have_posts()) {
        echo '<div class="container my-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>    
                            <th scope="col">Nombres y apellidos</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while ($lead->have_posts()) {
                            $lead->the_post();
                            echo '<tr>
                                <td><a href="'.get_permalink().'">' . get_the_title() . '</a></td>
                                <td>'.get_post_meta(get_the_ID(), 'documento', true).'</td>
                                <td>'.get_post_meta(get_the_ID(), 'celular', true).'</td>
                                <td>'.get_post_meta(get_the_ID(), 'correo', true).'</td>
                            </tr>';
                        }
                    echo '</tbody>
                </table>
            </div>';
    }

}



get_footer();
?>
<script>
  document.getElementById("refreshButton").addEventListener("click", function() {
    window.location.href = window.location.pathname; 
  });
</script>


