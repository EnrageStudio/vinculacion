<?php 
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 $q = 'https://sica.utpl.edu.ec/api/observatories/'.$acronym.'?token=GDWgY4xyaKQ5hxFe';
 $data = json_decode(file_get_contents($q), true);
?>

<div class="carrusel blocks">
    <!--Portada del observatorio -->
    <div class="img-header-background" style="height: 35em;">
        <!--Imagen de portada -->
        <img src="<?= $data['image']; ?> " alt="<?= $data['name']; ?>">
    </div>
    <!--Nombre del observatorio -->
    <div class="carrusel-contenido">
        <h1><?php print($data['name']); ?></h1>
    </div>
</div>
<div class="node-type-contenido-para-observatorios">
<div class="content">
<div class="submenu">
    <!-- Submenu del contenido-->
    <div class="layout-1 flex">

        <div class="logo">
            <img src="/sites/all/themes/utpl/logo.png" alt="">
        </div>

        <nav class="sub-menu">
            <div class="title-menu">

                <a class="submenu-toggle flex " href="#sub-menu">
                    <p> IR A LA SECCIÓN </p>
                    <i class="material-icons">menu</i>
                </a>
            </div>

            <div class="nav-submenu navigation">
                <div class="field-items">

                    <div><a href="#quienes-somos" target="_top">Quienes Somos</a></div>
                    <div id="menu-novedad"><a href="#novedades" target="_top">Novedades</a></div>
                    <div id="menu-novedad"><a href="#boletines" target="_top">Boletines</a></div>
                    <div><a href="equipo" target="_top">Equipo de Trabajo</a></div>
                    <div><a href="#ods-relacionados" target="_top">Resultados</a></div>

                </div>
            </div>

        </nav>
        <div class="gototop">
            <a id="gototop" href="#">
                <i class="material-icons">keyboard_arrow_up</i>
            </a>
        </div>
    </div>
</div>
</div>
</div>