<?php
/**
 * Main index file.
 */
get_header(); ?>

<main class="pt-20">
    <div class="container mx-auto px-4 py-12">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('prose prose-lg mx-auto mb-12'); ?>>
                    <?php if (!is_front_page()) : ?>
                        <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
