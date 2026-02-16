<?php get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <header class="mb-16 text-center">
                    <h1 class="text-4xl md:text-5xl font-bold mb-8"><?php the_title(); ?></h1>
                    <div class="w-20 h-1 bg-marukanBlue mx-auto"></div>
                </header>

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
