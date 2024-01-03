<div class="container">
    <div class="modular-text__row-1">
        <div class="text-img">
           <div class="text-img__col-1">
               <div class="text-img__img ibg">
                   <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                     <?php if ( $afbeelding ) { ?>
                        <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
                     <?php } ?>
               </div>
           </div>
            <div class="text-img__col-2">
                <div class="text-img__text text-content">
                   <?php if( have_rows('content') ): while( have_rows('content') ): the_row(); ?>
                      <?php the_sub_field( 'tekst' ); ?>
                       <?php if ( have_rows( 'usps' ) ) : ?>
                       <ul class="usp-list">
                          <?php while ( have_rows( 'usps' ) ) : the_row(); ?>
                          <li><?php the_sub_field('item'); ?></li>
                          <?php endwhile; ?>
                       </ul>
                       <?php endif; ?>
                   <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>