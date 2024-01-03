<section class="how-do-we-work">
   <div class="container">
      <div class="how-do-we-work__intro horizontal text-content">
         <?php the_sub_field( 'inleiding' ); ?>
      </div>
      <div class="how-do-we-work__body">
         <?php if( have_rows('stappen') ): $a = 0; while( have_rows('stappen') ): $a++; the_row(); ?>
         <div class="how-do-we-work__item">
            <div class="how-do-we-work__card">
               <div class="how-do-we-work__num"><?php echo $a; ?></div>
               <div class="how-do-we-work__title-card"><?php the_sub_field( 'titel' ); ?></div>
               <div class="how-do-we-work__text text-content">
                  <?php the_sub_field( 'tekst' ); ?>
               </div>
            </div>
         </div>
         <?php endwhile; endif; ?>
      </div>
   </div>
</section>