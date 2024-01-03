<?php if( have_rows('cta_laat_je_testen', 'option') ): while( have_rows('cta_laat_je_testen', 'option') ): the_row(); ?>
<section class="get-tested get-tested_dark">
   <div class="get-tested__img ibg">
       <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
       <?php if ( $afbeelding ) { ?>
          <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
       <?php } ?>
   </div>
   <div class="get-tested__text-wrap">
       <div class="get-tested__suptitle suptitle">
           <?php the_sub_field( 'subtitel' ); ?>
       </div>
       <h2 class="get-tested__title title-2">
           <?php the_sub_field( 'titel' ); ?>
       </h2>
       <div class="get-tested__subtitle">
           <?php the_sub_field( 'tekst' ); ?>
       </div>
       <div class="get-tested__group">
          <?php $button_link = get_sub_field( 'button_link' ); ?>
          <?php if ( $button_link ) { ?>
           <a href="<?php echo $button_link['url']; ?>" class="get-tested__btn btn-default">
               <i class="fas fa-calendar-alt"></i>
               <?php echo $button_link['title']; ?>
           </a>
           <?php } ?>
           <div class="get-tested__text">
               <?php the_sub_field( 'tekst_naast_button' ); ?>
           </div>
       </div>
   </div>
</section>
<?php endwhile; endif; ?>