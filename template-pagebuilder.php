<?php

/* Template Name: Pagebuilder */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

   <main class="_page modular-page">
       
   <?php if( have_rows('pagebuilder') ): while ( have_rows('pagebuilder') ) : the_row(); ?>
   
      <?php if( get_row_layout() == 'hero__tekst' ): ?>
         <?php get_template_part('acf-templates/hero__tekst'); ?>
      
      <?php elseif( get_row_layout() == 'hero__tekst_center' ): ?>
         <?php get_template_part('acf-templates/hero__tekst_center'); ?>
         
      <?php elseif( get_row_layout() == 'hero__producten' ): ?>
         <?php get_template_part('acf-templates/hero__producten'); ?>
      
      <?php elseif( get_row_layout() == 'tekst__volle_breedte' ): ?>
         <?php get_template_part('acf-templates/tekst__volle_breedte'); ?>
         
      <?php elseif( get_row_layout() == 'tekst__afbeelding' ): ?>
         <?php get_template_part('acf-templates/tekst__afbeelding'); ?>
         
      <?php elseif( get_row_layout() == 'afbeelding__tekst' ): ?>
         <?php get_template_part('acf-templates/afbeelding__tekst'); ?>
         
      <?php elseif( get_row_layout() == 'tekst__tekst' ): ?>
         <?php get_template_part('acf-templates/tekst__tekst'); ?>
         
      <?php elseif( get_row_layout() == 'tekst__tekst__tekst' ): ?>
         <?php get_template_part('acf-templates/tekst__tekst__tekst'); ?>
         
      <?php elseif( get_row_layout() == 'cta_laat_je_testen' ): ?>
         <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>
         
      <?php elseif( get_row_layout() == 'contactformulier' ): ?>
         <?php get_template_part('acf-templates/contactformulier'); ?>
         
      <?php elseif( get_row_layout() == 'afbeelding__tekst_+_usps' ): ?>
         <?php get_template_part('acf-templates/afbeelding__tekst_+_usps'); ?>
         
      <?php elseif( get_row_layout() == 'stappen_horizontaal' ): ?>
         <?php get_template_part('acf-templates/stappen_horizontaal'); ?>
         
      <?php elseif( get_row_layout() == 'stappen_verticaal' ): ?>
         <?php get_template_part('acf-templates/stappen_verticaal'); ?>
         
      <?php elseif( get_row_layout() == 'vestiging_locaties' ): ?>
         <?php get_template_part('acf-templates/vestiging_locaties'); ?>
         
      <?php elseif( get_row_layout() == 'alle_locaties' ): ?>
         <?php get_template_part('acf-templates/alle_locaties'); ?>
         
      <?php elseif( get_row_layout() == 'beschikbare_testen' ): ?>
         <?php get_template_part('acf-templates/beschikbare_testen'); ?>
         
      <?php elseif( get_row_layout() == 'landenlijst' ): ?>
         <?php get_template_part('acf-templates/landenlijst'); ?>
      
      <?php elseif( get_row_layout() == 'veelgestelde_vragen' ): ?>
         <?php get_template_part('acf-templates/veelgestelde_vragen'); ?>
         
      <?php elseif( get_row_layout() == 'nieuws' ): ?>
         <?php get_template_part('acf-templates/nieuws'); ?>

      <?php elseif( get_row_layout() == 'partners_slider' ): ?>
         <?php get_template_part('acf-templates/partners'); ?>

         <?php elseif( get_row_layout() == 'disclaimer' ): ?>
      <?php get_template_part('acf-templates/disclaimer'); ?>

      <?php elseif( get_row_layout() == 'zakelijk_contact' ): ?>
      <?php get_template_part('acf-templates/business__contact'); ?>

   <?php endif; endwhile;?>
   <?php else: ?>
   <div class="container">
      <p>Geen content</p>
   </div>
   <?php endif; ?>  

   </main>

<?php get_footer(); ?>