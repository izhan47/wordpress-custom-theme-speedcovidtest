<?php if( have_rows('veelgestelde_vragen', 'option') ): while( have_rows('veelgestelde_vragen', 'option') ): the_row(); 
$titel = get_sub_field('titel'); 
$lees_meer_link = get_sub_field( 'lees_meer_link' );
endwhile; endif; ?>

<section class="asked-questions">
   <div class="asked-questions__body container">
      <div class="asked-questions__col-1">
         <h3 class="asked-questions__title title-3">
            <i class="fas fa-question-circle"></i>
            <?php echo $titel; ?>
         </h3>
         <ul class="asked-questions__list _spollers _one">
            <?php if ( get_sub_field( 'veelgestelde_vragen_overschrijven' ) == 1 ): ?>
 
            <?php if( have_rows('vragen_repeater') ): while( have_rows('vragen_repeater') ): the_row(); ?>
            <?php $post_object = get_sub_field( 'vragen' ); ?>
            <?php if ( $post_object ): ?>
               <?php $post = $post_object; ?>
               <?php setup_postdata( $post ); ?> 
            <li>
               <i class="fas fa-plus"></i>
               <div class="asked-questions__list-title _spoller">
                  <?php the_title(); ?>
               </div>
               <div class="asked-questions__list-text text-content">
                  <?php the_content(); ?>
               </div>
            </li>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; endif; ?>
   
            <?php else: ?>
     
            <?php if( have_rows('veelgestelde_vragen', 'option') ): while( have_rows('veelgestelde_vragen', 'option') ): the_row(); ?>
            <?php if( have_rows('vragen') ): while( have_rows('vragen') ): the_row(); ?>
            <?php $post_object = get_sub_field( 'vraag' ); ?>
            <?php if ( $post_object ): ?>
               <?php $post = $post_object; ?>
               <?php setup_postdata( $post ); ?> 
            <li>
               <i class="fas fa-plus"></i>
               <div class="asked-questions__list-title _spoller">
                  <?php the_title(); ?>
               </div>
               <div class="asked-questions__list-text text-content">
                  <?php the_content(); ?>
               </div>
            </li>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; endif; ?>
            <?php endwhile; endif; ?>
     
            <?php endif; ?>   
         </ul>
         <?php if ( $lees_meer_link ) { ?>
            <a href="<?php echo $lees_meer_link['url']; ?>" class="asked-questions__link link"><?php echo $lees_meer_link['title']; ?></a>
         <?php } ?>
      </div>
      <?php if( have_rows('veelgestelde_vragen', 'option') ): while( have_rows('veelgestelde_vragen', 'option') ): the_row(); ?>
      <?php if( have_rows('supervisie') ): while( have_rows('supervisie') ): the_row(); ?>
      <div class="asked-questions__col-2">
         <div class="asked-questions-card">
            <h3 class="asked-questions-card__title">
               <i class="fas fa-user-md"></i>
               <?php the_sub_field( 'titel' ); ?>
            </h3>
            <div class="asked-questions-card__text text-content">
               <p><?php the_sub_field( 'tekst' ); ?></p>
            </div>
         </div>
      </div>
      <?php endwhile; endif; ?>
      <?php endwhile; endif; ?>
   </div>
</section>