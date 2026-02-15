<?php get_header(); ?>

<div class="pt-32 pb-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <header class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">導入事例</h1>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Case Studies</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-700 group border border-gray-100 flex flex-col">
                    <a href="<?php the_permalink(); ?>" class="block flex-grow">
                        <div class="aspect-[16/9] overflow-hidden bg-gray-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-700')); ?>
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-200">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-8 md:p-12">
                            <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6">導入事例</span>
                            <h2 class="text-2xl md:text-3xl font-bold mb-6 group-hover:text-marukanBlue transition-colors leading-tight">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-gray-500 line-clamp-3 leading-relaxed mb-8">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                            <div class="flex items-center text-marukanBlue font-bold gap-2">
                                詳しく見る
                                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <div class="col-span-full py-20 text-center text-gray-400">
                    現在、登録されている導入事例はありません。
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-16 flex justify-center">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
