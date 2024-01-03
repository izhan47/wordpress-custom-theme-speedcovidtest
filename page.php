<?php get_header(); ?>

    <main class="_page text-page">
        <section class="hero-v3 _padding-top">
            <div class="hero-v3__bg ibg">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="hero-v3__body container">
                <?php get_template_part('global-templates/breadcrumbs'); ?>
                <h1 class="hero-v3__title"><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="text text-content">
            <div class="text__body container">
                <?php the_content(); ?>
            </div>
        </section>

        <?php get_template_part('acf-templates/cta_laat_je_testen'); ?>
    </main>

<?php get_footer(); ?>