<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 $q = 'https://sica.utpl.edu.ec/rest/groups/related/'.$acronym;
 $related = json_decode(file_get_contents($q), true)['data'];

?>

<div id="related">

    <div class="rtecenter center-title">
      <h2 class="section-title">Información <strong>relacionada</strong></h2>
    </div>
    <div class="noticias padding5 layout-1">
        <section class="blocks">
            <div class="content">
                <div class="noticias-section">
                    <div id="items-container" class="wrapper-noticias flex-nowrap-auto">

                        <?php foreach ($related as $k => $value): ?>
                         <div id="item-<?= $k+1 ?>" class="">
                            <article id="rssnoticias">
                                <img src="<?= $value['image']; ?>"
                                    class="img-cover-novedades">
                                <div class="rss-contenido">
                                    <h3><strong><?= $value['title']; ?></strong></h3>
                                    <?= substr($value['description'], 0, 150); ?>...
                                </div>
                                <div class="rss-enlace">
                                    <a href="<?= $value['link']; ?>">Ver más</a>                                    
                                </div>
                            </article>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="overflow-blur"></div>
                </div>
                <br>
            </div>
        </section>
    </div>

</div> <!-- /.block -->
