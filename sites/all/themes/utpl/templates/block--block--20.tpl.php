<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 #$urlrss = 'http://'.$_SERVER['SERVER_NAME'].'/novedades.xml';
 $urlrss = 'https://investigacion.utpl.edu.ec/novedades.xml';

$rss = simplexml_load_string(file_get_contents($urlrss));
?>

<div id="x_novedades_123">

    <!--Novedades consumido del RSS -->
    <div class="noticias padding5 layout-1">
        <section class="blocks">
            <div class="content">
                <div class="noticias-section">
                    <div class="center-title">
                        <h2 class="font-size-title"><strong>Novedades</strong></h2>
                        <p class="rtecenter">Conoce nuestros resultados de investigación</p>
                    </div>
                    <div id="items-container" class="wrapper-noticias flex-nowrap-auto">
                        <?php $cont=1; ?>
                        <?php foreach ($rss->channel->item as $k => $value): ?>
                        <?php if (stripos($value->author, $acronym) !== false and $cont <= 4): ?>
                        <div id="item-<?= $cont ?>" class="">
                            <article id="rssnoticias">
                                <img src="<?= $value->enclosure->attributes()->url; ?>" class="img-cover-novedades">
                                <div class="rss-contenido">
                                    <h3><?= $value->title; ?></h3>
                                    <?php print substr($value->description, 0, 150); ?>...
                                </div>
                                <div class="rss-enlace">
                                    <?= $value->link; ?>
                                </div>
                            </article>
                        </div>
                        <?php $cont++; ?>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="overflow-blur"></div>
                </div>
                <br>
            </div>
        </section>
        <div class="field field-name-field-enlace-bg field-type-link-field field-label-hidden boton layout-1">
            <div class="field-items">
                <div>
                    <a style="background-color: #eaab00;padding:10px 5px;" href="/novedades/<?= $acronym ?>">Ver todas</a>
                </div>
            </div>
        </div> 
    </div>
</div>
