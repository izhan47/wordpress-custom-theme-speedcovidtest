<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="UTF-8">
   <title><?php wp_title(); ?></title>
   <meta name="format-detection" content="telephone=no">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?ver=1.10"> -->
   
   <!-- TrustBox script -->
   <script src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
   <!-- End TrustBox script -->
      
   <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/favicon/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/favicon/favicon-16x16.png">
   <link rel="manifest" href="<?php bloginfo('template_url'); ?>/favicon/site.webmanifest">
   <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
   <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon/favicon.ico">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/favicon/browserconfig.xml">
   <meta name="theme-color" content="#ffffff">

   <?php wp_head(); ?>
   
   <script>
       const theme_location = "<?php echo get_template_directory_uri(); ?>"
   </script>
</head>

<body <?php body_class(); ?>>
    <div class="p-fixed">
    <?php
    $active = false;
    
    if (have_rows('topbar_melding', 'option')): while (have_rows('topbar_melding', 'option')): the_row();
        if (get_sub_field('actief')):
            $active = true;

            if (get_sub_field('achtergrondkleur')): $achtergrondkleur = get_sub_field('achtergrondkleur'); else: $achtergrondkleur = '#43b91f'; endif;
            if (get_sub_field('tekstkleur')): $tekstkleur = get_sub_field('tekstkleur'); else: $tekstkleur = '#fff'; endif;

            echo '<div class="topbar" style="background-color: '. $achtergrondkleur .'; color: '. $tekstkleur .' "><div class="container">'. get_sub_field("tekst") .'</div></div>';
           
        endif;
    endwhile; endif; ?>

    <header class="header <?php if ($active): echo "header-tb-active"; endif; ?> <?php if (is_singular('locaties')): ?>header_solid<?php endif; ?>">
        <div class="header__body container">
            <div class="header__burger">
                <div class="burger-wrap">
                    <div class="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div> 
            <div class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="" src="<?php bloginfo('template_url'); ?>/img/logo/logo.png" alt="logo">
                    <img class="header__logo-mobile" src="<?php bloginfo('template_url'); ?>/img/logo/logo-mobile.png" alt="logo">
                </a>
            </div>
            <nav class="header__menu menu">
                <div class="menu__mobile-head">
                    <div class="menu__mobile-close"></div>
                    <div class="menu__mobile-logo">
                        <img src="<?php bloginfo('template_url'); ?>/img/logo/logo-mobile.png" alt="logo">
                    </div>
                </div>
                <div class="menu__row">
                <?php
                    // Navigation
                    wp_nav_menu(array( 'menu' => "Header menu",'menu_class' => "menu__list",'link_class'  => 'menu__link'));
                ?>   

<?php  do_action('wpml_add_language_selector');  ?> 

                </div>
            </nav>

           
            
            <a href="<?php the_field('afspraak_maken_url', 'options'); ?>" class="header__btn btn-default">
                <i class="fas fa-calendar-alt"></i>
                <?php _e('Afspraak maken', 'theme'); ?>
            </a>
        </div>
    </header>
    </div>
    <!-- == TOP LINE ================== -->
   
    <!-- == // TOP LINE ================== -->