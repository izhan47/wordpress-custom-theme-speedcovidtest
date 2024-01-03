<?php

/* Template Name: Booking */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php get_header(); ?>

    <main class="_page appointment-page">
        <?php if( have_rows('hero') ): while( have_rows('hero') ): the_row(); ?>
        <section class="hero-v3 _padding-top">
           <div class="hero-v3__bg ibg">
               <?php the_post_thumbnail('large'); ?>
           </div>
           <div class="hero-v3__body container">
               <h1 class="hero-v3__title"><?php the_sub_field( 'titel' ); ?></h1>
               <div class="hero-v3__subtitle">
                   <?php the_sub_field( 'tekst' ); ?>
               </div>
               <?php get_template_part('global-templates/breadcrumbs'); ?>
           </div>
       </section>
        <?php endwhile; endif; ?>

        <section class="appointment">
            <div class="appointment__content container">

                <a href="https://booking.speedcovidtest.nl/" class="btn-default" style="width: 100%;"><i class="fas fa-calendar-alt"></i> Ga naar ons nieuwe boekingsportaal</a>

            <br><br>

                <?php if( have_rows('meer_informatie') ): while( have_rows('meer_informatie') ): the_row(); ?>
                <div class="appointment__footer">
                     <p>
                         <i class="far fa-<?php the_sub_field( 'fontawesome_icon' ); ?>"></i> <?php the_sub_field( 'tekst' ); ?>
                     </p>
                     <div class="appointment__footer-text-collapse text-content">
                         <?php the_sub_field( 'tekst_na_uitklappen' ); ?>
                     </div>
                     <a href="#" class="appointment__footer-btn link link_blue"><?php _e('Meer informatie', 'theme') ?></a>
                 </div>
                <?php endwhile; endif; ?>
            </div>
        </section>

        <?php get_template_part('acf-templates/alle_locaties'); ?>

        <?php if( have_rows('testen_voor_op_reis') ): while( have_rows('testen_voor_op_reis') ): the_row(); ?>
        <section class="test-b test-b-v2">
           <div class="test-b__body container">
               <div class="test-b__col-1 text-content">
                   <h2 class="test-b__title title-3">
                       <i class="fas fa-plane"></i>
                       <?php the_sub_field( 'titel' ); ?>
                   </h2>
                   <?php the_sub_field( 'tekst' ); ?>

                   <div class="more-info-card">
                       <div class="more-info-card__img ibg">
                           <img src="<?php bloginfo('template_url'); ?>/img/logo/card-logo.jpg" alt="">
                       </div>
                       <?php if(get_sub_field('informatie_rijksoverheid')): ?>
                       <div class="more-info-card__text-wrap">
                           <div class="more-info-card__title"><?php _e('Meer informatie', 'theme') ?></div>
                           <div class="more-info-card__text">
                               <?php the_sub_field( 'informatie_rijksoverheid' ); ?>
                           </div>
                           <?php if ( get_sub_field('meer_informatie') ) { ?>
                              <a href="<?php echo get_sub_field('meer_informatie')['url']; ?>" target="_blank" class="more-info-card__link link link_blue"><?php echo _e('Meer informatie', 'theme') ?></a>
                           <?php } ?>
                       </div>
                       <?php endif; ?>
                   </div>

               </div>
               <div class="test-b__col-2">
                   <div class="test-b__img ibg">
                       <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                       <?php if ( $afbeelding ) { ?>
                          <?php echo wp_get_attachment_image( $afbeelding, 'medium' ); ?>
                       <?php } ?>
                   </div>
               </div>
           </div>
       </section>
        <?php endwhile; endif; ?>

        <?php get_template_part('acf-templates/veelgestelde_vragen'); ?>

        <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>
    </main>

<?php get_footer(); ?>