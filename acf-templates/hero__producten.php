<?php
$serviceID = get_field('service_id'); 
$vestigingID = get_sub_field('vestiging');
$plaats = get_field('plaats', $vestigingID); 
$locationID = get_field('bookly_id', $vestigingID);

if( have_rows('producten_hero', 'option') ): while( have_rows('producten_hero', 'option') ): the_row();
$landelijkCoronaTestCentrum = get_sub_field('landelijk_corona_testcentrum');
$perTest = get_sub_field('per_test');
$buttonTekst = get_sub_field('button_tekst');
$uitslagIn = get_sub_field('uitslag_in');
$meerInformatie = get_sub_field('meer_informatie');
endwhile; endif; ?>

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
      <?php if( have_rows('producten_repeater') ): $prods = 0; while( have_rows('producten_repeater') ): the_row(); $prods++; ?>
      <?php endwhile; endif; ?>
         <ul class="promo-header__list <?php if($prods < 5): echo "four"; else: echo "five"; endif; ?>">
            <?php if( have_rows('producten_repeater') ): while( have_rows('producten_repeater') ): the_row(); ?>
            <?php
               $post_object = get_sub_field( 'product_object' ); 
               if ( $post_object ): 
               $post = $post_object; 
               setup_postdata( $post ); 
            ?>
            <?php if ( get_sub_field( 'overschrijf_inhoud' ) == 1 ): ?>
            <?php if( have_rows('inhoud_overschrijven') ): while( have_rows('inhoud_overschrijven') ): the_row(); ?>
            <li>
               <div class="header-card">
                  <?php if ( get_sub_field( 'voeg_label_toe' ) == 1 ): ?>
                  <div class="header-card__label label-icon">
                     <i class="fas fa-<?php the_sub_field( 'voeg_label_toe_icon' ); ?>"></i>
                     <?php the_sub_field( 'label_tekst' ); ?>
                  </div>
                  <?php endif; ?>
                  <h3 class="header-card__title">
                     <?php the_title(); ?> <?php echo $plaats; ?>
                  </h3>
                  <div class="header-card__price-wrap">
                     <?php if(get_sub_field('oude_prijs')): ?><span class="old-price">€<?php the_sub_field( 'oude_prijs' ); ?></span><?php endif; ?>
                     <span class="price">€<?php the_field( 'prijs' ); ?></span>
                     <?php echo $perTest; ?>
                  </div>
                  <ul class="header-card__list">
                     <?php if( have_rows('checklist') ): while( have_rows('checklist') ): the_row(); ?>
                     <li>
                        <div class="header-card__disc">
                           <i class="fas fa-check"></i>
                        </div>
                        <?php the_sub_field( 'item' ); ?>
                     </li>
                     <?php endwhile; endif; ?>
                  </ul>
                  <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo get_field('service_id'); ?>" class="header-card__btn btn-default">
                     <i class="fas fa-calendar-alt"></i>
                     <?php echo $buttonTekst; ?>
                  </a>
                  <a href="<?php the_sub_field( 'meer_informatie' ); ?>" class="header-card__link">
                     <?php echo $meerInformatie; ?>
                  </a>
                  <div class="header-card__time">
                     <i class="far fa-clock"></i>
                     <div class="inline">
                        <?php the_sub_field( 'uitslag_in' ); ?>
                     </div>
                  </div>
                  <?php get_template_part('global-templates/coronacheck-app'); ?>        
               </div>
            </li>
            <?php endwhile; endif; ?>
            <?php else: ?>
            <li>
               <div class="header-card">
                  <?php if ( get_sub_field( 'voeg_label_toe' ) == 1 ): ?>
                  <div class="header-card__label label-icon">
                     <i class="fas fa-<?php the_sub_field( 'voeg_label_toe_icon' ); ?>"></i>
                     <?php the_sub_field( 'label_tekst' ); ?>
                  </div>
                  <?php endif; ?>
                  <h3 class="header-card__title">
                     <?php the_title(); ?> <?php echo $plaats; ?>
                  </h3>
                  <div class="header-card__price-wrap">
                     <?php if(get_field('oude_prijs')): ?><span class="old-price">€<?php the_field( 'oude_prijs' ); ?></span><?php endif; ?>
                     <span class="price">€<?php the_field( 'prijs' ); ?></span>
                     <?php echo $perTest; ?>
                  </div>
                  <ul class="header-card__list">
                     <?php if( have_rows('checklist') ): while( have_rows('checklist') ): the_row(); ?>
                     <li>
                        <div class="header-card__disc">
                           <i class="fas fa-check"></i>
                        </div>
                        <?php the_sub_field('item'); ?>
                     </li>
                     <?php endwhile; endif; ?>
                  </ul>
                  <a href="<?php the_field('afspraak_maken_url', 'options'); ?>?service_id=<?php echo get_field('service_id'); ?>" class="header-card__btn btn-default">
                     <i class="fas fa-calendar-alt"></i>
                     <?php echo $buttonTekst; ?>
                  </a>
                  <a href="<?php the_field( 'meer_informatie' ); ?>" class="header-card__link">
                     <?php echo $meerInformatie; ?>
                  </a>
                  <div class="header-card__time">
                     <i class="far fa-clock"></i>
                     <div class="inline">
                        <?php the_field( 'uitslag_in' ); ?>
                     </div>
                  </div>
                  <?php get_template_part('global-templates/coronacheck-app'); ?>
               </div>
            </li>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; endif; ?>
         </ul>
      </div>
      <div class="promo-header__row-3">
         <?php if( have_rows('producten_hero', 'option') ): while( have_rows('producten_hero', 'option') ): the_row(); ?>
            <?php if( have_rows('usps') ): while( have_rows('usps') ): the_row(); ?>
            <div class="promo-header__advantage">
               <div class="promo-header__advantage-icon">
                  <i class="fas fa-<?php the_sub_field( 'icon' ); ?>"></i>
               </div>
               <?php the_sub_field( 'usp' ); ?>
            </div>
            <?php endwhile; endif; ?>
         <?php endwhile; endif; ?>
      </div>
   </div>
</section>

<section style="margin: 80px 0;">
   <div class="container">
      <div class="col-12">
         <!-- TrustBox widget - Carousel --> <div class="trustpilot-widget" data-locale="nl-NL" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="5ffdd6f8c37c02000100c53b" data-style-height="140px" data-style-width="100%" data-theme="light" data-stars="4,5" data-review-languages="nl">   <a href="https://nl.trustpilot.com/review/speedcovidtest.nl" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->
      </div>
   </div>
</section>