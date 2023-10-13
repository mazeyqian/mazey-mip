<?php require_once(dirname(__FILE__) . '/class/class-load.php'); ?>
<!DOCTYPE html>
<html mip>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
        <!-- <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" /> -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mip.css">
        <link rel="canonical" href="<?php
                global $Object_MIP;
                $currentUrl = $Object_MIP->return_current_url();
                echo $currentUrl;
                /* MIP 推送 */
                $Object_MIP->pushBDAndWriteLog(array($currentUrl));
            ?>">
        <title><?php global $Object_Show;$Object_Show->print_page_title(); ?></title>
        <style mip-custom>
            <?php require_once(dirname(__FILE__) . '/css/main.css.php'); ?>
        </style>
    </head>
    <body>
        <header>
            <!--导航-->
            <nav class="navbar navbar-static-top navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><mip-img src="<?php bloginfo('template_url'); ?>/img/favicon.ico" alt="LOGO" ></a>
                    </div>
                    <?php
                    echo str_replace('current-menu-item', 'active current-menu-item', wp_nav_menu(array(
                        'menu' => '',
                        'container' => '',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'nav navbar-nav hidden-xs',
                        'menu_id' => '',
            	        'echo' => false,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_spacing' => 'preserve',
            	        'depth' => 0,
                        'walker' => '',
                        'theme_location' => '' ))
                    );
                    ?>
                </div>
            </nav>
        </header>
        <div class="container post-main">
            <div class="row">