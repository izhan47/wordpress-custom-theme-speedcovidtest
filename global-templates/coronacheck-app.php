<?php if ( get_field( 'coronacheck-app_actief', 'option' ) == 1 ): ?>
   <?php if(get_field('coronacheck_app')): ?>
      <div class="coronacheckapp">
         <img src="<?php bloginfo('template_url'); ?>/img/photo/coronacheckapp.png" srcset="<?php bloginfo('template_url'); ?>/img/photo/coronacheckapp@2x.png 2x" alt="CoronaCheck app">
         <p><?php the_field( 'coronacheck-app_tekst', 'option' ); ?></p>
      </div>
   <?php endif; ?>      
<?php endif; ?>