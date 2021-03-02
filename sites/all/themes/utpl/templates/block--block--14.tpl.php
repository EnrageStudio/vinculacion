<?php
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];
 $q = 'https://sica.utpl.edu.ec/api/observatories/'.$acronym.'?token=GDWgY4xyaKQ5hxFe';
 $data = json_decode(file_get_contents($q), true);

function printIDinvest($source, $link ,$id, $title){
        if($source == $id){
            print '<a href="'.$link.'" target="_blank" >'.$title.' </a>';
        }
    }

?>

<div style="border-top: 25px solid #003f72;border-bottom:25px solid #003f72;padding: 15px 0px;" id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?> >
    
<div class="node-type-contenido-para-observatorios"> 
<div class="contactos">
<div id="equipo" class="padding5">
    <!-- Equipo -->
    <div class="blocks">
        <div class="center-title">

            <div class="field-collection-container clearfix">
                <div
                    class="field field-name-field-contacto field-type-field-collection field-label-hidden flexb layout-1 contactos">

                    <div class="field-items">
                        <h2 class="rtecenter w-100"><strong>Equipo</strong></h2>
                        <?php 
                            foreach ($data['members'] as $obj): 

                                if($obj['role']!="responsable"):
                        ?>
                        <div class="field-item center-title breadcrumb">
                            <p class="rtecenter">
                                <img src="<?= $obj['image'] ?>" alt="" class="img-border">
                            </p>
                            <p class="rtecenter">
                                <a href="/<?= explode('@',$obj['email'])[0];?>">
                                    <strong><?= $obj['firstName'] ?></strong><br><?= $obj['lastName'] ?>
                                </a>
                                <br>
                                <a href="mailto:<?= $obj['email'] ?>">
                                    <small><?= $obj['email'] ?></small>
                                </a>
                                <p class="rtecenter">

                                    <?php
                                        print ('<a href="https://investigacion.utpl.edu.ec/'.explode('@',$obj['email'])[0].'"><img src="/sites/default/files/observatorios/icon-utpl.png" alt="" class="img-idInvestigador"> </a>');
                                        $qauths = 'https://sica.utpl.edu.ec/api/authnames/?token=GDWgY4xyaKQ5hxFe&filters=true&person='.$obj['identifier'];
	    				$authnames = json_decode(file_get_contents($qauths), true)['data'];  
                                                    
                                        foreach ($authnames as $auth) {
                                            if ($auth['source'] == 'scopus'){
                                                print '<a href="https://www.scopus.com/authid/detail.uri?authorId='.$auth['authid'].'" target="_blank"><img src="/sites/default/files/observatorios/icon-scopus.png" alt="" class="img-idInvestigador"> </a>';
                                            }
                                            printIDinvest($auth['source'], $auth['authid'] ,'scholar', '<img src="/sites/default/files/observatorios/icon-google.png" alt="" class="img-idInvestigador">');
                                            printIDinvest($auth['source'], $auth['authid'] ,'researchgate', '<img src="/sites/default/files/observatorios/icon-reserch.png" alt="" class="img-idInvestigador">');
                                            printIDinvest($auth['source'], $auth['authid'] ,'orcid', '<img src="/sites/default/files/observatorios/icon-orcid.png" alt="" class="img-idInvestigador">');
                                            printIDinvest($auth['source'], $auth['authid'] ,'researcherid', '<img src="/sites/default/files/observatorios/icon-researcher-id.jpg" alt="" class="img-idInvestigador">');
                                    
                                        
                                            }
                                            
                                    ?>
                                </p>
                            </p>
                        </div>
                        <?php elseif ($obj['role']=="responsable"): 
                            $objResponsable = $obj;

                        ?>
                        <?php endif ?>
                        <?php endforeach ?>

                        <div class="block-coordinador" style=" width: 100%;">

                            <h2 class="rtecenter"><strong>Coordinador</strong></h2>
                            <div class="field-item center-title breadcrumb">
                                <p class="rtecenter">
                                    <img src="<?= $objResponsable['image'] ?>" alt="" class="img-border">
                                </p>
                                <p class="rtecenter">
                                    <a href="/<?= explode('@',$objResponsable['email'])[0];?>">
                                        <strong><?= $objResponsable['firstName'] ?></strong><br><?= $objResponsable['lastName'] ?>
                                    </a>
                                    <br>
                                    <a href="mailto:<?= $obj['email'] ?>">
                                        <small><?= $objResponsable['email'] ?></small>
                                    </a>
                                    <p class="rtecenter">
                                        <?php
                                                print ('<a href="https://investigacion.utpl.edu.ec/'.explode('@',$objResponsable['email'])[0].'"><img src="/sites/default/files/observatorios/icon-utpl.png" alt="" class="img-idInvestigador"> </a>');
                                                $qauths = 'https://sica.utpl.edu.ec/api/authnames/?token=GDWgY4xyaKQ5hxFe&filters=true&person='.$objResponsable['identifier'];
                                                $authnames = json_decode(file_get_contents($qauths), true)['data'];    
                                                            
                                                foreach ($authnames as $auth) {
                                                    if ($auth['source'] == 'scopus'){
                                                        print '<a href="https://www.scopus.com/authid/detail.uri?authorId='.$auth['authid'].'" target="_blank"><img src="/sites/default/files/observatorios/icon-scopus.png" alt="" class="img-idInvestigador"> </a>';
                                                    }
                                                    printIDinvest($auth['source'], $auth['authid'] ,'scholar', '<img src="/sites/default/files/observatorios/icon-google.png" alt="" class="img-idInvestigador">');
                                                    printIDinvest($auth['source'], $auth['authid'] ,'researchgate', '<img src="/sites/default/files/observatorios/icon-reserch.png" alt="" class="img-idInvestigador">');
                                                    printIDinvest($auth['source'], $auth['authid'] ,'orcid', '<img src="/sites/default/files/observatorios/icon-orcid.png" alt="" class="img-idInvestigador">');
                                                    printIDinvest($auth['source'], $auth['authid'] ,'researcherid', '<img src="/sites/default/files/observatorios/icon-researcher-id.jpg" alt="" class="img-idInvestigador">');
                                                                                       
                                                    }
                                                    
                                            ?>
                                    </p>
                                </p>
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
