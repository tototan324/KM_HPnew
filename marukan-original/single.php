<?php get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <article class="max-w-3xl mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <header class="mb-12 border-b border-gray-100 pb-8">
                    <div class="flex items-center gap-4 mb-4">
                        <time class="text-gray-400 font-medium"><?php echo get_the_date(); ?></time>
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) :
                        ?>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-blue-50 text-marukanBlue px-2 py-1 rounded">
                                <?php echo esc_html($categories[0]->name); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold leading-tight"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-12 rounded-[2rem] overflow-hidden shadow-sm">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-lg prose-blue max-w-none prose-img:rounded-2xl">
                    <?php the_content(); ?>
                </div>

                <footer class="mt-16 pt-8 border-t border-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<span class="text-xs text-gray-400 block mb-1">前の記事</span> <span class="font-bold text-marukanBlue">« %title</span>'); ?>
                        </div>
                        <div class="nav-next text-right">
                            <?php next_post_link('%link', '<span class="text-xs text-gray-400 block mb-1">次の記事</span> <span class="font-bold text-marukanBlue">%title »</span>'); ?>
                        </div>
                    </div>
                    <div class="mt-12 text-center">
                        <a href="<?php echo get_post_type_archive_link('post'); ?>" class="inline-flex items-center gap-2 bg-gray-50 text-gray-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition">
                            一覧に戻る
                        </a>
                    </div>
                </footer>
            <?php endwhile; endif; ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>
