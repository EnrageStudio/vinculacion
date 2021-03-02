<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];

 $q = 'https://sica.utpl.edu.ec/rest/observatorios/related/'.$acronym;
 $related = json_decode(file_get_contents($q), true)['data'];
?>
<!-- /.block -->
<div id="block-block-16" class="block block-block noticias padding3  layout-1 flecha-azul">


  <section class="blocks" id="noticias">
      <div class="content">
        <div class="noticias-section">
          <h2><strong>Información</strong> relacionada </h2>
          <h1><?php print $acronym; ?></h1>
          <div>
            <ul id="noticiasrss" class="pagination"><li class="page-item prev"><a href="#" class="page-link">&lt;</a></li><li class="page-item next"><a href="#" class="page-link">&gt;</a></li></ul>
          </div>
          <div class="wrapper-noticias">
            <?php foreach ($related as $k => $value): ?>
              <div class="item noticias<?= $k+1 ?>" style="display: block !important;">
                <article id="rssnoticias">
                    <img src="<?= $value['image'] ?>">  
                    <div class="rss-contenido">
                        <h3><?= $value['title'] ?></h3>
                        <p><?= $value['description'] ?></p>
                        <div class="rss-date">[ tipo: <strong><?= $value['type'] ?> </strong>]</div>
                    </div>
                    <div class="rss-enlace">
                      <?php print '<a target="_blank" href="'.$value['link'].'">Ver más</a>'; ?>
                    </div>
                </article>
              </div>
              <?php endforeach ?>
          </div>
        </div>
        <br>
      </div>
    </section>
</div>

<link href="https://investigacion.utpl.edu.ec/sites/all/modules/flexslider/assets/css/flexslider_img.css" rel="stylesheet" type="text/css">
<link href="https://investigacion.utpl.edu.ec/sites/all/libraries/flexslider/flexslider.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://investigacion.utpl.edu.ec/sites/all/libraries/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="https://investigacion.utpl.edu.ec/sites/all/themes/utpl/js/flexslider-min.js"></script>

