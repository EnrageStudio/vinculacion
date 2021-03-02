<?php

 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 $q = 'https://sica.utpl.edu.ec/api/groups/'.$acronym.'?token=GDWgY4xyaKQ5hxFe';
 $data = json_decode(file_get_contents($q), true);

?>
<div id="" >
    <h1 class="page-title"><?php print $data['name']; ?></h1>
        <div class="bean-contenido-con-imagen-izquierda">
            <div class="content">
                <div>
                        <img src="<?php print $data['image']; ?>">
                </div>
                <div class="block-contenido">
                    <div>
                        <h2><strong>Sobre</strong> nosotros</h2>
                        <p style="text-align: justify;"> 
                            <?php 
                                $descrip = substr ($data['description'],0,400); 
                                print $descrip;
                				if (strlen($data['description'])>400){
                					print '....';
                				}
                            ?>
                       </p>
                      <div class="field field-name-field-enlace-bg field-type-link-field field-label-hidden boton">
                        <div class="field-items">
                            <div class="field-item even flecha-azul">
                                <?php print '<a href="https://investigacion.utpl.edu.ec/'.$acronym.'/about'.'">Conoce más</a>'; ?>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
</div> <!-- /.block -->

