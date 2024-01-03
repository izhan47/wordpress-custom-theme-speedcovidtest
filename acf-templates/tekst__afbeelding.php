<div class="container">
    <div class="modular-text__row-1">
        <div class="text-img">
            <div class="text-img__col-1">
                <div class="text-img__text text-content">
                    <?php the_sub_field( 'content' ); ?>
                </div>
            </div>
            <div class="text-img__col-2">
                <div class="text-img__img ibg">
                    <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                    <?php if ( $afbeelding ) { ?>
                       <?php echo wp_get_attachment_image( $afbeelding, 'large' ); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>