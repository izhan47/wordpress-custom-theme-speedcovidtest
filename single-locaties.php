<?php get_header(); 

$locationID = get_field('bookly_id');
?>

	<main class="_page location-page _padding-top">
		<section class="hero">
            <div class="hero__bg">
                <div class="hero__bg-img ibg">
                    <img src="<?php bloginfo('template_url'); ?>/img/photo/hero-bg-1.jpg" alt="">
                </div>
            </div>
            <div class="hero__body container">
                <?php if( have_rows('locatie_pagina', 'option') ): while( have_rows('locatie_pagina', 'option') ): the_row(); ?>
                <?php $buttonTekst = get_sub_field('afspraak_maken_button_tekst'); ?>
                <div class="hero__suptitle suptitle-icon">
                     <i class="fas fa-virus"></i>
                     <?php the_sub_field( 'landelijk_corona_testcentrum' ); ?>
                 </div>
                 <h1 class="hero__title">
                     <?php the_sub_field( 'titel' ); ?> <?php the_field('plaats'); ?>
                 </h1>
                 <div class="hero__subtitle">
                     <?php the_sub_field( 'tekst' ); ?> <?php the_field('bedrijfsnaam'); ?> <?php the_field('plaats'); ?>
                 </div>
                 <div class="hero__text text-content">
                     <ul>
                         <?php if( have_rows('usps') ): while( have_rows('usps') ): the_row(); ?>
                         <li>
                              <?php the_sub_field( 'item' ); ?>
                          </li>
                         <?php endwhile; endif; ?>
                     </ul>
                 </div>
                <?php endwhile; endif; ?>
                <!-- <div class="hero__status">
                    <span style="background-color: #43b91f;"></span>
                    Geopend
                </div> -->
                <div class="hero__flex-group">
                    <a href="<?php echo get_field("afspraak_maken_url", "options") . "?loc_id=".  $locationID; ?>" class="hero__btn btn-default">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo $buttonTekst; ?>
                    </a>
                    <?php if ( get_field( 'beperkte_plekken_beschikbaar' ) == 1 ): ?>
                    <div class="hero__warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <?php _e('Beperkte plekken beschikbaar', 'theme') ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <div style="margin: 80px 0 20px 0;">
           <div class="container">
              <div class="col-12">
                 <!-- TrustBox widget - Carousel --> <div class="trustpilot-widget" data-locale="nl-NL" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="5ffdd6f8c37c02000100c53b" data-style-height="140px" data-style-width="100%" data-theme="light" data-stars="4,5" data-review-languages="nl">   <a href="https://nl.trustpilot.com/review/speedcovidtest.nl" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->
              </div>
           </div>
        </div>

        <section class="location-s">
            <div class="location-s__body container">
                <div class="location-s__col location-s__col-1 text-content">
                    <h3 class="location-s__title title-3"><?php the_field('bedrijfsnaam'); ?> <?php the_field('adres'); ?></h3>
                    <div class="location-s__row location-s__row-1">
                        <div class="location-s__col">
                            <div class="location-s__info-card location-s__info-card_solid">
                                <h6 class="location-s__title-3 title-6">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php _e('Adres', 'theme') ?>
                                </h6>
                                <p><?php the_field('adres'); ?></p>
                                <p><?php the_field('postcode'); ?> <?php the_field('plaats'); ?></p>
                                <a href="https://www.google.com/maps/search/?api=1&query=<?php the_field( 'latitude' ); ?>%2C<?php the_field( 'longitude' ); ?>" class="link link_blue">Route</a>
                            </div>
                        </div>

                        <div class="location-s__col">
                            <div class="location-s__info-card">
                                <h6 class="location-s__title-3 title-6">
                                    <i class="fas fa-envelope"></i>
                                    <?php _e('E-mailadres', 'theme'); ?>
                                </h6>
                                <div><a class="link link_blue" href="mailto:<?php the_field("emailadres");  ?>"><?php the_field("emailadres"); ?></a></div>
                            </div>
                        </div>

                        <!-- <div class="location-s__col">
                            <div class="location-s__info-card">
                                <h6 class="location-s__title-3 title-6">
                                    <i class="fas fa-clock"></i>
                                    Openingstijden
                                </h6>
                                <table>
                                    <tr>
                                        <td> Ma t/m vr</td>
                                        <td>07:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Za</td>
                                        <td>07:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>Zo</td>
                                        <td>07:00 - 14:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div> -->
                    </div>

                    <?php if( have_rows('parkeerinformatie') ): while( have_rows('parkeerinformatie') ): the_row(); ?>
                    <div class="location-s__row location-s__row-2">
                       <h6 class="location-s__title-3 title-6">
                           <i class="fas fa-car"></i>
                           <?php the_sub_field( 'titel' ); ?>
                       </h6>
                       <?php the_sub_field( 'tekst' ); ?>
                   </div>
                    <?php endwhile; endif; ?>
                    <?php if( have_rows('wanneer_uitslag') ): while( have_rows('wanneer_uitslag') ): the_row(); ?>
                    <div class="location-s__row location-s__row-3">
                       <h5 class="location-s__title-2 title-5"><?php the_sub_field( 'titel' ); ?></h5>
                       <ul>
                           <?php if( have_rows('tijden') ): while( have_rows('tijden') ): the_row(); ?>
                           <li>
                               <?php the_sub_field( 'item' ); ?>
                           </li>
                           <?php endwhile; endif; ?>
                       </ul>
                   </div>
                    <?php endwhile; endif; ?>
                    <div class="location-s__row location-s__row-4">
                        <div class="location-s__col">
                            <a href="<?php echo get_field("afspraak_maken_url", "options") . "?loc_id=".  $locationID; ?>" class="location-s__btn btn-default">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo $buttonTekst; ?>
                            </a>
                        </div>
                        <div class="location-s__col">
                            <div class="location-s__label"><?php _e('Of selecteer een andere locatie', 'theme') ?></div>
                            <div class="select-wrap">
                                <select name="locationSelect" class="_select">
                                    <option value="#" selected><?php _e('Selecteer een locatie', 'theme') ?></option>
                                    <?php  
                                        foreach(get_locaties(-1) as $locatieID){
                                            echo "<option value='". get_permalink($locatieID) ."'>". get_the_title($locatieID) ."</option>";  
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="location-s__col location-s__col-2">

                    <div id="map-2" class="location-s__map" 
                     data-mark-position-lat="<?php the_field( 'latitude' ); ?>"
                     data-mark-position-lng="<?php the_field( 'longitude' ); ?>"
                     data-center-lat="<?php the_field( 'latitude' ); ?>"
                     data-center-lng="<?php the_field( 'longitude' ); ?>"
                    ></div>

                    <script>

                   

                    // document.addEventListener("DOMContentLoaded", function(event) { 
                    //     initMapWithLocation ("#map-lc");
                    // }); 

                    </script>

                </div>
            </div>
        </section>

        <section class="available-tests">
            <div class="container">
                <h4 class="available-tests__title title-4"><?php _e('Beschikbare testen', 'theme') ?></h4>
                <ul class="available-tests__list">
                   <?php if ( get_field( 'beperkte_plekken_beschikbaar' ) == 1 ): ?>
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
                             <?php echo $buttonTekst; ?>
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
                               <?php _e('per test', 'theme') ?>*
                           </div>
                           <div class="available-tests-card__col-3">
                             <?php $serviceID = get_field('service_id'); ?>
                               <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo $serviceID; ?>&loc_id=<?php echo $locationID; ?>" class="available-tests-card__btn btn-default">
                          <i class="fas fa-calendar-alt"></i>
                          <?php echo $buttonTekst; ?>
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

      <?php if( have_rows('locatie_pagina', 'option') ): while( have_rows('locatie_pagina', 'option') ): the_row(); ?>
      <?php if( have_rows('hoe_gaan_wij_te_werk') ): while( have_rows('hoe_gaan_wij_te_werk') ): the_row(); ?>
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
      <?php endwhile; endif; ?>
      <?php endwhile; endif; ?>

      <?php get_template_part('acf-templates/veelgestelde_vragen'); ?>

      <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>

		<!-- <div class="container">
			<div class="trustpilot-widget">
				<div class="trustpilot-widget__logo">
					<img src="<?php bloginfo('template_url'); ?>/img/logo/trustpilot-logo.png" alt="">
				</div>
				<div class="trustpilot-widget__title">
					widget
				</div>
			</div>
		</div> -->

	</main>

<?php get_footer(); ?>