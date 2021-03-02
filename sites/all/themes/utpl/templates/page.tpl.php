

<div class="header-top " >
    <div class="layout-1 flex">
        <div class="flex top-menu">
            <div>
                <?php print render($page['header_top']); ?>
            </div>
            <div class="menu"> <a href="https://www.utpl.edu.ec/mail" target="_blank"><i class="material-icons">email</i></a> </div>
        </div>
        <div class="flex top-menu-right">
            <div class="flex items-social">
                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://www.facebook.com/Investiga-UTPL-1619123434981758/"> <img src="/sites/all/themes/utpl/images/icon-fb.png" alt="fb"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://www.facebook.com/Investiga-UTPL-1619123434981758/"> <img src="/sites/all/themes/utpl/images/icon-fb-over.png" alt="fb"/>  </a>
                    </div>
                </div>

                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://twitter.com/InvestigaUtpl"> <img src="/sites/all/themes/utpl/images/icon-tw.png" alt="tw"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://twitter.com/InvestigaUtpl"> <img src="/sites/all/themes/utpl/images/icon-tw-over.png" alt="tw"/>  </a>
                    </div>
                </div>


            </div>
            <?php print render($page['search_top']); ?>


        </div>

    </div>

</div>
<div class="header-wrapper">
    <div class="layout-1 flex">
        <header id="header">
            <?php if ($logo): ?><div id="logo"><a href="https://utpl.edu.ec"><img src="<?php print $logo; ?>"/></a></div>
            <?php endif; ?>
        </header>  
        <nav  class="main-menu " >
            <div class="title-menu"> 
                <a class="mainmenu-toggle " href="#">
                    <i class="material-icons">menu</i>
                </a>
            </div>
            <div class="nav-menu navigation flex">
                <?php print drupal_render($main_menu_tree); ?>

            </div>
        </nav>
    </div>
</div>

<div class="carrusel">
    <?php print render($page['carousel']); ?>
</div>


<div class="submenu">
    <div class="layout-1 flex">
        <div class="logo">
            <a href="<?php print $front_page; ?>"><img src="/sites/all/themes/utpl/logo.png"/></a>
        </div>
        <nav class="sub-menu">
            <div class="title-menu"> 
                <a class="submenu-toggle flex " href="#sub-menu">
                    <p> IR A LA SECCIÓN </p>
                    <i class="material-icons">menu</i>
                </a>
            </div>
            <div class="nav-submenu navigation">
                <?php print render($page['submenu']); ?>
            </div> 
        </nav>

        <div class="gototop">
            <a id="gototop" href="#">
                <i class="material-icons">keyboard_arrow_up</i>
            </a>
        </div>

    </div>
</div> 



<?php if (!drupal_is_front_page()) { ?> 

    <div id="container">
        <div class="breadcrumbs">
            <div class="layout-1">
                <?php
                if ($breadcrumb): print $breadcrumb;
                endif;
                ?>
            </div>
        </div>
        <div class="content-sidebar-wrap layout-1">
            <div id="content">

                <section id="post-content" role="main">

                    <?php print $messages; ?>
                    <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
                    <?php print render($title_suffix); ?>


                    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
                    <?php print render($page['help']); ?>
                    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                    <?php print render($page['content']); ?>
                </section> <!-- /#main -->
            </div>
            <?php if ($page['sidebar_first']): ?>
                <aside id="sidebar-first" role="complementary">
                    <?php print render($page['sidebar_first']); ?>
                </aside>  <!-- /#sidebar-first -->
            <?php endif; ?>


            <?php if ($page['sidebar_second']): ?>
                <aside id="sidebar-second" role="complementary">
                    <?php print render($page['sidebar_second']); ?>
                </aside>  <!-- /#sidebar-first -->
            <?php endif; ?>
        </div>
    </div>

<?php } ?>


<div class="seccions">
    <?php print render($page['seccions']); ?>
</div>

<div class="contact-wrapper"> 
    <section id="contactenos">
        <?php print render($page['contact']); ?> 
    </section>

</div>


<div class="gototopfoot">
    <a id="gototopfoot" href="#">
        <i class="material-icons">keyboard_arrow_up</i>
    </a>
</div>
<div class=" footer-wrapper blue-bg">
    <div id="footer" class="white-text  layout-1 "> 
        <div class="footer_credit padding2">
            <?php if ($page['footer']): ?>
                <?php print render($page['footer']) ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="padding1 copyright">
        <div class="flex layout-1 blocks">
            <div><p>Copyright 2018. Universidad Técnica Particular de Loja </p> </div>
            <div>   <div class="flex items-social">
                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://www.facebook.com/Investiga-UTPL-1619123434981758/"> <img src="/sites/all/themes/utpl/images/icon-fb.png" alt="fb"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://www.facebook.com/Investiga-UTPL-1619123434981758/"> <img src="/sites/all/themes/utpl/images/icon-fb-over.png" alt="fb"/>  </a>
                        </div>
                    </div>

                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://twitter.com/InvestigaUtpl?lang=es"> <img src="/sites/all/themes/utpl/images/icon-tw.png" alt="tw"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://twitter.com/InvestigaUtpl?lang=es"> <img src="/sites/all/themes/utpl/images/icon-tw-over.png" alt="tw"/>  </a>
                        </div>
                    </div>

                </div></div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>