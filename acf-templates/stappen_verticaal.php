<div class="container how-do-we-work vertical">
    <div class="modular-text__row-1">
        <div class="text-img">
            <div class="text-img__col-1">
                <div class="how-do-we-work__intro horizontal text-content">
                    <?php the_sub_field( 'inleiding' ); ?>
                </div>
                <div class="how-do-we-work__body">
                   <?php if( have_rows('stappen') ): $a = 0; while( have_rows('stappen') ): $a++; the_row(); ?>
                   <div class="how-do-we-work__item vertical-work-item">
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
            <div class="text-img__col-2">
                <div class="text-img__img ibg">
                    <?php $afbeelding = get_sub_field( 'afbeelding_rechts' ); ?>
                    <?php if ( $afbeelding ) { ?>
                       <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>