<section class="hero-v3 _padding-top">
   <div class="hero-v3__bg ibg">
       <?php the_post_thumbnail('large'); ?>
   </div>
   <div class="hero-v3__body container">
      <?php get_template_part('global-templates/breadcrumbs'); ?>
      
       <h1 class="hero-v3__title"><?php the_sub_field( 'titel' ); ?></h1>
       <div class="hero-v3__subtitle">
           <p><?php the_sub_field( 'tekst' ); ?></p>
           <?php $button_optioneel = get_sub_field( 'button_optioneel' ); ?>
           <?php if ( $button_optioneel ) { ?>
            <a href="<?php echo $button_optioneel['url']; ?>" class="get-tested__btn btn-default" style="margin-top: 15px;">
                 <i class="fas fa-calendar-alt"></i>
                 <?php echo $button_optioneel['title']; ?>
            </a>
           <?php } ?>
       </div>
       
   </div>
</section>