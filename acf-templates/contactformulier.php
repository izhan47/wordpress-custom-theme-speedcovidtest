<?php if ( get_sub_field( 'overschrijf_contactformulier' ) == 1 ): ?>

<section id="contact" class="contact-b">
   <div class="container">
      <h3 class="contact-form__title title-3">
         <i class="fas fa-envelope"></i> <?php _e('Contact', 'theme'); ?>
      </h3>
      <div class="text-content text-content-contactform">
         <?php the_sub_field('contactformulier_overschrijven'); ?>
         <style>
         .text-content-contactform p { max-width: 710px; }
         </style>
      </div>
   </div>
</section>

<?php else: ?>

<?php if( have_rows('contactformulier', 'options') ): while( have_rows('contactformulier', 'options') ): the_row(); ?>
<section id="contact" class="contact-b">
   <div class="container">
      <h3 class="contact-form__title title-3">
         <i class="fas fa-envelope"></i> <?php _e('Contact', 'theme'); ?>
      </h3>
      <div class="text-content text-content-contactform">
         <?php the_sub_field('tekst_&_formulier'); ?>
      </div>
   </div>
</section>
<?php endwhile; endif; ?>

<?php endif; ?>