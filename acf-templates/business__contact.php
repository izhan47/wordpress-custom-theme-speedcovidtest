<section class="business_contact">
    <div class="container">
        <h3 class="busines-contact-title"><?php the_sub_field('titel'); ?></h3>

        <?php if( have_rows('footer', 'option') ): while( have_rows('footer', 'option') ): the_row(); ?>
            <?php if( have_rows('contact') ): while( have_rows('contact') ): the_row(); ?>
                <div class="contact-links">
                    <a href="mailto:<?php the_sub_field( 'zakelijk_e-mailadres' ); ?>"><i class="fas fa-envelope"></i><?php the_sub_field( 'zakelijk_e-mailadres' ); ?></a>
                    <a href="tel:<?php the_sub_field( 'telefoonnummer' ); ?>"><i class="fas fa-phone"></i><?php the_sub_field( 'telefoonnummer' ); ?></a>
                </div>
            <?php endwhile; endif; ?>
        <?php endwhile; endif; ?>
    </div>
</section>

<style>
    /* TODO: Set in .scss file */
    .business_contact{
        padding: 30px 0px;
    }

    .business_contact .contact-links svg{
        margin-right: 7px;
        color: rgba(6,17,58,.75);
    }

    .business_contact .contact-links a{
        color: #1b96c6;
        margin-right: 10px;
        white-space: nowrap;
        margin-bottom: 15px;
        display: inline-block;
        text-decoration: underline;
        transition: all .3s ease;
    }

    .business_contact .contact-links a:hover{
        color: #43b91f;
    }

    .business_contact .contact-links a:nth-last-child(1){
        margin-bottom: 0px;
    }

    .busines-contact-title{
        margin-bottom: 15px;
        color: rgba(6,17,58,.75);
        font-size: 19px;
        line-height: 1.2em;
        font-weight: 500;
        margin-right: 33px;
    }
</style>