<?php

/* Template Name: Contact */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

    <main class="_page contact-page">
        <?php if( have_rows('hero') ): while( have_rows('hero') ): the_row(); ?>
        <section class="hero-v2 _padding-top">
           <div class="hero-v2__bg ibg">
               <?php the_post_thumbnail('large'); ?>
           </div>
           <div class="hero-v2__body container">
               <?php get_template_part('global-templates/breadcrumbs'); ?>
               <h1 class="hero-v2__title">
                   <?php the_sub_field( 'titel' ); ?>
               </h1>
               <div class="hero-v2__subtitle">
                   <?php the_sub_field( 'tekst' ); ?>
               </div>
               <a href="mailto:<?php the_sub_field( 'e-mailadres' ); ?>" class="hero-v2__link">
                   <i class="fas fa-envelope"></i>
                   <?php the_sub_field( 'e-mailadres' ); ?>

               </a>
               <a href="tel:<?php the_sub_field( 'telefoonnummer' ); ?>" class="hero-v2__link">
                   <i class="fas fa-phone"></i>
                   <?php the_sub_field( 'telefoonnummer' ); ?>
               </a>    
           </div>
       </section>
        <?php endwhile; endif; ?>

        <?php get_template_part('acf-templates/alle_locaties'); ?>

        <?php get_template_part('acf-templates/contactformulier'); ?>

        <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>

    </main>

<?php get_footer(); ?>