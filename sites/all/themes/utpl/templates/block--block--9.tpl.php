<?php


$var = drupal_get_path_alias(current_path());
$acronym = explode("/",$var)[0];
$q = 'https://sica.utpl.edu.ec/api/persons/'.$acronym.'?token=GDWgY4xyaKQ5hxFe';
$data = json_decode(file_get_contents($q), true);
?>

<?php 
$ws_authnames = 'https://sica.utpl.edu.ec/api/authnames/?token=GDWgY4xyaKQ5hxFe&filters&person='.$acronym;
$ws_response_authnames = json_decode(file_get_contents($ws_authnames), true);
$authnames = $ws_response_authnames['data'];
?>

<?php 
 $ws_charges = 'https://sica.utpl.edu.ec/api/persons/charges/?token=GDWgY4xyaKQ5hxFe&person='.$acronym;
 $ws_response_charges = json_decode(file_get_contents($ws_charges), true);
 $charges = $ws_response_charges['data'];
?>

<?php 
 $ws_groups = 'https://sica.utpl.edu.ec/api/groups/?token=GDWgY4xyaKQ5hxFe&filters&person='.$acronym;
 $ws_response_groups = json_decode(file_get_contents($ws_groups), true);
 $groups = $ws_response_groups['data'];
?>

<?php 
 $ws_observatories = 'https://sica.utpl.edu.ec/api/observatories/?token=GDWgY4xyaKQ5hxFe&filters&person='.$acronym;
 $ws_response_observatories = json_decode(file_get_contents($ws_observatories), true);
 $observatories = $ws_response_observatories['data'];
?>

<style>
	.info-table{
		width:100%;
		border-collapse: none;
	}

	.info-table td.heading {
		color:#737373;
		font-weight: 100;

	}

	#utplid{
		background-color: #003f72;color:#fff;
		padding: 2px;
	    font-weight: 700;
	}
</style>

<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?> >

<div class="bean-contenido-con-imagen-izquierda">
    <div class="content">

        <div class="equipo flex" style="width: 50%;">
            
            <div style="width: 100%;">
                <div style="width: 50%; float: left; padding: 5px;">
                    <div class="equipo-img" style="width: 75%;margin-right: auto; margin-left: auto;">
                    <?php 
                        print '<img src="'.$data['image'].'" alt="" style="height: 30%;border-radius: 50%;border: 2px solid #eaab00;">';
                     ?>
                    </div>
                    <br>
                     <address style="text-align: center;">
                        <?php print $data['firstName']; ?> <?php print $data['lastName']; ?><?php if ($data['academic']): ?>, <?= $data['academic'] ?> <?php endif ?> 
                        <br>
                        <?php print $data['type']; ?>
                        <br>
                        <a href="mailto:name@email.com">
                        <?php print $data['email']; ?>
                        </a>
                        <br>
                    </address>
                </div>
                <div style="width: 45%; float: left;">
                    <table class="info-table" style="border-collapse: inherit !important;">
                      <tr>
                        <td class="heading">Área:</td>
                      </tr>
                      <tr>
                        <td><a href="<?= $data['links']['area']; ?>"><?= $data['area']; ?></a></td>
                      <tr>
                        <td class="heading">Departamento:</td>
                      </tr>
                      <tr>
                        <td><a href="<?= $data['links']['department']; ?>"><?= $data['department']; ?></a></td>
                      </tr>
                      <tr>
                        <td class="heading">Sección:</td>
                      </tr>
                       <tr>
                        <td><a href="<?= $data['links']['section']; ?>"><?= $data['section']; ?></a></td>
                      </tr>
		                  <tr><td><br></td></tr>
                   <?php foreach ($charges as $cargo): ?>
                    <?php if ($cargo['status'] == 'vigente'): ?>
                      
                      <tr>
                        <td class="heading">Cargo:</td>
                      </tr>
                      <tr>
                        <td><?= $cargo['name']; ?></td>
                      </tr>
                      <tr>
                        <td class="heading">Área/Unidad/Departamento:</td>
                      </tr>
                      <tr>
                        <td><?= $cargo['area']; ?></td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                  <tr><td><br></td></tr>
                  <?php $historico = array(); ?>
                  <?php foreach ($charges as $cargo): ?>
                    <?php if ($cargo['status'] == 'historico'): ?>
                      <?php $historico[] = $cargo; ?>
                    <?php endif ?>
                  <?php endforeach ?>

                    </table> 
                    <br>
                     <?php if($groups): ?>
                    <?php foreach ($groups as $group): ?>
                    Grupo de Investigación <a href="<?= $group['link']; ?>"><?= $group['name']; ?></a><br>
                    <?php endforeach ?>
                    <?php endif ?>              
                    <br>
                    <?php if($observatories): ?>
                    <?php foreach ($observatories as $obs): ?>
                    <a href="<?= $obs['link']; ?>"><?= $obs['name']; ?></a><br>
                    <?php endforeach ?>
                    <?php endif ?>
                    <br>
                  <?php if ($historico): ?>
                    <span style="color:#737373;">Cargos:</span>
                    <br>
                    <?php foreach ($historico as $cargo): ?>
                       * <?= $cargo['name']; ?><?php if ($cargo['since']): ?>, desde <?= $cargo['since']; ?><?php endif ?><?php if ($cargo['until']): ?>, hasta <?= $cargo['until']; ?><?php endif ?>
                       <br>
                    <?php endforeach ?>
                  <?php endif ?>                                        
                    <br>
                    <strong style="color:#737373;padding:0px 0px 0px 2px;margin-bottom: 5px; border:1px solid #737373;">UTPL<span style="background-color: #737373;color:#fff;">iD</span></strong> :
                    <br> 
                    <br> 
                    <a href="<?= $var ?>"><?= $GLOBALS['base_url'].'/'.$acronym ?></a>

                </div>
            </div>
            <div>&nbsp;</div>

        </div>

        <div class="block-contenido" style="width: 45%;">
            <div class="block-contenido">
    
                <p style="text-align:justify;">
                <?php print $data['bio']; ?>
                </p>
                 <div class="float-nav" style="width: auto;">
                  <a href="#" class="menu-btn">
                    <ul>
                      <li class="line"></li>
                      <li class="line"></li>
                      <li class="line"></li>
                    </ul>
                    <div class="menu-txt">AuthID</div>
                  </a>
                </div>

                <div class="main-nav" style="width: auto;">
                  <ul>
                    <?php foreach ($authnames as $auth): ?>
                        <li class="social-item">
                            <?php if ($auth['source']=='scopus'): ?>
                                <?php print '<a target="_blank" href="https://www.scopus.com/authid/detail.uri?authorId='.$auth['authid'].'">Scopus ID: '.$auth['authid'].'</a>'; ?>
                            <?php endif ?>
                        </li>
                        <li class="social-item">
                            <?php if ($auth['source']=='orcid'): ?>
                                <?php print '<a rel="noopener noreferrer" style="vertical-align:top;" target="_blank" href="'.$auth['authid'].'"><img src="https://orcid.org/sites/default/files/images/orcid_16x16.png" style="width:1em;margin-right:.5em;" alt="ORCID iD icon">'.$auth['authid'].'</a>'; ?>
                            <?php endif ?>
                        </li>
                        <li class="social-item">
                            <?php if ($auth['source']=='scholar'): ?>
                                <?php print '<a target="_blank" href="'.$auth['authid'].'">Google Scholar</a>'; ?>
                            <?php endif ?>
                        </li>
                        <li class="social-item">
                            <?php if ($auth['source']=='researcherid'): ?>
                                <?php print '<a target="_blank" href="'.$auth['authid'].'">ResearcherID</a>'; ?>
                            <?php endif ?>
                        </li>
                        <li class="social-item">
                            <?php if ($auth['source']=='researchgate'): ?>
                                <?php print '<a target="_blank" href="'.$auth['authid'].'">ResearcherGate</a>'; ?>
                            <?php endif ?>
                        </li>
                        <li class="social-item">
                            <?php if ($auth['source']=='utpl'): ?>
                                <?php print '<a target="_blank" href="'.$auth['authid'].'">UTPLiD</a>'; ?>
                            <?php endif ?>
                        </li>
 
                    <?php endforeach ?>    

                  </ul>
                </div>

            </div>
        </div>
    </div>
</div>
	
<style>
.float-nav {
  position: fixed;
  bottom: 25px;
  right: 10px;
  z-index: 2;
}
.float-nav > a.menu-btn {
  text-decoration: none;
  display: block;
  background-color: #eaab00;
  color: white;
  padding: 23px 19px 12px 19px;
  text-align: center;
  box-shadow: 2px 2px 8px #777;
  /*border-radius: 300px;*/
}
.float-nav > a.menu-btn.active {
  transition: background-color 250ms linear;
  background-color: transparent;
  box-shadow: none;
}
.float-nav > a.menu-btn.active > ul > li.line:nth-child(1) {
  border-width: 2px;
  -moz-transform: rotate(45deg) translate(4px, 6px);
  -ms-transform: rotate(45deg) translate(4px, 6px);
  -webkit-transform: rotate(45deg) translate(4px, 6px);
  transform: rotate(45deg) translate(4px, 6px);
}
.float-nav > a.menu-btn.active > ul > li.line:nth-child(2) {
  visibility: hidden;
}
.float-nav > a.menu-btn.active > ul > li.line:nth-child(3) {
  border-width: 2px;
  -moz-transform: rotate(-45deg) translate(8px, -10px);
  -ms-transform: rotate(-45deg) translate(8px, -10px);
  -webkit-transform: rotate(-45deg) translate(8px, -10px);
  transform: rotate(-45deg) translate(8px, -10px);
}
.float-nav > a.menu-btn > ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
.float-nav > a.menu-btn > ul > li.line {
  border: 1px solid white;
  width: 100%;
  margin-bottom: 7px;
  -moz-transition-duration: 0.1s;
  -o-transition-duration: 0.1s;
  -webkit-transition-duration: 0.1s;
  transition-duration: 0.1s;
}
.float-nav > a.menu-btn > .menu-txt {
  width: 100%;
  text-align: center;
  font-size: 12px;
  font-family: sans-serif;
}

.main-nav {
  display: none;
  opacity: 0;
  font-family: sans-serif;
  position: fixed;
  bottom: 25px;
  right: 10px;
  transition: opacity 250ms;
}
.main-nav.active {
  display: block;
  opacity: 1;
  transition: opacity 250ms;
}
.main-nav > ul {
  width: 100%;
  display: block;
  list-style: none;
  margin: 0;
  padding: 0;
  background-color: #cc3333;
  box-shadow: 2px 2px 8px #777;
  border-radius: 3px 3px 33.5px 3px;
}
.main-nav > ul > li > a {
  text-decoration: none;
  display: block;
  font-weight: 200;
  padding: 18px 80px 18px 18px;
  color: white;
}
.main-nav > ul > li > a:hover {
  font-weight: 400;
}

.main-nav > ul > li > a[href*="scopus.com"] {
	background-color: #007398;
}
.main-nav > ul > li > a[href*="researcherid.com"] {
	background-color: #505050;
}
.main-nav > ul > li > a[href*="scholar.google.com"] {
	background-color: #cc3333;
}
.main-nav > ul > li > a[href*="researchgate.net"] {
	background-color: #0cb;
}
.main-nav > ul > li > a[href*="orcid.org"] {
	background-color: #60a115;
}
.main-nav > ul > li > a[href*="utpl.edu.ec"] {
	background-color: #003f72;
}
</style>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>

	$(function() {
		console.log(jQuery.fn.jquery);
		$('.float-nav').click(function(event) {
			event.preventDefault();
		  $('.main-nav, .menu-btn').toggleClass('active');
		});
	});
</script>
<br>
</div>

