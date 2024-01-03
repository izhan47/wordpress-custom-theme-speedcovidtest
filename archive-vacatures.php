<?php get_header(); ?>

    <main class="_page news-list-page">
        <section class="hero-v4 _padding-top">
            <div class="hero-v4__body container">
                <h1 class="hero-v4__title"><?php _e('Vacatures', 'theme'); ?></h1>
                <?php get_template_part('global-templates/breadcrumbs'); ?>
            </div>
        </section>

        <section class="news" style="margin-bottom: 0;">
            <div class="container">
                 <ul class="news__list">
                    <?php 
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $the_query = new WP_Query( array( 'post_type' => 'vacatures', 'paged' => $paged ) );
                    
                    ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                         
                         <li>
                            <a href="<?php the_permalink(); ?>" class="news-card">
                                <div class="news-card__img ibg">
                                  <?php the_post_thumbnail('medium'); ?>
                                </div>
                                <div class="news-card__text-wrap">
                                    <h4 class="news-card__title">
                                        <?php the_title(); ?>
                                    </h4>
                                    <div class="news-card__text text-content">
                                        <?php
                                        echo wp_trim_words( get_the_content(), 22, '...' );
                                        ?>
                                    </div>
                                    <span class="news-card__link link link_blue">
                                        <?php _e('Meer informatie', 'theme') ?>
                                    </span>
                                </div>
                            </a>
                        </li>
                         
                      <?php endwhile; ?>          
                      <?php wp_reset_postdata(); ?> 

                    <?php else : ?>
                      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                 </ul>
                 <div class="pagination">
                    <?php posts_pagination(); ?>
                  </div>
            </div>
        </section>

        <?php get_template_part('acf-templates/contactformulier'); ?>
        
        <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>
    </main>

<?php get_footer(); ?>