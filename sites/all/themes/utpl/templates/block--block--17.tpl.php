<?php 
 $var = drupal_get_path_alias(current_path());
 $acronym = explode("/",$var)[1];

 $q = 'https://sica.utpl.edu.ec/rest/observatorio/ods/'.$acronym;
 $obs_ods = json_decode(file_get_contents($q), true)['data'];

 $qods = 'https://sica.utpl.edu.ec/rest/ods';
 $list_ods = json_decode(file_get_contents($qods), true)['data'];

?>
<div id="ods-relacionados" class="padding5" style="background: url('/sites/default/files/observatorios/bg-observatorios-2.png') no-repeat scroll;background-size: cover;">
    <div class="blocks layout-1">
        <div class="flex">
            <div class="field-descripcion-ods-relac" style="text-align:justify;">
                <p>
                    A través de su trabajo el observatorio aporta al cumplimiento
                    de las metas relacionadas a los ODS:
                    <ul>
                    <?php foreach ($obs_ods as $value): ?>
                      <?php foreach ($value['targets'] as $meta): ?>
                      <li><?= $meta['target']." " ?></li>
                      <?php endforeach ?>
                    <?php endforeach ?>
                    </ul>
                </p>
             </div>
            <div class="field-img-ods-relac">

                <div class=" layout-1 ">
                    <div class="field-items flex">
                        <?php foreach ($obs_ods as $value): ?>
                        <div class="field-item center-title breadcrumb">

                            <a href="<?= $value['link'] ?>">
                                <img src="<?= $value['image'] ?>" alt="">
                            </a>

                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div style="display: flex; justify-content: center;">
      <?php foreach ($list_ods as $goal): ?>
      <a href="<?= $goal['link'] ?>"><img alt="<?= $goal['goal']?>" src="<?= $goal['image']?>"></a>
      <?php endforeach ?>
  </div>
</div>
