<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 $q = 'https://sica.utpl.edu.ec/api/laboratories/'.$acronym.'?token=GDWgY4xyaKQ5hxFe';
 $data = json_decode(file_get_contents($q), true);
?>

<div style="border-bottom:25px solid #003f72;" id="descripcion">
<h1 style="text-align:center;"> <?php print $data['name']; ?></h1>
<div class="bean-contenido-con-imagen-izquierda">
    <div class="content">

        <div>
            <img src="<?php print $data['equipo']; ?> ">
        </div>

        <div class="block-contenido" class="col-doc-45">
            <div class="block-contenido">
    
                <p style="text-align:justify;">
              
                <?= $data['description']; ?>
                </p>

            </div>
        </div>
    </div>
</div>

</div>
