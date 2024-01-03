<?php get_header(); ?>

<?php
$serviceID = get_field('service_id');

if (have_rows('producten_hero', 'option')) : while (have_rows('producten_hero', 'option')) : the_row();
      $landelijkCoronaTestCentrum = get_sub_field('landelijk_corona_testcentrum');
      $perTest = get_sub_field('per_test');
      $buttonTekst = get_sub_field('button_tekst');
      $uitslagIn = get_sub_field('uitslag_in');
      $meerInformatie = get_sub_field('meer_informatie');
      $plaats = get_sub_field('plaats');
   endwhile;
endif; ?>

<main class="_page home-page">
   <?php if (have_rows('hero__producten')) : while (have_rows('hero__producten')) : the_row(); ?>
         <section class="promo-header">
            <div class="promo-header__bg ibg">
               <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="promo-header__body container">
               <div class="promo-header__row-1">
                  <div class="promo-header__suptitle suptitle-icon">
                     <i class="fas fa-virus"></i>
                     <?php echo $landelijkCoronaTestCentrum; ?>
                  </div>
                  <h1 class="promo-header__title title-1">
                     <?php the_sub_field('titel'); ?>
                  </h1>
                  <div class="promo-header__subtitle">
                     <?php the_sub_field('subtitel'); ?>
                  </div>
               </div>

               <div class="promo-header__row-2">

                  <?php if (have_rows('producten_repeater')) : $prods = 0;
                     while (have_rows('producten_repeater')) : the_row();
                        $prods++; ?>
                  <?php endwhile;
                  endif; ?>

                  <ul class="promo-header__list <?php if ($prods < 5) : echo "four";
                                                else : echo "five";
                                                endif; ?>">
                     <?php if (have_rows('producten_repeater')) : while (have_rows('producten_repeater')) : the_row(); ?>
                           <?php
                           $post_object = get_sub_field('product_object');
                           if ($post_object) :
                              $post = $post_object;
                              setup_postdata($post);
                           ?>
                              <?php if (get_sub_field('overschrijf_inhoud') == 1) : ?>
                                 <?php if (have_rows('inhoud_overschrijven')) : while (have_rows('inhoud_overschrijven')) : the_row(); ?>
                                       <li>
                                          <div class="header-card">
                                             <?php if (get_sub_field('voeg_label_toe') == 1) : ?>
                                                <div class="header-card__label label-icon">
                                                   <i class="fas fa-<?php the_sub_field('voeg_label_toe_icon'); ?>"></i>
                                                   <?php the_sub_field('label_tekst'); ?>
                                                </div>
                                             <?php endif; ?>
                                             <h3 class="header-card__title">
                                                <?php the_title(); ?> <?php echo $plaats; ?>
                                             </h3>
                                             <div class="header-card__price-wrap">
                                                <?php if (get_sub_field('oude_prijs')) : ?><span class="old-price">€<?php the_sub_field('oude_prijs'); ?></span><?php endif; ?>
                                                <span class="price">€<?php the_field('prijs'); ?></span>
                                                <?php echo $perTest; ?>
                                             </div>
                                             <ul class="header-card__list">
                                                <?php if (have_rows('checklist')) : while (have_rows('checklist')) : the_row(); ?>
                                                      <li>
                                                         <div class="header-card__disc">
                                                            <i class="fas fa-check"></i>
                                                         </div>
                                                         <?php the_sub_field('item'); ?>
                                                      </li>
                                                <?php endwhile;
                                                endif; ?>
                                             </ul>
                                             <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo get_field('service_id'); ?>" class="header-card__btn btn-default">
                                                <i class="fas fa-calendar-alt"></i>
                                                <?php echo $buttonTekst; ?>
                                             </a>
                                             <a href="<?php the_sub_field('meer_informatie'); ?>" class="header-card__link">
                                                <?php echo $meerInformatie; ?>
                                             </a>
                                             <div class="header-card__time">
                                                <i class="far fa-clock"></i>
                                                <div class="inline">
                                                   <?php the_sub_field('uitslag_in'); ?>
                                                </div>
                                             </div>
                                             <?php get_template_part('global-templates/coronacheck-app'); ?>
                                          </div>
                                       </li>
                                 <?php endwhile;
                                 endif; ?>
                              <?php else : ?>
                                 <li>
                                    <div class="header-card">
                                       <?php if (get_sub_field('voeg_label_toe') == 1) : ?>
                                          <div class="header-card__label label-icon">
                                             <i class="fas fa-<?php the_sub_field('voeg_label_toe_icon'); ?>"></i>
                                             <?php the_sub_field('label_tekst'); ?>
                                          </div>
                                       <?php endif; ?>
                                       <h3 class="header-card__title">
                                          <?php the_title(); ?> <?php echo $plaats; ?>
                                       </h3>
                                       <div class="header-card__price-wrap">
                                          <?php if (get_field('oude_prijs')) : ?><span class="old-price">€<?php the_field('oude_prijs'); ?></span><?php endif; ?>
                                          <span class="price">€<?php the_field('prijs'); ?></span>
                                          <?php echo $perTest; ?>
                                       </div>
                                       <ul class="header-card__list">
                                          <?php if (have_rows('checklist')) : while (have_rows('checklist')) : the_row(); ?>
                                                <li>
                                                   <div class="header-card__disc">
                                                      <i class="fas fa-check"></i>
                                                   </div>
                                                   <?php the_sub_field('item'); ?>
                                                </li>
                                          <?php endwhile;
                                          endif; ?>
                                       </ul>
                                       <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo get_field('service_id'); ?>" class="header-card__btn btn-default">
                                          <i class="fas fa-calendar-alt"></i>
                                          <?php echo $buttonTekst; ?>
                                       </a>
                                       <a href="<?php the_field('meer_informatie'); ?>" class="header-card__link">
                                          <?php echo $meerInformatie; ?>
                                       </a>
                                       <div class="header-card__time">
                                          <i class="far fa-clock"></i>
                                          <div class="inline">
                                             <?php the_field('uitslag_in'); ?>
                                          </div>
                                       </div>
                                       <?php get_template_part('global-templates/coronacheck-app'); ?>
                                    </div>
                                 </li>
                              <?php endif; ?>
                              <?php wp_reset_postdata(); ?>
                           <?php endif; ?>
                     <?php endwhile;
                     endif; ?>
                  </ul>
               </div>
               <div class="promo-header__row-3">
                  <?php if (have_rows('producten_hero', 'option')) : while (have_rows('producten_hero', 'option')) : the_row(); ?>
                        <?php if (have_rows('usps')) : while (have_rows('usps')) : the_row(); ?>
                              <div class="promo-header__advantage">
                                 <div class="promo-header__advantage-icon">
                                    <i class="fas fa-<?php the_sub_field('icon'); ?>"></i>
                                 </div>
                                 <?php the_sub_field('usp'); ?>
                              </div>
                        <?php endwhile;
                        endif; ?>
                  <?php endwhile;
                  endif; ?>
               </div>
            </div>
         </section>
   <?php endwhile;
   endif; ?>

   <div class="trust-pilot">
      <div class="container">
         <div class="col-12">
            <!-- TrustBox widget - Carousel -->
            <div class="trustpilot-widget" data-locale="nl-NL" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="5ffdd6f8c37c02000100c53b" data-style-height="140px" data-style-width="100%" data-theme="light" data-stars="4,5" data-review-languages="nl"> <a href="https://nl.trustpilot.com/review/speedcovidtest.nl" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->
         </div>
      </div>
   </div>

   <?php get_template_part('acf-templates/alle_locaties'); ?>

   <section class="location-footer">
      <div class="container">
         <div class="locations-b__footer">
            <div class="locations-b__footer-col locations-b__footer-col-1 text-content">
               <h2>Bescherming van persoonsgegevens</h2>
               <p>Je wilt graag dat jouw persoonsgegevens niet terechtkomen bij derden. Dan ben je bij de juiste testaanbieder terechtgekomen.</p>
               <p>SpeedCovidTest is als eerste testaanbieder van Nederland NEN 7510 gecertificeerd. Dit betekent dat SpeedCovidTest volgens de zeer strenge normen van NEN 7510 werkt op het gebied van informatiebeveiliging, speciaal voor de zorg- en welzijnssector.</p>
               <div class="locations-b__footer-address">
                  <i class="fas fa-lock"></i>
                  <div class="locations-b__footer-address-text-wrap">
                     <p><strong>NEN 7510 gecertificeerd</strong></p>
                  </div>
               </div>
            </div>
            <div class="locations-b__footer-col locations-b__footer-col-2 text-content">
               <h4>Voordelen NEN 7510 certificering:</h4>
               <ul>
                  <li>Medewerkers weten precies hoe om te gaan met privacygevoelige informatie</li>
                  <li>De ontwikkeling en continuïteit van de organisatie voor gegevensverwerking is geborgd</li>
                  <li>De organisatie toont aan dat er vertrouwelijk en integer wordt omgegaan met de patiëntgegevens</li>
               </ul>
            </div>
         </div>
      </div>
   </section>

   <?php if (have_rows('testen_voor_op_reis')) : while (have_rows('testen_voor_op_reis')) : the_row(); ?>
         <section class=" test-b">
            <div class="test-b__body container">
               <div class="test-b__col-1 text-content">
                  <h2 class="test-b__title title-3">
                     <i class="fas fa-plane"></i>
                     <?php the_sub_field('titel'); ?>
                  </h2>
                  <?php the_sub_field('tekst'); ?>
               </div>
               <div class="test-b__col-2">
                  <div class="test-b__img ibg">
                     <?php $afbeelding = get_sub_field('afbeelding'); ?>
                     <?php if ($afbeelding) { ?>
                        <?php echo wp_get_attachment_image($afbeelding, 'large'); ?>
                     <?php } ?>
                  </div>
                  <div class="test-b__title-2"><?php the_sub_field('internationaal_erkende_testen_titel'); ?></div>
                  <div class="test-b__list">
                     <?php if (have_rows('internationaal_erkende_testen')) : while (have_rows('internationaal_erkende_testen')) : the_row(); ?>
                           <?php $post_object = get_sub_field('testen'); ?>
                           <?php if ($post_object) : ?>
                              <?php $post = $post_object; ?>
                              <?php setup_postdata($post); ?>
                              <div class="test-b__list-item">
                                 <div class="test-b__list-item-flex-wrap">
                                    <div class="test-b__list-item-title"><a href="<?php the_field('meer_informatie'); ?>"><?php the_title(); ?></a></div>
                                    <div class="test-b__list-item-text">
                                       <div class="inline">
                                          <i class="far fa-clock"></i>
                                          <?php the_field('uitslag_in'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <a href="<?php the_field('meer_informatie'); ?>">
                                    <div class="test-b__list-item-price">
                                       <?php if (get_sub_field('oude_prijs')) : ?><span class="old-price">€<?php the_sub_field('oude_prijs'); ?></span><?php endif; ?>
                                       <span class="price">€<?php the_field('prijs'); ?></span>
                                    </div>
                                    <span class="test-b__list-item-link btn-default">
                                       <i class="fas fa-chevron-circle-right"></i>
                                    </span>
                                 </a>
                              </div>
                              <?php wp_reset_postdata(); ?>
                           <?php endif; ?>
                     <?php endwhile;
                     endif; ?>
                  </div>
               </div>
            </div>
         </section>
   <?php endwhile;
   endif; ?>

   <?php get_template_part('acf-templates/veelgestelde_vragen'); ?>

   <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>

   <?php if (have_rows('stappen_groep')) : while (have_rows('stappen_groep')) : the_row(); ?>
         <section class="how-do-we-work">
            <div class="container">
               <div class="how-do-we-work__intro horizontal text-content">
                  <?php the_sub_field('inleiding'); ?>
               </div>
               <div class="how-do-we-work__body">
                  <?php if (have_rows('stappen')) : $a = 0;
                     while (have_rows('stappen')) : $a++;
                        the_row(); ?>
                        <div class="how-do-we-work__item">
                           <div class="how-do-we-work__card">
                              <div class="how-do-we-work__num"><?php echo $a; ?></div>
                              <div class="how-do-we-work__title-card"><?php the_sub_field('titel'); ?></div>
                              <div class="how-do-we-work__text text-content">
                                 <?php the_sub_field('tekst'); ?>
                              </div>
                           </div>
                        </div>
                  <?php endwhile;
                  endif; ?>
               </div>
            </div>
         </section>
   <?php endwhile;
   endif; ?>

   <section id="contact" class="contact-news-b">
      <div class="contact-news-b__body container">
         <div class="contact-news-b__col-1">
            <h3 class="contact-form__title title-3" id="formulier">
               <i class="fas fa-envelope"></i> <?php _e('Contact', 'theme'); ?>
            </h3>
            <?php if (have_rows('contactformulier', 'options')) : while (have_rows('contactformulier', 'options')) : the_row(); ?><div class="text-content"><?php echo get_sub_field('tekst_&_formulier'); ?></div><?php endwhile; endif; ?>
         </div>
         <?php if (have_rows('nieuws', 'option')) : while (have_rows('nieuws', 'option')) : the_row(); ?>
               <div class="contact-news-b__col-2">
                  <div class="latest-news">
                     <h4 class="latest-news__title"><?php the_sub_field('titel_boven_nieuwsoverzicht'); ?></h4>

                     <ul class="latest-news__list">
                        <?php
                        $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3));
                        ?>
                        <?php if ($the_query->have_posts()) : ?>
                           <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                              <li>
                                 <a href="<?php the_permalink(); ?>" class="latest-news__item">
                                    <div class="latest-news__text-wrap">
                                       <div class="latest-news__item-title">
                                          <?php the_title(); ?>
                                       </div>
                                       <div class="latest-news__date"><?php _e('Geplaatst op', 'theme') ?> <?php the_time('j F Y'); ?></div>
                                       <span class="latest-news__link link link_blue"><?php the_sub_field('lees_verder_button_tekst'); ?></span>
                                    </div>
                                 </a>
                              </li>
                           <?php endwhile; ?>
                           <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                           <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                     </ul>
                     <a href="<?php get_post_type_archive_link('post'); ?>" class="latest-news__link-more link link_blue"><?php _e('Lees meer nieuws', 'theme') ?></a>
                  </div>
               </div>
         <?php endwhile;
         endif; ?>
      </div>
   </section>
</main>

<?php get_footer(); ?>