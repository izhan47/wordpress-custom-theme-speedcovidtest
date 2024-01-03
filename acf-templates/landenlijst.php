<div class="container">
    <div class="modular-text__row" style="margin-bottom: 70px;">
        <div class="text-item text-content">
            <div class="table-countries">
               <div class="table-top">
                  <p><?php the_sub_field('titel_linksboven'); ?> <span class="align-right"><?php the_sub_field('titel_rechts'); ?></span></p>
               </div>
               <div class="table-content">
                  <?php 
                  $the_query = new WP_Query( array( 'post_type' => 'landen', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', ) );
                  ?>
                  <?php if ( $the_query->have_posts() ) : ?>
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  
                     <p><?php the_title(); ?> <span class="align-right"><?php the_field('testuitslag_voor_vertrek'); ?></span></p>
                  
                  <?php endwhile; ?>          
                    <?php wp_reset_postdata(); ?>
                  <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                  <?php endif; ?>
               </div>
            </div>
        </div>
    </div>
</div>