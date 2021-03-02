<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 $q = 'https://sica.utpl.edu.ec/rest/observatorios/related/'.$acronym;
 $related = json_decode(file_get_contents($q), true)['data'];
?>
<!-- /.block -->
<div id="related">

    <!--Novedades consumido del RSS -->
    <div class="noticias padding5 layout-1">
        <section class="blocks">
            <div class="content">
                <div class="noticias-section">
                    <div class="center-title">
                        <h2 class="font-size-title"><strong>Información Relacionada</strong></h2>
                        <!--<p class="rtecenter">Conoce nuestros resultados de investigación</p> -->
                    </div>
                    <div id="items-container" class="wrapper-noticias flex-nowrap-auto">
                        <?php $cont = 1; ?>
                        <?php foreach ($related as $k => $value): ?>
                        <?php if ($value['type']!='institucion' and $cont <= 4): ?>
                        <div id="item-<?= $k+1 ?>" class="">
                            <article id="rssnoticias">
                                <img src="<?= $value['image'] ?>" class="img-cover-novedades">
                                <div class="rss-contenido">
                                    <h3><strong><?= $value['title'] ?></strong></h3>
                                    <p class="rtejustify">
                                        <?php print substr($value['description'], 0, 150); ?>...
                                    </p>
                                </div>
                                <div class="rss-enlace">
                                    <a href="<?php print $value['link'] ?>">Ver más</a>
                                </div>
                            </article>
                        </div>
                        <?php $cont++; ?>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="overflow-blur"></div>
                <br>
            </div>
        </section>
    </div>

</div>
