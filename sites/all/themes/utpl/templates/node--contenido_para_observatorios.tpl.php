<?php

    include_once("Service/url.php");

    /**
     * Extract Field observatorio id
     */

    $node = node_load($node->nid);
    $any_field = field_get_items('node', $node, 'field_observatorioid');
    $observatorioID =  $any_field[0]["value"];

    /**
     * Consulta
     */

    // URL Consulta Observatorio
    $respose = $urlObserv.$observatorioID.$tokenObserv;
    $resObserv = json_decode(file_get_contents($respose), true);
    $nameObserv = explode(' ', $resObserv['name'], 2);

    
    $respose = 'https://sica.utpl.edu.ec/rest/observatorios/related/'.$observatorioID;
    $resNewObserv = json_decode(file_get_contents($respose), true)['data'];

    $respose = $urlrelacODS.$observatorioID;
    $resRelacODS = json_decode(file_get_contents($respose), true)['data'];
    /**
     * Funciones
     */

    function printIDinvest($source, $link ,$id, $title){
        if($source == $id){
            print '<a href="'.$link.'" target="_blank" >'.$title.' </a>';
        }
    }
    
?>

<div class="carrusel blocks">
    <!--Portada del observatorio -->
    <div class="img-header-background">
        <!--Imagen de portada -->
        <img src="<?php print $resObserv['image']; ?> " alt="<?php print $resObserv['name']; ?>">
    </div>
    <!--Nombre del observatorio -->
    <div class="carrusel-contenido">
        <h1><?php print($nameObserv[0]); ?></h1>
    </div>
    <div class="carrusel-contenido">
        <h2><strong><?php print($nameObserv[1]); ?></strong></h2>
    </div>
</div>

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

                    <div><a href="/es#quienessomos" target="_top">Quienes Somos</a></div>
                    <div id="menu-novedad"><a href="/es#novedades" target="_top">Novedades</a></div>
                    <div><a href="/es#equipo" target="_top">Equipo de Trabajo</a></div>
                    <div><a href="/es#ods-relacionados" target="_top">Resultados</a></div>
                    <div><a href="/es#gestioninteligente" target="_top">Smartland</a></div>

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

<div id="quienessomos" class="content-observ">
    <!-- Noticias recuperadas del Servicio externo-->
    <div class=" layout-1 blocks">
        <div class="field-descripcion-quienessomos padding3">
            <div class="blocks">
                <!--Descripcion Observatorio-->
                <div>
                    <h2><strong><?php print $resObserv['description'] ?></strong></h2>
                </div>

            </div>
        </div>

        <div id="items-quienessomos" class="field-items flex flex-nowrap-auto hide-scroll">
            <?php 
           
                foreach ($resNewObserv as $k => $value): 

            ?>
            <div class="item-quienessomos flex">

                <div class="field-img-5">
                    <img src="<?php 
                    if(strlen($value['image'])!=0){
                        print $value['image'];
                    } else {
                        print'/sites/default/files/observatorios/img-observatorio-general.png';
                    }
                    ?>" class="img-quienessomos">
                </div>

                <div class="field-name-field-descripcionods flecha-azul">
                    <div class="rss-contenido">
                        <h2><?= substr($value['title'],0,100) ?></h2>
                        <p><?= substr($value['description'],0,250) ?>...</p>
                    </div>
                    <div class="rss-enlace boton">
                        <div class="field-item">
                            <?php print '<a target="_blank" href="'.$value['link'].'">Ver más</a>'; ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach ?>

        </div>
        <div class="position-nav">
            <ul class="pagination">
                <li class="page-item prev">
                    <a target="_top" class="page-link">&lt;</a>
                </li>

                <li class="page-item next">
                    <a target="_top" class="page-link">&gt;</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="novedades">

    <!--Novedades consumido del RSS -->
    <div class="noticias padding5  layout-1">
        <section class="blocks">
            <div class="content">
                <div class="noticias-section">
                    <div class="center-title">
                        <h2 class="font-size-title"><strong>Novedades</strong></h2>
                        <p class="rtecenter">Conoce nuestros resultados de investigación</p>
                    </div>
                    <div class="position-nav">
                        <ul class="pagination">
                            <li class="page-item prev">
                                <a class="page-link">&lt;</a>
                            </li>

                            <li class="page-item next">
                                <a class="page-link">&gt;</a>
                            </li>
                        </ul>
                    </div>
                    <div id="items-container" class="wrapper-noticias flex-nowrap-auto">

                        <?php  
                            //$urlrss = 'https://investigacion.utpl.edu.ec/novedades-observatorio.xml';
                            $urlrss = 'http://'.$_SERVER['SERVER_NAME'].'/novedades-observatorio.xml';
                          
                            if (@file_get_contents($urlrss)){
                                $rssnovedades = simplexml_load_string(file_get_contents($urlrss));
                                $x=1;
                                foreach ($rssnovedades->channel->item as $noticia){  
                                    // Filtra por observatorio el RSS 
                                    if($noticia->author==$observatorioID){
                        ?>

                        <div id="item-<?php print $x ?>" class="item">
                            <article id="rssnoticias">
                                <img src="<?php echo $noticia->enclosure->attributes()->url; ?>"
                                    class="img-cover-novedades">
                                <div class="rss-contenido">
                                    <h3><strong><?php print $noticia->title;?></strong></h3>
                                    <?php print substr($noticia->description, 0, 150); ?>...
                                </div>
                                <div class="rss-enlace">
                                    <?php print $noticia->link; ?>
                                </div>
                            </article>
                        </div>
                        <?php $x++; ?>

                        <?php } ?>
                        <?php } ?>
                        <?php }  ?>
                    </div>
                    <div class="overflow-blur"></div>
                </div>
                <br>
            </div>
        </section>
    </div>

</div>

<div id="equipo" class="padding5">
    <!-- Equipo -->
    <div class="blocks">
        <div class="center-title">

            <div class="field-collection-container clearfix">
                <div
                    class="field field-name-field-contacto field-type-field-collection field-label-hidden flexb layout-1 contactos">

                    <div class="field-items">
                        <h2 class="rtecenter w-100"><strong>Equipo</strong></h2>
                        <?php 
                            foreach ($resObserv['members'] as $obj): 

                                if($obj['role']!="responsable"):
                        ?>
                        <div class="field-item center-title breadcrumb">
                            <p class="rtecenter">
                                <img src="<?= $obj['image'] ?>" alt="" class="img-border">
                            </p>
                            <p class="rtecenter">
                                <a href="/<?= explode('@',$obj['email'])[0];?>">
                                    <strong><?= $obj['firstName'] ?></strong><br><?= $obj['lastName'] ?>
                                </a>
                                <br>
                                <a href="mailto:<?= $obj['email'] ?>">
                                    <small><?= $obj['email'] ?></small>
                                </a>
                                <p class="rtecenter">

                                    <?php
                                        print ('<a href="'.explode('@',$obj['email'])[0].'"><img src="/sites/default/files/observatorios/icon-utpl.png" alt="" class="img-idInvestigador"> </a>');
                                            
                                        $url=$urlIDinvest.$obj['identifier'];
                                        $authnames = json_decode(file_get_contents($url), true)['data'];                         
                                                    
                                        foreach ($authnames as $auth) {
                                            if ($auth['source'] == 'scopus'){
                                                print '<a href="https://www.scopus.com/authid/detail.uri?authorId='.$auth['authid'].'" target="_blank"><img src="/sites/default/files/observatorios/icon-scopus.png" alt="" class="img-idInvestigador"> </a>';
                                            }
                                            printIDinvest($auth['source'], $auth['authid'] ,'scholar', '<img src="/sites/default/files/observatorios/icon-google.png" alt="" class="img-idInvestigador">');
                                            printIDinvest($auth['source'], $auth['authid'] ,'researchgate', '<img src="/sites/default/files/observatorios/icon-reserch.png" alt="" class="img-idInvestigador">');
                                            printIDinvest($auth['source'], $auth['authid'] ,'orcid', '<img src="/sites/default/files/observatorios/icon-orcid.png" alt="" class="img-idInvestigador">');
                                            printIDinvest($auth['source'], $auth['authid'] ,'researcherid', '<img src="/sites/default/files/observatorios/icon-utpl.png" alt="" class="img-idInvestigador">');
                                    
                                        
                                            }
                                            
                                    ?>
                                </p>
                            </p>
                        </div>
                        <?php elseif ($obj['role']=="responsable"): 
                            $objResponsable = $obj;

                        ?>
                        <?php endif ?>
                        <?php endforeach ?>

                        <div class="block-coordinador" style=" width: 100%;">

                            <h2 class="rtecenter"><strong>Coordinador</strong></h2>
                            <div class="field-item center-title breadcrumb">
                                <p class="rtecenter">
                                    <img src="<?= $objResponsable['image'] ?>" alt="" class="img-border">
                                </p>
                                <p class="rtecenter">
                                    <a href="/<?= explode('@',$objResponsable['email'])[0];?>">
                                        <strong><?= $objResponsable['firstName'] ?></strong><br><?= $objResponsable['lastName'] ?>
                                    </a>
                                    <br>
                                    <a href="mailto:<?= $obj['email'] ?>">
                                        <small><?= $objResponsable['email'] ?></small>
                                    </a>
                                    <p class="rtecenter">
                                        <?php
                                                print ('<a href="'.explode('@',$objResponsable['email'])[0].'"><img src="/sites/default/files/observatorios/icon-utpl.png" alt="" class="img-idInvestigador"> </a>');
                                                    
                                                $url=$urlIDinvest.$objResponsable['identifier'];
                                                $authnames = json_decode(file_get_contents($url), true)['data'];                         
                                                            
                                                foreach ($authnames as $auth) {
                                                    if ($auth['source'] == 'scopus'){
                                                        print '<a href="https://www.scopus.com/authid/detail.uri?authorId='.$auth['authid'].'" target="_blank"><img src="/sites/default/files/observatorios/icon-scopus.png" alt="" class="img-idInvestigador"> </a>';
                                                    }
                                                    printIDinvest($auth['source'], $auth['authid'] ,'scholar', '<img src="/sites/default/files/observatorios/icon-google.png" alt="" class="img-idInvestigador">');
                                                    printIDinvest($auth['source'], $auth['authid'] ,'researchgate', '<img src="/sites/default/files/observatorios/icon-reserch.png" alt="" class="img-idInvestigador">');
                                                    printIDinvest($auth['source'], $auth['authid'] ,'orcid', '<img src="/sites/default/files/observatorios/icon-orcid.png" alt="" class="img-idInvestigador">');
                                                    printIDinvest($auth['source'], $auth['authid'] ,'researcherid', '<img src="/sites/default/files/observatorios/icon-utpl.png" alt="" class="img-idInvestigador">');
                                            
                                                
                                                    }
                                                    
                                            ?>
                                    </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="ods-relacionados" class="padding5">
    <div class="blocks layout-1">
        <div class="flex">
            <div class="field-descripcion-ods-relac">

                <p>
                    A través de su trabajo el <?php print($nameObserv[0]." ".$nameObserv[1]);?> aporta al cumplimiento
                    del
                    <?php foreach ($resRelacODS as $value): ?>
                    <?= $value['goal']." " ?>
                    <?php endforeach ?>
                </p>

            </div>
            <div class="field-img-ods-relac">

                <div class=" layout-1 ">
                    <div class="field-items flex">
                        <?php foreach ($resRelacODS as $value): ?>
                        <div class="field-item center-title breadcrumb">

                            <a href="<?= $value['link'] ?>">
                                <img src="<?= $value['image'] ?>" alt="">
                            </a>

                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>