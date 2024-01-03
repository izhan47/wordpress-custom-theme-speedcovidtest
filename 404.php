<?php get_header(); ?>

<?php if( have_rows('404', 'options') ): while( have_rows('404', 'options') ): the_row(); ?>
<section class="hero-v3 _padding-top">
   <div class="hero-v3__bg ibg">
   </div>
   <div class="hero-v3__body container" style="padding: 100px 0;">
      <?php get_template_part('global-templates/breadcrumbs'); ?>
      
       <h1 class="hero-v3__title"><?php the_sub_field('titel'); ?></h1>
       <div class="hero-v3__subtitle">
           <p><?php the_sub_field('tekst'); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-default" style="margin-top:15px;">
                 <?php the_sub_field('button_tekst'); ?>
            </a>
       </div>
   </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>