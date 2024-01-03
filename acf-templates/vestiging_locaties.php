<?php if ( have_rows( 'locatie_repeater' ) ) : $a = 0; while ( have_rows( 'locatie_repeater' ) ) : $a++; the_row(); ?>
<?php $post_object = get_sub_field( 'locatie' ); ?>
<?php if ( $post_object ): $post = $post_object; setup_postdata( $post ); ?> 
<?php $plaats = get_field('plaats'); ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endwhile; endif; ?>

<section class="location-details">
   <div class="container">
      <div class="location-details-title">
         <?php if($a == 1): ?>
            <h2><?php _e('Waar is onze vestiging?', 'theme'); ?></h2>
            <p><?php _e('Onze locatie in', 'theme'); ?> <?php echo $plaats; ?> <?php _e('is hier gevestigd:', 'theme'); ?></p>
         <?php else: ?>
            <h2><?php _e('Waar is onze vestigingen?', 'theme'); ?></h2>
            <p><?php _e('Onze locaties in', 'theme'); ?> <?php echo $plaats; ?> <?php _e('zijn hier gevestigd:', 'theme'); ?>zijn hier gevestigd:</p>
         <?php endif; ?>
      </div>
      <div class="location-details-single-row">

         <script>
            let locatieArgsSingle = {}; // Add this object here because we fill it later and needs to be reset every single location
         </script>

         <?php if ( have_rows( 'locatie_repeater' ) ) : while ( have_rows( 'locatie_repeater' ) ) : the_row(); ?>
         <?php $post_object = get_sub_field( 'locatie' ); ?>
         <?php if ( $post_object ): $post = $post_object; setup_postdata( $post ); ?> 
         <?php

         // Save the variables here, because we use them multiple times
         // Otherwise we call the functions twice and get unnesecary requests to the server.
         $page_id      = get_the_ID();
         $bookly_id    = get_field('bookly_id');
         $bedrijfsnaam = get_field('bedrijfsnaam');
         $plaats       = get_field('plaats');
         $adres        = get_field('adres');
         $postcode     = get_field('postcode');
         $lat          = get_field('latitude');
         $lng          = get_field('longitude');

         ?>

         <script>
            // Wait till the body has loaded, because we need to Maps API to be loaded.
            document.addEventListener("DOMContentLoaded", function(event) { 

               locatieArgsSingle = {
                  name: "<?php echo $bedrijfsnaam ?>",
                  place: "<?php echo $plaats;?>",
                  street: "<?php echo $adres ?>",
                  postal: "<?php echo $postcode?>",
                  status: "Open",
                  lat: <?php if(!empty($lat)): echo $lat; else: "0"; endif; ?>,
                  lng: <?php if(!empty($lng)): echo $lng; else: "0"; endif;  ?>,
                  url: "<?php echo get_field("afspraak_maken_url", "options") . "?loc_id=".  $bookly_id; ?>"
               }

               showSinglePin(get_geocoder(), initMapWithLocation("map-<?php echo get_the_ID() ?>"), locatieArgsSingle);
            }); 
         </script>

         <div class="location-details-single">
            <div class="location-details-single-inner">
               <?php the_field('bedrijfsnaam'); ?> <br>
               <?php the_field('adres'); ?> <br>
               <?php the_field('postcode'); ?> <?php the_field('plaats'); ?> <br><br>
               <?php the_field('bedrijfsnaam'); ?> <?php the_field('plaats'); ?>
               <div class="map-responsive">
                  <div style="padding-bottom: 56.25%;" class="locations-b__map" id="map-<?php echo get_the_ID() ?>"></div>
                  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155959.8924297995!2d4.763878108967292!3d52.354582834316005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c63fb5949a7755%3A0x6600fd4cb7c0af8d!2sAmsterdam!5e0!3m2!1snl!2snl!4v1629633996141!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
               </div>
            </div>
         </div>
         <?php wp_reset_postdata(); ?>
         <?php endif; endwhile; else: endif; ?>
      </div>
   </div>
</section>