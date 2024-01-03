<?php if( have_rows('footer', 'option') ): while( have_rows('footer', 'option') ): the_row(); ?>
<!-- == FOOTER ================== -->
   <footer class="footer">
       <div class="container">
           <div class="footer__body">
               <div class="footer__col footer__col-1">
                   <div class="footer__logo">
                       <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                           <img src="<?php bloginfo('template_url'); ?>/img/logo/logo-black.png" alt="SpeedCovidTest">
                       </a>
                   </div>
                   <div class="footer__text text-content">
                       <?php the_sub_field( 'over_speedcovidtest' ); ?> 
                   </div>
                   <ul class="social">
                       <?php if( have_rows('socials') ): while( have_rows('socials') ): the_row(); ?>
                       <li>
                          <a href="<?php the_sub_field( 'social_url' ); ?>">
                              <i class="fab fa-<?php the_sub_field( 'icon' ); ?>"></i>
                          </a>
                      </li>
                       <?php endwhile; endif; ?>
                   </ul>
                   <div class="rating rating-footer">
                        <!-- TrustBox widget - Mini -->
                        <div class="trustpilot-widget" style="margin-left: -25px; margin-top: 15px;" data-locale="nl-NL" data-template-id="53aa8807dec7e10d38f59f32" data-businessunit-id="5ffdd6f8c37c02000100c53b" data-style-height="150px" data-style-width="100%" data-theme="light">
                          <a href="https://nl.trustpilot.com/review/speedcovidtest.nl" target="_blank" rel="noopener">Trustpilot</a>
                        </div>
                        <!-- End TrustBox widget -->
                    </div>
                    <style>
                       .rating-footer #tp-widget-wrapper { margin-left: 0 !important; margin-top: 15px !important; }
                    </style>
               </div>
               <?php if( have_rows('menus') ): $a = 1; while( have_rows('menus') ): $a++; the_row(); ?>
               <div class="footer__col footer__col-<?php echo $a; ?>">
                   <a class="footer__title"><?php the_sub_field( 'titel' ); ?></a>
                   <ul class="footer__list">
                       <?php if( have_rows('menu_items') ): while( have_rows('menu_items') ): the_row(); ?>
                       <li>
                          <?php $items = get_sub_field( 'items' ); ?>
                          <?php if ( $items ) { ?>
                             <a href="<?php echo $items['url']; ?>" target="<?php echo $items['target']; ?>"><?php echo $items['title']; ?></a>
                          <?php } ?>
                      </li>
                       <?php endwhile; endif; ?>
                   </ul>
               </div>
               <?php endwhile; endif; ?>
               <?php 
               
               // Fields have the be declared here, because they do not work in another loop
                $paymentProvidersImg = get_sub_field('betaalmogelijkheden');
               
               ?>
               <?php if( have_rows('contact') ): while( have_rows('contact') ): the_row(); ?>
               <div class="footer__col footer__col-4">
                   <a class="footer__title">Contact</a>
                   <ul class="footer__contact">
                       <li>
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                               <i class="fas fa-globe"></i>
                               speedcovidtest.nl
                           </a>
                       </li>
                       <li>
                           <a href="mailto:<?php the_sub_field( 'e-mailadres' ); ?>">
                               <i class="fas fa-envelope"></i>
                               <?php the_sub_field( 'e-mailadres' ); ?>
                           </a>
                       </li>
                       <li>
                           <a href="tel:<?php the_sub_field( 'telefoonnummer' ); ?>">
                               <i class="fas fa-phone"></i>
                               <?php the_sub_field( 'telefoonnummer' ); ?>
                           </a>
                       </li>
                   </ul>
                   <a class="footer__btn btn-default " href="<?php the_field('afspraak_maken_url', 'options'); ?>">
                       <i class="fas fa-calendar-alt"></i>
                       <?php _e('Afspraak maken', 'theme') ?>
                   </a>
                   <a class="locations-b__footer-btn" style="min-width: 0; margin-bottom: 20px;" href="<?php if (ICL_LANGUAGE_CODE == "nl") { echo 'https://speedcovidtest.nl/?subject=Uitslag%20nodig#formulier'; } else {
    echo 'https://speedcovidtest.nl/en/?subject=Result%20needed#formulier'; } ?>"><i class="fas fa-question-circle"></i> <?php _e( 'Uitslag nodig?', 'speedcovidtest'); ?></a>

                   <div class="footer__title"><?php _e('Betaal veilig met', 'theme') ?></div>
                   <ul class="footer__payment">
                       <li>
                           <img src="<?php echo $paymentProvidersImg['url'] ?>" alt="<?php echo $paymentProvidersImg['alt'] ?>">
                       </li>
                   </ul>
               </div>
               <?php endwhile; endif; ?>
           </div>
           <div class="footer__copy">
               <?php the_sub_field( 'copyright_text' ); ?>
           </div>
       </div>
   </footer>
   <!-- == // FOOTER ================== -->
<?php endwhile; endif; ?>

<div class="uitslag-btn">
   <a class="locations-b__footer-btn" href="<?php if (ICL_LANGUAGE_CODE == "nl") { echo 'https://speedcovidtest.nl/?subject=Uitslag%20nodig#formulier'; } else {
    echo 'https://speedcovidtest.nl/en/?subject=Result%20needed#formulier'; } ?>"><i class="fas fa-question-circle"></i> <?php _e( 'Uitslag nodig?', 'speedcovidtest'); ?></a>
</div>

<style>
.uitslag-btn { background: #fff; box-shadow: 0 -2px 5px 0 rgba(0,0,0,0.07); position: fixed; bottom: 0; left: 0; width: 100%; z-index: 999; padding: 10px; text-align: center; }
.uitslag-btn a { background: #1B96C6; color: #fff; min-width: 0; }
</style>

<style type="text/css" id="wp-custom-css">
.cn-button.bootstrap {
    color: #fff;
    background: #43B91F;
    font-weight: 600;
}
.large {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    min-height: 52px;
    border-radius: 5px;
    border: 1px solid rgba(21,52,82,.35);
    background-color: #fff;
    color: #06113a;
    font-size: 16px;
    font-weight: 400;
    width: 100%;
}
.gfield_select {
    background-color: #fff;
		font-size: 16px;
    font-weight: 400;
	 	color: #06113a;
}
.gform_button {
    background-color: #1b96c6;
    box-shadow: 0 2px 0 #177fa8;
    width: 100%;
    min-height: 54px;
		border-radius: 3px;
		color: #fff;
		font-weight: 700;
}	
</style>

<?php wp_footer(); ?>

<!-- TODO: Add this script to the npm library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />

<script>
   $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 750) {
          $('.uitslag-btn').fadeOut();
        } else {
          $('.uitslag-btn').fadeIn();
        }
      });

      
  $( document ).ready(function() {
        jQuery('.header-card__title').matchHeight();
        jQuery('.header-card__list').matchHeight();
        jQuery('.header-card__time').matchHeight();
    }); 

    function setNederland(map){
	    map.setCenter({ lat: 52.092876, lng: 5.104480 });
    }

    function initPartnerSlider(){
        jQuery('.label-slider').slick({
            dots: false,
            infinite: false,
            speed: 500,
            slidesToShow: 4,
            centerMode: false,
            pauseOnFocus:   false,
            pauseOnHover:   false,
            autoPlay: false,
            prevArrow: '<span class="slick-prev"><i class="fa fa-angle-left"></i></span>',
            nextArrow: '<span class="slick-next"><i class="fa fa-angle-right"></i></span>',
            arrows: true,
            slidesToScroll: 1,
            responsive: [
                {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
                },
                {
                breakpoint: 900,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                }
            ]
        });
    }
</script>

</body>
</html>