<!-- <?php if (have_rows('testen_voor_toegang')) : while (have_rows('testen_voor_toegang')) : the_row(); ?>
      <section style="margin-top: -30px; margin-bottom: 60px;">
         <div class="container">
            <div class="locations-b__footer">
            <?php if (have_rows('linkerzijde')) : while (have_rows('linkerzijde')) : the_row(); ?>
               <div class="locations-b__footer-col locations-b__footer-col-1 text-content">
                  <?php the_sub_field('tekst'); ?>
                  <div class="locations-b__footer-address">
                     <i class="fas fa-map-marker-alt"></i>
                     <div class="locations-b__footer-address-text-wrap">
                        <?php the_sub_field('adres'); ?>
                     </div>
                  </div>
                  <?php $button = get_sub_field('button'); ?>
                  <?php if ($button) { ?>
                  <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="locations-b__footer-btn" data-da="locations-b__footer,last,767.98">
                     <i class="fas fa-calendar-alt"></i>
                     <?php echo $button['title']; ?>
                  </a>
                  <?php } ?>
               </div>
               <?php endwhile;
               endif; ?>
               <div class="locations-b__footer-col locations-b__footer-col-2 text-content">
                  <?php the_sub_field('rechterzijde'); ?>
               </div>
            </div>
         </div>
      </section>
      <?php endwhile;
         endif; ?> -->
         <!-- <section class="free-testing">
			<div class="container">
				<h3 class="free-testing__title title-3">Gratis testen</h3>
				<div class="free-testing__body">
					<div class="free-testing__item">
						<a href="#" class="free-testing-card">
							<div class="free-testing-card__img ibg">
								<img src="<?php bloginfo('template_url'); ?>/img/photo/header-bg.jpg" alt="">
							</div>
							<div class="free-testing-card__text-wrap">
								<div class="free-testing-card__suptitle suptitle">Gratis testen</div> 
								<h5 class="free-testing-card__title">
									Voor werkgevers
								</h5>
								<div class="free-testing-card__text text-content">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vulputate risus id ultrices molestie. Quisque feugiat eros sit amet enim congue luctus. Morbi quis leo ac nisi aliquet lacinia sed at risus.
								</div>
								<span class="free-testing-card__link link">
									Meer informatie
								</span>
							</div>
						</a>
					</div>
					<div class="free-testing__item">
						<a href="#" class="free-testing-card">
							<div class="free-testing-card__img ibg">
								<img src="<?php bloginfo('template_url'); ?>/img/photo/header-bg.jpg" alt="">
							</div>
							<div class="free-testing-card__text-wrap">
								<div class="free-testing-card__suptitle suptitle">Gratis testen</div> 
								<h5 class="free-testing-card__title">
									Op locatie
								</h5>
								<div class="free-testing-card__text text-content">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vulputate risus id ultrices molestie. Quisque feugiat eros sit amet enim congue luctus. Morbi quis leo ac nisi aliquet lacinia sed at risus.
								</div>
								<span class="free-testing-card__link link">
									Meer informatie
								</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section> -->