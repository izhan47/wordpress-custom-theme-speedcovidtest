<?php get_header(); ?>

    <main class="_page news-single-page">
        <div class="hero-v2 _padding-top">
            <div class="hero-v2__bg ibg"></div>
            <div class="hero-v2__body container"> </div>
        </div>

        <section class="news-single">
            <div class="news-single__body container">
                <div class="news-single__col-1">
                    <div class="news-single__img ibg">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="news-single__text-wrap">
                        <?php get_template_part('global-templates/breadcrumbs'); ?>
                        <div class="news-single__head">
                            <h1 class="news-single__title title-2">
                              <?php the_title(); ?>
                            </h1>
                            <div class="news-single__date">Bericht geplaatst op <?php the_time('j F Y'); ?></div>
                        </div>
                        <div class="news-single__text text-content">
                           <?php the_content(); ?>

                           <div class="share-options">
                                <span class="news-single__share">Deel deze post op:</span>
                                <a target="_blank" class="social-share-icon wa" data-action="share/whatsapp/share" href="https://wa.me/?text=<?php echo get_permalink() ?>"><i class="fab fa-whatsapp"></i></a>
                                <a target="_blank" class="social-share-icon ln" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink() ?>"><i class="fab fa-linkedin"></i></a>
                                <a target="_blank" class="social-share-icon tw" href="https://twitter.com/share?url=<?php echo get_permalink() ?>&hashtags=SpeedCovidTest"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" class="social-share-icon fb" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink() ?>"><i class="fab fa-facebook"></i></a>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="news-single__col-2">
                    <?php if( have_rows('cta_laat_je_testen', 'option') ): while( have_rows('cta_laat_je_testen', 'option') ): the_row(); ?>
                    <div class="get-tested get-tested_vertical">
                       <div class="get-tested__img ibg">
                           <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                           <?php if ( $afbeelding ) { ?>
                              <?php echo wp_get_attachment_image( $afbeelding, 'medium' ); ?>
                           <?php } ?>
                       </div>
                       <div class="get-tested__text-wrap">
                           <div class="get-tested__suptitle suptitle">
                               <?php the_sub_field( 'subtitel' ); ?>
                           </div>
                           <h2 class="get-tested__title title-2">
                               <?php the_sub_field( 'titel' ); ?>
                           </h2>
                           <div class="get-tested__subtitle">
                               <?php the_sub_field( 'tekst' ); ?>
                           </div>
                           <div class="get-tested__group">
                              <?php $button_link = get_sub_field( 'button_link' ); ?>
                              <?php if ( $button_link ) { ?>
                               <a href="<?php echo $button_link['url']; ?>" class="get-tested__btn btn-default">
                                   <i class="fas fa-calendar-alt"></i>
                                   <?php echo $button_link['title']; ?>
                               </a>
                               <?php } ?>
                               <div class="get-tested__text">
                                  <?php the_sub_field( 'tekst_naast_button' ); ?>
                               </div>
                           </div>
                       </div>
                   </div>
                    <?php endwhile; endif; ?>

               <div class="latest-news latest-news_sm">
						<h4 class="latest-news__title">Recente vacatures</h4>
						<ul class="latest-news__list">
                     <?php 
                     $the_query = new WP_Query( array( 'post_type' => 'vacatures', 'posts_per_page' => 5, 'post__not_in' => array(get_the_ID()) ) );
                     ?>
                     <?php if ( $the_query->have_posts() ) : ?>
                      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" class="latest-news__item">
									<div class="latest-news__text-wrap">
										<div class="latest-news__item-title">
											<?php the_title(); ?>
										</div>
										<div class="latest-news__date">Geplaatst op <?php the_time('j F Y'); ?></div>
									</div>
								</a>
							</li>
                     <?php endwhile; ?>          
                       <?php wp_reset_postdata(); ?>
                     <?php else : ?>
                       <li><?php _e( 'Sorry, er zijn geen nieuwe vacatures gevonden.' ); ?></li>
                     <?php endif; ?>
						</ul>
						<a href="<?php get_post_type_archive_link( 'vacatures' ); ?>" class="latest-news__link-more link link_blue">Zie meer vacatures</a>
					</div>
                </div>
            </div>
        </section>

        <?php get_template_part('acf-templates/contactformulier'); ?>

        <?php if( have_rows('cta_laat_je_testen', 'option') ): while( have_rows('cta_laat_je_testen', 'option') ): the_row(); ?>
        <section class="get-tested get-tested_dark">
           <div class="get-tested__img ibg">
               <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
               <?php if ( $afbeelding ) { ?>
                  <?php echo wp_get_attachment_image( $afbeelding, 'medium' ); ?>
               <?php } ?>
           </div>
           <div class="get-tested__text-wrap">
               <div class="get-tested__suptitle suptitle">
                   <?php the_sub_field( 'subtitel' ); ?>
               </div>
               <h2 class="get-tested__title title-2">
                   <?php the_sub_field( 'titel' ); ?>
               </h2>
               <div class="get-tested__subtitle">
                   <?php the_sub_field( 'tekst' ); ?>
               </div>
               <div class="get-tested__group">
                  <?php $button_link = get_sub_field( 'button_link' ); ?>
                  <?php if ( $button_link ) { ?>
                   <a href="<?php echo $button_link['url']; ?>" class="get-tested__btn btn-default">
                       <i class="fas fa-calendar-alt"></i>
                       <?php echo $button_link['title']; ?>
                   </a>
                   <?php } ?>
                   <div class="get-tested__text">
                       <?php the_sub_field( 'tekst_naast_button' ); ?>
                   </div>
               </div>
           </div>
        </section>
        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>