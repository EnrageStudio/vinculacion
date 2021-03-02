<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
?>

<div id="boletines">

    <!--Novedades consumido del RSS -->
    <div class="noticias padding5  layout-1">
        <section class="blocks">
            <div class="content">
                <div class="noticias-section">
                    <div class="center-title">
                        <h2 class="font-size-title"><strong>Boletines</strong></h2>
                        <p class="rtecenter">Conoce nuestros resultados de investigación</p>
                    </div>
                    <div id="items-container" class="wrapper-noticias flex-nowrap-auto">

                        <?php  
                            //$urlrss = 'http://data.utpl.edu.ec/inves/boletines.xml';
                            $urlrss = 'http://'.$_SERVER['SERVER_NAME'].'/boletines.xml';
                          
                            if (@file_get_contents($urlrss)){
                                $rssnovedades = simplexml_load_string(file_get_contents($urlrss));
                                $x=1;
                                foreach ($rssnovedades->channel->item as $noticia){  
                                    // Filtra por observatorio el RSS
                                    if(stripos($noticia->author, $acronym) !== false and $x <= 4){
                        ?>

                        <div id="item-<?php print $x ?>" class="" style="display: block !important;">
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
