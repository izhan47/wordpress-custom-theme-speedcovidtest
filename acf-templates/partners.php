<section class="label-slider-outer">
    <div class="container">

		<h3 class="partner-title">Partners</h3>

		<div class="label-slider">

			<?php foreach(getPartners(-1) as $partner): ?>

				<?php if(get_the_post_thumbnail_url($partner)): ?>

					<?php
						$thumbnail_id = get_post_thumbnail_id($partner);
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);  
					?>

					<div class="single-label">

						<a target="_blank" href="<?php echo get_field('partner_website_url', $partner) ?>">
						
							<div class="single-label-wrap">
								<img src="<?php echo get_the_post_thumbnail_url($partner, 'medium') ?>" alt="<?php echo $alt ?>" />
							</div>     

						</a>  
					
					</div>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>
    </div>
</section>

<style>
 .label-slider .single-label a img {
	 transition: all 0.25s ease-in-out;
}

.slick-list, .slick-slider {
    position: relative;
    display: block;
}

 .label-slider .single-label a:hover img {
	 opacity: 0.6;
}
 @media (max-width: 600px) {
	 .label-slider .single-label {
		 max-width: unset;
		 display: block !important;
		 margin: auto;
	}
}
 .label-slider .single-label-wrap {
	 height: 130px;
	 width: 100%;
	 position: relative;
	 margin-right: 20px;
	 margin-bottom: 10px;
}
 .label-slider .single-label-wrap img {
	 max-height: 70%;
	 max-width: 70%;
	 width: auto;
	 height: auto;
	 position: absolute;
	 top: 50%;
	 left: 50%;
	 margin: auto;
	 transform: translate(-50%, -50%);
}
 .label-slider .slick-slider {
	 margin-bottom: 30px;
}
 /* .label-slider .slick-slide {
	 padding: 0 15px;
}
 .label-slider .slick-list {
	 margin: 0 -15px;
} */
 .label-slider .slick-dots {
	 display: flex;
	 justify-content: center;
	 margin: 0;
	 padding: 1rem 0;
	 list-style-type: none;
}
 .label-slider .slick-dots li {
	 margin: 0 0.25rem;
}
 .label-slider .slick-dots li:before {
	 display: none;
}
 .label-slider .slick-dots button {
	 display: block;
	 width: 1rem;
	 height: 1rem;
	 padding: 0;
	 border: none;
	 background-color: #d7d7d7;
	 text-indent: -9999px;
}
 .label-slider .slick-dots li.slick-active button {
	 background-color: #e63d43;
}

.partner-title{
	color: #06113a;
	font-size: 32px;
    line-height: 36px;
    margin-bottom: 20px;
    font-weight: 700;
    transition: all .3s ease;
    display: block;
	text-align: center;
}
.label-slider-outer{
	padding: 60px 0px;
	width: 100%;
	display: block;
}
.slick-slider .slick-arrow {
	 position: absolute;
	 top: calc(50% - 4px);
	 -webkit-transform: translateY(-50%);
	 -ms-transform: translateY(-50%);
	 -o-transform: translateY(-50%);
	 transform: translateY(-50%);
	 -webkit-box-align: center;
	 -ms-flex-align: center;
	 align-items: center;
	 z-index: 1;
	 cursor: pointer;
}
 .slick-slider .slick-arrow .svg {
	 color: #919191;
	 font-size: 70px;
}
 .slick-slider .slick-arrow.slick-next {
	 right: -45px;
}
 .slick-slider .slick-arrow.slick-prev {
	 left: -45px;
}

.slick-arrow .svg-inline--fa{
	font-size: 35px;
}

@media(max-width: 1500px){
	.slick-slider .slick-arrow.slick-next {
	 right: -0px;
	}

 	.slick-slider .slick-arrow.slick-prev {
	 left: -0px;
	}
}
</style>

<script>
	document.addEventListener("DOMContentLoaded", function(event) { 
		setTimeout(function(){
			initPartnerSlider();
		}, 400)
	});

	function initPartnerSlider(){
        jQuery('.label-slider').slick({
            dots: false,
            infinite: false,
            speed: 500,
            slidesToShow: 5, 
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