<?php
  $var = drupal_get_path_alias(current_path());
  $acronym = explode("/",$var)[0];
 ?>

<div id="block-bean-utplnumeros" class="block block-bean padding4 white-title center-title white-text enlaces-icon estadisticas col4 top">

<style>
  .articulos{
    font-size: 11pt;
    padding: 0px 30px;
  }
</style>

<h3 class="title" style="color:#003f72; text-align:left; font-size: 26pt; padding: 0px 30px;">Artículos</h3>
<br><br>

<div style="width:96%; padding:1%; margin: 0px auto;">
<table id="datatable" style="width: 100%;">
  <thead>
    <tr>
      <th>año</th>
      <th>tipo</th>
      <th>documento</th>
    </tr>
  </thead>
  <tbody>
 <?php 
  $ws = 'https://sica.utpl.edu.ec/api/articles?token=GDWgY4xyaKQ5hxFe&filters&person='.$acronym;
  $objects = json_decode(file_get_contents($ws), true)['data'];
 ?>

   <?php foreach ($objects as $obj): ?>
    <tr>
      <td><?= $obj['year'] ?> </td>
      <td>artículo</td>
      <td style="text-align: left;">

        <p> 
          <?php if ($obj['link']): ?>
              <?php print '<a style="color:#003f72;" href="'.$obj['link'].'" target="_blank">'; ?>
            <?php else: ?>
              <?php print '<a style="color:#003f72;" href="'.'https://scholar.google.com/scholar?q='.urlencode($obj['title']).'" target="_blank">'; ?>
          <?php endif ?>

            <?= $obj['title'] ?> 

          </a>
          <br>
          <small style="font-size: 0.8em; color:#000;">
            <em>año:</em> <strong><?= $obj['year'] ?></strong> - <em>tipo:</em> <strong><?= $obj['type'] ?></strong>
            <?php if ($obj['link']): ?>
              <?php print ' - <a style="color:#0000ff;" href="'.$obj['link'].'" target="_blank">'.$obj['link'].'</a>'; ?>
            <?php endif ?>
             <?php print ' - <a style="color:#0000ff;" href="'.'https://scholar.google.com/scholar?q='.urlencode($obj['title']).'" target="_blank">Google Schoolar</a>'; ?>
              <a style="color:#0000ff;"  href="" class="view-more" id="<?= $obj['id']; ?>">- Ver abstract</a>
          </small>
        </p>
        <div>
          <div class="show-more-<?= $obj['id']; ?>" style="display: none;" ></div>
       </div>

      </td>
    </tr>
     <?php endforeach ?>

    <?php
      $ws = 'https://sica.utpl.edu.ec/api/books?token=GDWgY4xyaKQ5hxFe&filters&type=cientifico,divulgacion,libros_de_resumenes,libros_de_actas&start=0&pagination=10&person='.$acronym;
      $objects = json_decode(file_get_contents($ws), true)['data'];
     ?>
    <?php foreach ($objects as $obj): ?>
    <tr>
      <td><?= $obj['year'] ?> </td>
      <td>libro</td>
      <td style="text-align: left;">
        <p>
          <span style="color:#003f72;"><?= $obj['title'] ?></span>
          <br>
          <small style="color:#000;">
            <em>año:</em> <strong><?= $obj['year'] ?></strong> - <em>tipo:</em> <strong><?= $obj['type'] ?></strong> - <em>estado:</em> <strong><?= $obj['status'] ?></strong>
          </small>
        </p>

      </td>
    </tr>
     <?php endforeach ?>

  </tbody>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/datatables.min.js"></script>

<script>
$('#datatable').DataTable( {
    responsive: true,
    dom: 'Bfrtlip',
    buttons: [
        'copy','csv', 'excel','print'
    ],
    language: {
        url : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    },
    order: [[ 0, "desc" ]]
} );
</script> 

<script type="text/javascript">
$(document).ready(function(){
    $('.view-more').click(function(ev){
        ev.preventDefault();
        var id = $(this).attr('id');
        var WS = 'https://sica.utpl.edu.ec/api/articles/'+id+'?token=GDWgY4xyaKQ5hxFe';
        $('.show-more-'+id).toggle(
          function () {
            $.ajax({
                type:'GET',
                url:WS,
                dataType: 'jsonp',
                success:function(result){
                  console.log(result.abstract);
                  $('.show-more-'+id).html('<p><small style="color:#000;">'+result.abstract+'</small></p>');
                }
            });
        });

    });
});
</script>


</div>
