

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>

    <body>

        <style type="text/css">
            li{
                padding: 1em;

            }

            .active a{
                color:Red;
            }

        </style>

        <div>
            <ul id="noticiasrss" ></ul>
        </div>

        <div class="wrapper-noticias">

            <?php
            $articulos = simplexml_load_string(file_get_contents('https://noticias.utpl.edu.ec/rss'));
            $num_noticia = 1;
            $max_noticias = 10;

            $i = 1;
            $contadorid=1;

            foreach ($articulos->channel->item as $noticia) {
                if ($i <= 3) {
                    # code...
                    ?>
                    <?php echo $i; ?>
                    <div class="item noticias<?php echo $contadorid ?>" >
                        <article id="rssnoticias">
                            <?php $fecha = date("d/m/Y - H:i", strtotime($noticia->pubDate)); ?>
                            <h3><?php echo $noticia->title; ?></h3>
                            <div><?php echo $noticia->category; ?>   </div>
                            <div><?php echo $fecha; ?></div>  
                            <div><img src="<?php echo $noticia->enclosure->attributes()->url; ?>"></div>
                            <div> <?php echo $noticia->description; ?></div>
                            <h5><a target="_blank" href="<?php echo $noticia->link; ?>">Ver más</a></h5>
                        </article></div>
        <?php
        $num_noticia++;
        if ($num_noticia > $max_noticias) {
            break;
        }
    } else {
        $i = 0;
        $contadorid++;
    }
    $i++;
}
?>
        </div>



        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js'></script>

        <script type="text/javascript">
            $('#noticiasrss').twbsPagination({
                totalPages: 3,
                visiblePages: 3,
                next: '>',
                prev: '<',
                onPageClick: function (event, page) {
                    $(".item").hide();
                    $(".noticias" + page).show("fast");
                }
            });

        </script>
    </body>

</html>
