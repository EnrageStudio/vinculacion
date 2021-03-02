<?php

$var = drupal_get_path_alias(current_path());
$acronym = explode("/",$var)[0];
$q = 'https://sica.utpl.edu.ec/api/persons/indicators/?token=GDWgY4xyaKQ5hxFe&person='.$acronym;
$ind = json_decode(file_get_contents($q), true)['data'];

?>
<div id="block-bean-utplnumeros" class="block block-bean padding4 white-title center-title white-text enlaces-icon estadisticas col4 top">
  
<section class="blocks" id="utplnumeros" style="background-image: url('https://www.utpl.edu.ec/sites/default/files/background-estadisticas_1.jpg')">
    <h2>utplnumeros</h2>
    <div class="content">
        <div class="entity entity-bean bean-contenido-con-bloque-de-imagenes clearfix" about="/es/block/utplnumeros" typeof="">

            <div class="content">
                <div class="field field-name-field-imagen-img field-type-image field-label-hidden imagen-bg">
                    <div class="field-items">
                        <div class="field-item even"></div>
                    </div>
                </div>
                <div class="field field-name-field-titulo-del-bloque-img field-type-text-long field-label-hidden title-bg layout-1">
                    <div class="field-items">
                        <div class="field-item even">
                            <h2 class="rtecenter">Mi <strong>investigación</strong> en números</h2>
                            <p class="rtecenter">UTPL, un entorno dinámico e inspirador para <strong>investigar, innovar y emprender</strong></p>
                            <p class="rtecenter">&nbsp;</p>
                            <p class="rtecenter">&nbsp;</p>
                        </div>
                    </div>
                </div>
                <div class="field-collection-container clearfix">
                    <div class="field field-name-field-cuerpo-img field-type-field-collection field-label-hidden contenido-bg  layout-1 flexb relative-position">
                        <div class="field-items">
                            <div class="field-item even">
                                <div class="field-collection-view clearfix view-mode-full">
                                    <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix" about="/es/field-collection/field-cuerpo-img/59" typeof="">
                                        <div class="content">
                                            <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                                <div class="field-items">
                                                    <div class="field-item even"><img typeof="foaf:Image" src="https://www.utpl.edu.ec/sites/default/files/icon2.png" width="100" height="100" alt=""></div>
                                                </div>
                                            </div>
                                            <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                                <div class="field-items">
                                                    <div class="field-item even">
                                                        <h1 class="rtecenter"><strong style="color:#fff;"><?= intval($ind['articles'])+intval($ind['books']); ?></strong></h1>
                                                        <p class="rtecenter">Artículos y Libros científicos, regionales y de divulgación&nbsp;</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-item odd">
                                <div class="field-collection-view clearfix view-mode-full">
                                    <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix" about="/es/field-collection/field-cuerpo-img/60" typeof="">
                                        <div class="content">
                                            <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                                <div class="field-items">
                                                    <div class="field-item even"><img typeof="foaf:Image" src="https://www.utpl.edu.ec/sites/default/files/icon4.png" width="100" height="100" alt=""></div>
                                                </div>
                                            </div>
                                            <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                                <div class="field-items">
                                                    <div class="field-item even">
                                                        <div class="field-item even">
                                                            <h1 class="rtecenter"><strong style="color:#fff;"><?= $ind['projects'];?></strong></h1>
                                                            <p class="rtecenter">Proyectos de investigación, innovación, vinculación y consultorías&nbsp;</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="field-item odd">
                                <div class="field-collection-view clearfix view-mode-full field-collection-view-final">
                                    <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix" about="/es/field-collection/field-cuerpo-img/62" typeof="">
                                        <div class="content">
                                            <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                                <div class="field-items">
                                                    <div class="field-item even"><img typeof="foaf:Image" src="https://investigacion.utpl.edu.ec/sites/default/files/2018/icono-com-1.png" width="100" height="100" alt=""></div>
                                                </div>
                                            </div>
                                            <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                                <div class="field-items">
                                                    <div class="field-item even">
                                                        <h1 class="rtecenter"><strong style="color:#fff;"><?= $ind['groups'];?></strong></h1>
                                                        <p class="rtecenter">Grupos de investigación</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field field-name-field-enlace-img field-type-link-field field-label-hidden boton layout-1">
                    <div class="field-items">
                        <div class="field-item even"><a href="https://investigacion.utpl.edu.ec/">Investiga, Innova, Emprende</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
