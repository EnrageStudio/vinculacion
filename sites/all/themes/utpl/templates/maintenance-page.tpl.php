
<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<div id="wrapper">
  <header id="header" role="banner">
    <?php if ($logo): ?><div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div><?php endif; ?>
    <div id="site-description"><?php print $site_slogan; ?></div>
    <div class="clear"></div>
  </header>
  <div id="container">
  <div id="content">
    <section id="main" role="main" class="clearfix">
    <?php print $messages; ?>
    <a id="main-content"></a>
    <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
    <?php print $content; ?>
    </section> <!-- /#main -->
 </div>
 </div>
</div>
</body>
</html>
