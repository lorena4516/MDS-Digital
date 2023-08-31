<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php  bloginfo('template_url')?>/style.css">
    <title>Home!</title>
    <style>
        .portada{
            background: url("<?php bloginfo('template_url')?>/images/bg.jpg");
            background-size: cover;
            background-position: center;
            height: 400px;
            flex-direction: column;
        }
    </style>
  </head>
  <body>
    <!-- nav -->
    <div class="container-fluid bg-dark fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://th.bing.com/th/id/R.2e21f37e7ff68d9b8c67a0203dadc279?rik=sXgDNiFR9Ak7mg&riu=http%3a%2f%2fwww.laser-zentrum-marburg.de%2fwp-content%2fuploads%2fLZM-Logo-medium.png&ehk=oFAffn9QYQzI0juIt%2faEzk0GrFVchaaQ36mrwPYUgq4%3d&risl=&pid=ImgRaw&r=0" width="74" height="63" alt="">
        </a>
        <?php
           wp_nav_menu(array(
            'theme_location' => 'superior',
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'navbarNav',
            'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',
            'menu_class' => 'nav-item'
        ));
        
        ?>
        </nav>
    </div>
