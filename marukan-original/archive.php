<?php get_header(); ?>

<div class="pt-32 pb-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold mb-4">お知らせ</h1>
                <p class="text-gray-400 tracking-widest uppercase text-sm">News / Topics</p>
            </div>

            <div class="space-y-6">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="bg-white rounded-2xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow group border border-gray-100">
                        <a href="<?php the_permalink(); ?>" class="flex flex-col md:flex-row md:items-center gap-6">
                            <div class="md:w-32 flex-shrink-0">
                                <time class="text-gray-400 font-medium"><?php echo get_the_date(); ?></time>
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) :
                                ?>
                                    <div class="mt-2">
                                        <span class="text-[10px] font-bold uppercase tracking-wider bg-blue-50 text-marukanBlue px-2 py-1 rounded">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow">
                                <h2 class="text-xl font-bold group-hover:text-marukanBlue transition-colors">
                                    <?php the_title(); ?>
                                </h2>
                                <div class="mt-2 text-gray-500 line-clamp-2 text-sm">
                                    <?php echo get_the_excerpt(); ?>
                                </div>
                            </div>
                            <div class="flex-shrink-0 hidden md:block">
                                <svg class="w-6 h-6 text-gray-300 group-hover:text-marukanBlue group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
                    <div class="mt-12 flex justify-center">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => '前へ',
                            'next_text' => '次へ',
                            'class'     => 'flex gap-2'
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <p class="text-center text-gray-400 py-12">お知らせはありません。</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
