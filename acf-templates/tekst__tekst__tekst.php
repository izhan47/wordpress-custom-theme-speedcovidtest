<div class="container">
    <div class="modular-text__row-3">
        <?php if( have_rows('tekst_links') ): while( have_rows('tekst_links') ): the_row(); ?>
        <div class="text-card">
           <?php if ( get_sub_field( 'afbeelding_boven_content' ) == 1 ): ?>
            <div class="text-card__img ibg">
                <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                <?php if ( $afbeelding ) { ?>
                   <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
                <?php } ?>
            </div>
            <?php endif; ?>
            <div class="text-card__text text-content">
                <?php the_sub_field( 'content' ); ?>
            </div>
        </div>
        <?php endwhile; endif; ?>
        <?php if( have_rows('tekst_midden') ): while( have_rows('tekst_midden') ): the_row(); ?>
          <div class="text-card">
             <?php if ( get_sub_field( 'afbeelding_boven_content' ) == 1 ): ?>
              <div class="text-card__img ibg">
                  <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                  <?php if ( $afbeelding ) { ?>
                     <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
                  <?php } ?>
              </div>
              <?php endif; ?>
              <div class="text-card__text text-content">
                  <?php the_sub_field( 'content' ); ?>
              </div>
          </div>
          <?php endwhile; endif; ?>
        <?php if( have_rows('tekst_rechts') ): while( have_rows('tekst_rechts') ): the_row(); ?>
          <div class="text-card">
             <?php if ( get_sub_field( 'afbeelding_boven_content' ) == 1 ): ?>
              <div class="text-card__img ibg">
                  <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                  <?php if ( $afbeelding ) { ?>
                     <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
                  <?php } ?>
              </div>
              <?php endif; ?>
              <div class="text-card__text text-content">
                  <?php the_sub_field( 'content' ); ?>
              </div>
          </div>
          <?php endwhile; endif; ?>
    </div>
</div>