<section class="locations-b">
   <div class="container">
   <?php if( have_rows('onze_locaties') ): while( have_rows('onze_locaties') ): the_row(); ?>
      <h2 class="locations-b__title title-2"><?php the_sub_field('titel') ?></h2>
      <div class="locations-b__subtitle"><?php the_sub_field('subtitel') ?></div>
   <?php endwhile; else: ?>
      <h2 class="locations-b__title title-2"><?php _e('Onze locaties', 'theme') ?></h2>
      <div class="locations-b__subtitle"><?php _e('U kunt zich op deze locaties laten testen', 'theme') ?></div>
   <?php endif; ?>
      
      <div class="locations-b__body">
         <div class="locations-b__list">
            <div class="swiper-container">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <!-- Locatie for loop -->

                     <script>
                        let locatieArgs = {}; // Add this object here because we fill it later and needs to be reset every single location
                     </script>

                     <?php  foreach(get_locaties(-1) as $locatieID){

                     // Save the variables here, because we use them multiple times
                     // Otherwise we call the functions twice and get unnesecary requests to the server.
                     $page_id      = $locatieID;
                     $title        = get_the_title($locatieID);
                     $bookly_id    = get_field('bookly_id', $locatieID);
                     $bedrijfsnaam = get_field('bedrijfsnaam', $locatieID);
                     $plaats       = get_field('plaats', $locatieID);
                     $adres        = get_field('adres', $locatieID);
                     $postcode     = get_field('postcode', $locatieID);
                     $lat          = get_field('latitude', $locatieID);
                     $lng          = get_field('longitude', $locatieID);
                     $email        = get_field('emailadres', $locatieID);

                     ?>
                     
                     <a href="<?php echo get_field("afspraak_maken_url", "options") . "?loc_id=".  $bookly_id; ?>" class="locations-b__list-item">
                        <!-- We don't have this data, so default is open -->
                        <div class="locations-b__list-item-status locations-b__list-item-status_green">
                           <?php _e('open', 'theme'); ?>
                        </div>

                        <div class="locations-b__list-item-title">
                           <?php echo $title ?> 
                        </div>

                        <ul class="locations-b__list-item-text">
                           <?php if(strlen($bedrijfsnaam) > 0): ?><li><?php echo $bedrijfsnaam ?></li> <?php endif;?>
                           <li><?php echo $adres ?></li>
                           <li><?php echo $postcode . " " . $plaats ?></li>
                           <li class="e-mailadres">
                              <i class="fas fa-envelope"></i>
                              <?php echo $email; ?>
                           </li>
                        </ul>

                        <span class="locations-b__link link">
                           <?php _e(' Maak een afspraak', 'theme'); ?>
                        </span>
                     </a>

                     <?php 

                     // Check if the location has a lat/lng otherwise create them via the addLatLngToDatabase function
                     if(!get_field('latitude', $page_id) || !get_field('longitude', $page_id)){ ?>

                        <script>
                           // Wait till the body has loaded, because we need to Maps API to be loaded.
                           document.addEventListener("DOMContentLoaded", function(event) { 
                              addLatLngToDatabase("<?php echo $adres . ' ' . $plaats ?>", <?php echo $page_id ?>)
                           }); 
                        </script>

                     <?php }else{ ?>

                        <script>
                           // Wait till the body has loaded, because we need to Maps API to be loaded.
                           document.addEventListener("DOMContentLoaded", function(event) { 

                              locatieArgs = {
                                 name: "<?php echo $title ?>",
                                 place: "<?php echo $plaats;?>",
                                 street: "<?php echo $adres ?>",
                                 postal: "<?php echo $postcode?>",
                                 status: "Open",
                                 lat: <?php if(!empty($lat)): echo $lat; else: "0"; endif; ?>,
                                 lng: <?php if(!empty($lng)): echo $lng; else: "0"; endif;  ?>,
                                 url: "<?php echo get_field("afspraak_maken_url", "options") . "?loc_id=".  $bookly_id; ?>"
                              }

                               addressToMarker(get_geocoder(), initMap(), locatieArgs);

                               setNederland(initMap());
                           }); 

                           
                        </script>

                     <?php } ?>

                     
                  <?php } ?>

                  <!-- End locatie for loop -->

                  </div>
               </div>
               <div class="swiper-scrollbar"></div>
            </div>
         </div>
         <div class="locations-b__map" id="map"></div>
      </div>
   </div>
</section>