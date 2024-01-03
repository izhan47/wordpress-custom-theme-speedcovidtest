<?php if (have_rows('footer', 'option')): while (have_rows('footer', 'option')): the_row(); ?>
<!-- == FOOTER ================== -->
   <footer class="footer">
       <div class="container">
           <div class="footer__body">
               <div class="footer__col footer__col-1">
                   <div class="footer__logo">
                       <a href="<?php echo esc_url(home_url('/')); ?>">
                           <img src="<?php bloginfo('template_url'); ?>/img/logo/logo-black.png" alt="SpeedCovidTest">
                       </a>
                   </div>
                   <div class="footer__text text-content">
                       <?php the_sub_field('over_speedcovidtest'); ?> 
                   </div>
                   <ul class="social">
                       <?php if (have_rows('socials')): while (have_rows('socials')): the_row(); ?>
                       <li>
                          <a href="<?php the_sub_field('social_url'); ?>">
                              <i class="fab fa-<?php the_sub_field('icon'); ?>"></i>
                          </a>
                      </li>
                       <?php endwhile; endif; ?>
                       <li>
                          <a href="https://www.speedcovidtest.nl/coronacheck-app">
                              <img style="width: 25px;" src="https://speedcovidtest.nl/wp-content/themes/speedcovidtest/img/photo/coronacheckapp@2x.png" alt="CoronaCheck-app">
                          </a>
                      </li>
                       
                   </ul>
                   <div class="rating rating-footer">
                        <!-- TrustBox widget - Mini -->
                        <div class="trustpilot-widget" style="margin-left: -25px; margin-top: 15px;" data-locale="nl-NL" data-template-id="53aa8807dec7e10d38f59f32" data-businessunit-id="5ffdd6f8c37c02000100c53b" data-style-height="150px" data-style-width="100%" data-theme="light">
                          <a href="https://nl.trustpilot.com/review/speedcovidtest.nl" target="_blank" rel="noopener">Trustpilot</a>
                        </div>
                        <!-- End TrustBox widget -->
                    </div>
               </div>
               <?php if (have_rows('menus')): $a = 1; while (have_rows('menus')): $a++; the_row(); ?>
               <div class="footer__col footer__col-<?php echo $a; ?>">
                   <a class="footer__title"><?php the_sub_field('titel'); ?></a>
                   <ul class="footer__list">
                       <?php if (have_rows('menu_items')): while (have_rows('menu_items')): the_row(); ?>
                       <li>
                          <?php $items = get_sub_field('items'); ?>
                          <?php if ($items) { ?>
                             <a href="<?php echo $items['url']; ?>" <?php if($items['target']): ?>target="<?php echo $items['target']; ?>"<?php endif; ?>><?php echo $items['title']; ?></a>
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
               <?php if (have_rows('contact')): while (have_rows('contact')): the_row(); ?>
               <div class="footer__col footer__col-4">
                   <a class="footer__title">Contact</a>
                   <ul class="footer__contact">
                       <li>
                           <a href="<?php echo esc_url(home_url('/')); ?>">
                               <i class="fas fa-globe"></i>
                               speedcovidtest.nl
                           </a>
                       </li>
                       <li>
                           <a href="mailto:<?php the_sub_field('e-mailadres'); ?>">
                               <i class="fas fa-envelope"></i>
                               <?php the_sub_field('e-mailadres'); ?>
                           </a>
                       </li>
                       <li>
                           <a href="tel:<?php the_sub_field('telefoonnummer'); ?>">
                               <i class="fas fa-phone"></i>
                               <?php the_sub_field('telefoonnummer'); ?>
                           </a>
                       </li>
                   </ul>
                   <a class="footer__btn btn-default " href="<?php the_field('afspraak_maken_url', 'options'); ?>">
                       <i class="fas fa-calendar-alt"></i>
                       <?php _e('Afspraak maken', 'theme') ?>
                   </a>
                   <a class="locations-b__footer-btn" style="min-width: 0; margin-bottom: 20px;" href="<?php if (ICL_LANGUAGE_CODE == "nl") {
                   echo 'https://speedcovidtest.nl/?subject=Uitslag%20nodig#formulier';
               } else {
                   echo 'https://speedcovidtest.nl/en/?subject=Result%20needed#formulier';
               } ?>"><i class="fas fa-question-circle"></i> <?php _e('Uitslag nodig?', 'speedcovidtest'); ?></a>

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
               <?php the_sub_field('copyright_text'); ?>
           </div>
       </div>
   </footer>
   <!-- == // FOOTER ================== -->
<?php endwhile; endif; ?>

<div class="uitslag-btn realtime-bar">
   <a class="locations-b__footer-btn" href="<?php if (ICL_LANGUAGE_CODE == "nl") { echo 'https://speedcovidtest.nl/?subject=Uitslag%20nodig#formulier'; } else { echo 'https://speedcovidtest.nl/en/?subject=Result%20needed#formulier'; } ?>"><i class="fas fa-question-circle"></i> <?php _e('Uitslag nodig?', 'speedcovidtest'); ?></a>
   <div class="realtime-bookings" style="opacity: 0;">
        <div class="information">
            <span class="blob"></span> <span class="currently"><?php _e('Meerdere', 'theme') ?></span> <?php _e('mensen zijn nu aan het boeken vanuit', 'theme') ?> <span class="stad"></span> 
        </div>
        <div class="cta-btn">
            <a href="<?php the_field('afspraak_maken_url', 'options') ?>" class="afspraak-maken"><?php _e('Maak nu een afspraak', 'theme') ?></a> 
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<!-- TODO: Add this script to the npm library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />

<?php 
//hide footer scripts
if (!isset($_GET['footer_test'])) {
?>

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

        if ($(window).width() < 960) {
            map.setZoom(6);
	    }
    }

    function initPartnerSlider(){
        jQuery('.label-slider').slick({
            dots: false,
            infinite: true,
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

    /* Realtime bar */
    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);

        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        }
        else{
            begin += 2;
            var end = document.cookie.indexOf(";", begin);

            if (end == -1) {
                end = dc.length;
            }
        }

        return decodeURI(dc.substring(begin + prefix.length, end));
    } 

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function checkAmountOfPeopleBooking(city){
        if(city.length < 1){
            return false;
        }

        $.ajax({url: theme_location + "/ajax/booking-lookup.php", type: "post", data: {city: city}, success: function(result){
            if(result != "false"){
                // Call returned succesfully
                if(result){
                    $('.realtime-bookings .currently').html(result);
                }
            }
        }});
    }

    var lastScrollTop = 0;
    var barIsShown = false;

    $(window).scroll(function(event){
    var st = $(this).scrollTop();
    if (st > lastScrollTop){
        if(barIsShown && !$("uitslag-btn.realtime-bar").hasClass("shown")){
            $(".uitslag-btn.realtime-bar").addClass("shown");
        }
    } else {
        // upscroll code
        if(barIsShown && $(".uitslag-btn.realtime-bar").hasClass("shown")){
            $(".uitslag-btn.realtime-bar").removeClass("shown");
        }
    }
    lastScrollTop = st;
    });

    

    $( document ).ready(function() {
        var city = getCookie("sct_city");

        

        if (city == null) {
            // do cookie doesn't exist stuff;
            $.ajax({url: "https://pro.ip-api.com/json/?fields=status,city,country&key=CY38DxO0tNCm4ya", success: function(result){
                if(result.status === "success" && result.country === "Netherlands"){
                    // Call returned succesfully

                    if(result.city.length){
                        // City is not empty

                        // Fetch the amount of people booking for that city
                        checkAmountOfPeopleBooking(result.city);

                        // Save the city in a cookie
                        setCookie("sct_city", result.city, 1);
       
                        setTimeout(function(){
                        // Save the the amount of people booking from that city for a short time
                            setCookie("sct_booking_now", $('.realtime-bookings .currently').html(), 0.2);
                        }, 3000);

                        // Show city in the front-end
                        $('.realtime-bookings .stad').html(result.city);

                        setTimeout(function(){
                            // Show the bar    
                            barIsShown = true;
                            $(".uitslag-btn.realtime-bar").addClass("shown");
                        }, 1000);

                        

                        $('.realtime-bookings').css('opacity', '1');

                    }else{
                        $('.realtime-bookings').hide();
                    }
                }else{
                    $('.realtime-bookings').hide();
                }
            }});

           
        }
        else {
            // do cookie exists stuff
            var city = getCookie("sct_city");

            // Check if we have a recent indication of how many bookers there were for your city
            var bookingNow = getCookie("sct_booking_now");
            
            if(bookingNow != null){
                // We have recent information about people booking right now, so show it to the user
                $('.realtime-bookings .currently').html(bookingNow);
            }else{
                // No recent information found over the amount of bookers, so fetch new information
                checkAmountOfPeopleBooking(city);

                setTimeout(function(){
                    // Save the the amount of people booking from that city for a short time
                    setCookie("sct_booking_now", $('.realtime-bookings .currently').html(), 0.2);
                }, 3000);
            }

            if(city){
                // Show city set in Cookie to the user
                $('.realtime-bookings .stad').html(city);

                $('.realtime-bookings').css('opacity', '1');

                setTimeout(function(){
                    // Show the bar    
                    barIsShown = true;
                    $(".uitslag-btn.realtime-bar").addClass("shown");
                }, 1000);
            }else{
                $('.realtime-bookings').hide();
            }

        }
    }); 
</script>

<?php 
//hide footer scripts
}
?>

</body>
</html>