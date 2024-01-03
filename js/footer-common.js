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