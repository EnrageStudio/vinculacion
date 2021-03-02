<?php
 $path = drupal_get_path_alias(current_path());
 $acronym = explode("/", $path)[0];
 $item = explode("/", $path)[1];
 $q = 'https://sica.utpl.edu.ec/api/groups/'.$acronym.'?token=GDWgY4xyaKQ5hxFe';
 
 #$acronym = 'kbs';
 #$item = 'projects';
 #$q = 'https://sica.utpl.edu.ec/api/groups/kbs?token=GDWgY4xyaKQ5hxFe';
 
 $data = json_decode(file_get_contents($q), true);
?>

<div>
	<h1><?= $data['name'] ?></h1>	
	<?php if ($item == 'about'): ?>
	<div class="about clearfix">
		<h2>Acerca de</h2>
		<img src="<?= $data['image']; ?> " >
		<p><?php echo nl2br($data['description']);  ?></p>	
		<p></p>
	</div>
	<?php endif ?>

	<?php if ($item == 'documents'): ?>
		<h2>Documentos</h2>
		<?php 
			$q_articles = 'https://sica.utpl.edu.ec/api/articles?filters=true&group='.$acronym.'&token=GDWgY4xyaKQ5hxFe';
	 		$publicaciones = json_decode(file_get_contents($q_articles), true)['data'];
		 ?>
		<?php foreach ($publicaciones as $value): ?>
			<?php 
				$obj = 'https://sica.utpl.edu.ec/api/articles/'.$value['id'].'?token=GDWgY4xyaKQ5hxFe';
				$art = json_decode(file_get_contents($obj), true);
			?>
			<p>
			<?php print '<a target="_blank" href="'.$art['link'].'">'.$art['title'].'</a>'; ?>
			<?php print '<br>'.substr($art['abstract'],0,300).'...'; ?>
			<?php print '<br>'; ?>
			<?php print '<em>year:</em> '.$art['year'].'&nbsp;-'; ?>
			<?php print '<em>type:</em> '.$art['type'].'&nbsp;-'; ?>
			<?php print '<em>journal:</em> '.$art['journal'].'&nbsp;'; ?>
			<?php if ($art['doi']): ?>
			<?php print '- <em>DOI</em>: <a target="_blank" href="https://doi.org/'.$art['doi'].'">'.$art['doi'].'</a>&nbsp;'; ?>
			<?php endif ?>
			<?php print '- <em>Google Schoolar: </em><a target="_blank" href="https://scholar.google.com/scholar?q='.$art['title'].'">search</a>'; ?>
			<?php print "<br><br>"; ?>
			</p>	
		<?php endforeach ?>
	
	<?php endif ?>
	<?php if ($item == 'projects'): ?>
		<?php 
			$q_projects = 'https://sica.utpl.edu.ec/api/projects?filters=true&group='.$acronym.'&token=GDWgY4xyaKQ5hxFe';
	 		$projects = json_decode(file_get_contents($q_projects), true)['data'];
		 ?>
		<h2>Proyectos</h2>
		<?php foreach ($projects as $value): ?>
			<?php 
				$obj = 'https://sica.utpl.edu.ec/api/projects/'.$value['id'].'?token=GDWgY4xyaKQ5hxFe';
				$py = json_decode(file_get_contents($obj), true);
			?>
			<p>
			<?php print '<strong>'.$py['title'].'</strong>'; ?>
			<?php if ($py['description']): ?>
			<?php print '<br>'.substr($py['description'],0,300).'...'; ?>
			<?php endif ?>
			<?php print '<br>'; ?>
			<?php print '<em>year:</em> '.$py['year'].'&nbsp;-'; ?>
			<?php print '<em>type:</em> '.$py['type'].'&nbsp;-'; ?>
			<?php print '<em>status:</em> '.$py['status'].'&nbsp;-'; ?>
			<?php print '<em>scope:</em> '.$py['scope'].'&nbsp;'; ?>
			</p>	
		<?php endforeach ?>
		
	<?php endif ?>
</div> 

