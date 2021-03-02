<?php
$acronym = drupal_get_title();
$q = 'https://sica.utpl.edu.ec/rest/groups/indicators/'.$acronym;
$data = json_decode(file_get_contents($q), true);
?>

    <div>
        <section style="background-image: url('https://www.utpl.edu.ec/sites/default/files/background-estadisticas_1.jpg');" class="col4 enlaces-icon datosgrupo padding3 " id="datosgrupo">
            <div class="rtecenter center-title">
                <p>&nbsp;</p>
                <h2 style="color:#fff;">Nuestros <strong>indicadores</strong></h2>
                <p class="rtecenter" style="color:#fff;">Investigar, innovar, <strong>emprender</strong></p>
                <p>&nbsp;</p>
            </div>

            <div class="field-collection-container clearfix">
                <div class="field field-name-field-cuerpo-img field-type-field-collection field-label-hidden contenido-bg  layout-1 flexb relative-position">
                    <div class="field-items">
                        <div class="field-item even">
                            <div class="field-collection-view clearfix view-mode-full">
                                <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix">
                                    <div class="content">
                                        <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                            <div class="field-items">
                                                <div class="field-item even"><img typeof="foaf:Image" src="https://www.utpl.edu.ec/sites/default/files/icon3.png" alt="" width="100" height="100"></div>
                                            </div>
                                        </div>
                                        <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                            <div class="field-items">
                                                <div class="field-item even">
                                                    <h1 class="rtecenter">
<?= '<a href="'.$acronym.'/documents'.'">'.'<strong style="color:#fff;">'.$data['articulos'].'</strong>'.'</a>'; ?>
                                                      <p class="rtecenter">Documentos</p>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field-item odd">
                            <div class="field-collection-view clearfix view-mode-full">
                                <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix">
                                    <div class="content">
                                        <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                            <div class="field-items">
                                                <div class="field-item even"><img typeof="foaf:Image" src="https://www.utpl.edu.ec/sites/default/files/icon2.png" alt="" width="100" height="100"></div>
                                            </div>
                                        </div>
                                        <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                            <div class="field-items">
                                                <div class="field-item even">
                                                    <h1 class="rtecenter">
                                                      <?= '<a href="/'.$acronym.'/project'.'">'.'<strong style="color:#fff;">'.$data['proyectos'].'</strong>'.'</a>'; ?>
                                                        <p class="rtecenter">Proyectos</p>
                                                   </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field-item even">
                            <div class="field-collection-view clearfix view-mode-full">
                                <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix">
                                    <div class="content">
                                        <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                            <div class="field-items">
                                                <div class="field-item even"><img typeof="foaf:Image" src="https://www.utpl.edu.ec/sites/default/files/icon1.png" alt="" width="100" height="100"></div>
                                            </div>
                                        </div>
                                        <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                            <div class="field-items">
                                                <div class="field-item even">
                                                    <h1 class="rtecenter">
                                                      <?= '<a href="/'.$acronym.'/projects'.'">'.'<strong style="color:#fff;">$ '.$data['fondos'].'</strong>'.'</a>'; ?>
                                                       <p class="rtecenter">Presupuesto de proyectos</p>
                                                     </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field-item odd">
                            <div class="field-collection-view clearfix view-mode-full field-collection-view-final">
                                <div class="entity entity-field-collection-item field-collection-item-field-cuerpo-img clearfix">
                                    <div class="content">
                                        <div class="field field-name-field-imagen-fondo field-type-image field-label-hidden imagen-fondo">
                                            <div class="field-items">
                                                <div class="field-item even"><img typeof="foaf:Image" src="https://www.utpl.edu.ec/sites/default/files/icon4.png" alt="" width="100" height="100"></div>
                                            </div>
                                        </div>
                                        <div class="field field-name-field-contenido field-type-text-long field-label-hidden imagen-contenido">
                                            <div class="field-items">
                                                <div class="field-item even">
                                                    <h1 class="rtecenter">
                                                      <?php 
                                                        print  '<strong style="color:#fff;">'.$data['iepi'].'</strong>';
                                                       ?>
                                                    <p class="rtecenter">Registros de propiedad intelectual</p>
                                                    </h1>
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
    </div>
    </div>
    </div>
    </section>

    <section class="blocks" id="infointeres">
        <div class="content">
            <div class="entity entity-bean bean-contenido-en-accordion clearfix">

                <div class="content">
                    <div class="field field-name-field-imagen-izquierda field-type-image field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even"></div>
                        </div>
                    </div>
                    <div class="contenido-acc">
                        <div class="field field-name-field-contenido-derecho field-type-text-long field-label-hidden layout-1 center-title">
                            <div class="field-items">
                                <div class="field-item even">
                                    <p class="rtecenter">&nbsp;</p>
                                    <h2 class="rtecenter">Información de <strong>interés</strong></h2>
                                    <p class="rtecenter">Conoce cada una de las investigaciones que se ha realizado en torno a publicaciones y proyectos.&nbsp;</p>
                                    <p class="rtecenter">&nbsp;</p>
                                </div>
                            </div>
                        </div>
                        <div class="field-collection-container clearfix">
                            <div class="field field-name-field-accordion field-type-field-collection field-label-hidden layout-1 contenido-accordeon flexb link2">
                                <div class="field-items">
                                    <div class="field-item even">
                                        <div class="field-collection-view clearfix view-mode-full">
                                            <div class="entity entity-field-collection-item field-collection-item-field-accordion clearfix">
                                                <div class="content">
                                                    <?= '<a class="accordion-title" href="/'.$acronym.'/documents'.'">'; ?>
                                                        <div class="field field-name-field-titulo field-type-text field-label-hidden">
                                                            <div class="field-items">
                                                                <div class="field-item even">Documentos</div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field-item even">
                                        <div class="field-collection-view clearfix view-mode-full">
                                            <div class="entity entity-field-collection-item field-collection-item-field-accordion clearfix">
                                                <div class="content">
                                                    <?= '<a class="accordion-title" href="/'.$acronym.'/projects'.'">'; ?>
                                                        <div class="field field-name-field-titulo field-type-text field-label-hidden">
                                                            <div class="field-items">
                                                                <div class="field-item even">Proyectos</div>
                                                            </div>
                                                        </div>
                                                        </a>
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
        </div>
        <br>
        <br>
    </section>
    <p>&nbsp</p>

    </div>
    <!-- /.block -->