<?php get_header(); ?>

<div class="pt-32 pb-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <header class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">採用情報</h1>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Recruit</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:shadow-marukanBlue/20 hover:-translate-y-2 transition-all duration-500 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-8">
                            <svg class="w-8 h-8 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-bold mb-4"><?php the_title(); ?></h2>
                        <p class="text-gray-500 leading-relaxed mb-8">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="flex items-center text-marukanBlue font-bold gap-2">
                        詳しく見る
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
