<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="maincontentcontainer">
 *
 * @package Peace
 * @since Peace 1.0
 */
?>
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <!DOCTYPE html>
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>>
    <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9" <?php language_attributes(); ?>>
    <![endif]-->
    <!--[if !(IE 7) | !(IE 8)  ]><!-->
    <html <?php language_attributes(); ?>>
        <!--<![endif]-->
        <head>
            <meta charset="<?php bloginfo('charset'); ?>" />
            <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

            <title><?php wp_title('|', true, 'right'); ?></title>
            <meta http-equiv="cleartype" content="on">

            <!-- Responsive and mobile friendly stuff -->
            <meta name="HandheldFriendly" content="True">
            <meta name="MobileOptimized" content="320">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="profile" href="http://gmpg.org/xfn/11" />
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


            <?php wp_head(); ?>
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>

        <body <?php body_class(); ?>>

            <div id="wrapper" class="hfeed site">

                <div class="visuallyhidden skip-link"><a href="#primary" title="<?php esc_attr_e('Skip to main content', 'peace'); ?>"><?php esc_html_e('Skip to main content', 'peace'); ?></a></div>
                
                <div class="top-bar">
                    <div class="top-bar-wrap clearfix">
                        <div class="col grid_6_of_12 top-bar-nav">
                           <nav id="top-navigation" class="main-navigation clearfix" role="navigation">
                                
                               <?php
                                    $header_walker = new Peace_Menu_With_Description;
                                    wp_nav_menu(array(
                                        'theme_location' => 'above-header',
                                        'menu_class' => 'above-header-menu clearfix',
                                        'container_class' => 'header-menu',
                                        'walker' => $header_walker,
                                        'fallback_cb' => 'peace_link_to_menu_editor'
                                    ));
                                    ?>
                              <div id="mobile-top-menu"></div> 
                            </nav> <!-- /.site-navigation.main-navigation -->
                        </div>
                        <div class="col grid_6_of_12 social-icons-container last"> 
                            <div class="social-links clearfix">
                                <ul id="header-social-links" class="clearfix">
                                    <?php if (get_theme_mod('facebook_link_url')) { ?>
                                        <li class="peace-fb"><a href="<?php echo esc_url(get_theme_mod('facebook_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('twitter_link_url')) { ?>
                                        <li class="peace-twitter"><a href="<?php echo esc_url(get_theme_mod('twitter_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('googleplus_link_url')) { ?>
                                        <li class="peace-gplus"><a href="<?php echo esc_url(get_theme_mod('googleplus_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('pinterest_link_url')) { ?>
                                        <li class="peace-pinterest"><a href="<?php echo esc_url(get_theme_mod('pinterest_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('github_link_url')) { ?>
                                        <li class="peace-github"><a href="<?php echo esc_url(get_theme_mod('github_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('youtube_link_url')) { ?>
                                        <li class="peace-youtube"><a href="<?php echo esc_url(get_theme_mod('youtube_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('dribbble_link_url')) { ?>
                                        <li class="peace-dribbble"><a href="<?php echo get_theme_mod('dribbble_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('tumblr_link_url')) { ?>
                                        <li class="peace-tumblr"><a href="<?php echo get_theme_mod('tumblr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('flickr_link_url')) { ?>
                                        <li class="peace-flickr"><a href="<?php echo get_theme_mod('flickr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('vimeo_link_url')) { ?>
                                        <li class="peace-vimeo"><a href="<?php echo get_theme_mod('vimeo_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('linkedin_link_url')) { ?>
                                        <li class="peace-linkedin"><a href="<?php echo get_theme_mod('linkedin_link_url'); ?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div><!-- /.header-extras -->
                    </div>
                </div>
                
                <div id="headercontainer">

                    <header id="masthead" class="site-header row" role="banner">
                        <div class="col grid_12_of_12 header-title">
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
                                    <?php echo get_bloginfo('name'); ?>	
                                </a>
                            </h1>
                            <p class="site-description"> 
                                <?php echo get_bloginfo('description'); ?>
                            </p>

                            <?php if (get_header_image()) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                            <?php endif; ?>
                        </div> <!-- /.col.grid_12_of_12 -->

                      
                    </header> <!-- /#masthead.site-header.row -->
                    <div class="nav-container">
                        <nav id="site-navigation" class="main-navigation clearfix" role="navigation">
                                
                                 
                              <?php 
                              
                                $walker = new Peace_Menu_With_Description;
                            
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'primary-menu',
                                        'container_class' => 'menu',
                                        'walker' => $walker,
                                        'fallback_cb' => 'peace_link_to_menu_editor'
                                    ));
                              
                                ?>
                            
                                
                                <div id="mobile-menu"></div>
                            </nav> <!-- /.site-navigation.main-navigation -->
                    </div>


                </div> <!-- /#headercontainer -->
