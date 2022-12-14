<?php
get_header();
get_template_part('sections/specia', 'breadcrumb'); ?>

<!-- Blog & Sidebar Section -->

<section class="details_news_page">
    <div class="container">
        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <div class="content_details_news">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo  get_field("address") ?></p>
                    <p><?php echo  get_field("amount") ?></p>
                    <p><?php echo  get_field("deadline") ?></p>
                    <p><?php echo  get_field("company") ?></p>
                    <p><?php echo  get_field("address_work") ?></p>
                    <p><?php echo  get_field("work") ?></p>
                    <p><?php echo  get_field("skill") ?></p>
                    <p><?php echo  get_field("other_requirements") ?></p>
                    <p><?php echo  get_field("welfare") ?></p>
                    <p><?php echo  get_field("job_description") ?></p>
                    <p><?php echo  get_field("job_request") ?></p>

                    <?php
                    the_content(sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses(__('Read More', 'specia'), array('span' => array('class' => array()))),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'specia'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>