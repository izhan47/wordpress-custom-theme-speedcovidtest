<?php 
$locationPostID = get_sub_field('locatie_postid'); 
$locationID = get_field('bookly_id', $locationPostID);
?>

<section class="available-tests">
   <div class="container">
       <h4 class="available-tests__title title-4"><?php _e('Beschikbare testen', 'theme') ?></h4>
       <ul class="available-tests__list">
          <?php if ( get_sub_field( 'niet_alle_testen_beschikbaar' ) == 1 ): ?>
          <?php if( have_rows('testen_beschikbaar') ): while( have_rows('testen_beschikbaar') ): the_row(); ?>
          <?php $post_object = get_sub_field( 'test' ); ?>
           <?php if ( $post_object ): ?>
              <?php $post = $post_object; ?>
              <?php setup_postdata( $post ); ?> 
              <?php $serviceID = get_field('bookly_id'); ?>
            <li>
                 <div class="available-tests-card">
                     <div class="available-tests-card__col-1">
                         <div class="available-tests-card__head">
                             <div class="available-tests-card__title"><?php the_title(); ?></div>
                             <div class="available-tests-card__time">
                                 <i class="far fa-clock"></i>
                                 <div class="inline">
                                   <?php the_field('uitslag_in'); ?>
                                 </div>
                             </div>
                         </div>
                         <div class="available-tests-card__text">
                             <?php the_field('uitgebreide_naam_test'); ?> <a href="<?php the_field( 'meer_informatie' ); ?>"><?php _e('Meer informatie', 'theme') ?></a>
                         </div>
                     </div>
                     <div class="available-tests-card__col-2">
                         <?php if(get_field('oude_prijs')): ?><span class="old-price">€<?php the_field( 'oude_prijs' ); ?></span><?php endif; ?>
                          <span class="price">€<?php the_field( 'prijs' ); ?></span>
                          <?php _e('per test', 'theme') ?>*
                     </div>
                     <div class="available-tests-card__col-3">
                       <?php $serviceID = get_field('service_id'); ?>
                         <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo $serviceID; ?>&loc_id=<?php echo $locationID; ?>" class="available-tests-card__btn btn-default">
                    <i class="fas fa-calendar-alt"></i>
                    <?php _e('Afspraak maken', 'theme'); ?>
                 </a>
                     </div>
                 </div>
             </li>
             <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; endif; ?>
            <?php else: ?>
            <?php 
            $the_query = new WP_Query( array( 'post_type' => 'testen', 'posts_per_page' => -1 ) );
            ?>
            <?php if ( $the_query->have_posts() ) : ?>
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li>
              <div class="available-tests-card">
                  <div class="available-tests-card__col-1">
                      <div class="available-tests-card__head">
                          <div class="available-tests-card__title"><?php the_title(); ?></div>
                          <div class="available-tests-card__time">
                              <i class="far fa-clock"></i>
                              <div class="inline">
                               <?php the_field('uitslag_in'); ?> 
                              </div>
                          </div>
                      </div>
                      <div class="available-tests-card__text">
                          <?php the_field('uitgebreide_naam_test'); ?> <a href="<?php the_field( 'meer_informatie' ); ?>"> <?php _e('Meer informatie', 'theme') ?></a>
                      </div>
                  </div>
                  <div class="available-tests-card__col-2">
                      <?php if(get_field('oude_prijs')): ?><span class="old-price">€<?php the_field( 'oude_prijs' ); ?></span><?php endif; ?>
                      <span class="price">€<?php the_field( 'prijs' ); ?></span>
                      <?php _e('per test', 'theme') ?>
                  </div>
                  <div class="available-tests-card__col-3">
                    <?php $serviceID = get_field('service_id'); ?>
                      <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo $serviceID; ?>&loc_id=<?php echo $locationID; ?>" class="available-tests-card__btn btn-default">
                 <i class="fas fa-calendar-alt"></i>
                 <?php _e('Afspraak maken', 'theme'); ?>
              </a>
                  </div>
              </div>
          </li>
          <?php endwhile; ?>          
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>
            <?php endif; ?>
       </ul>
   </div>
</section>