<?php get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <article class="max-w-4xl mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <header class="mb-16 text-center">
                    <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block uppercase tracking-widest">Recruit</span>
                    <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-8"><?php the_title(); ?></h1>
                    <div class="w-20 h-1 bg-marukanBlue mx-auto mb-8"></div>
                </header>

                <div class="prose prose-lg prose-blue max-w-none prose-img:rounded-[2rem] prose-headings:font-bold">
                    <?php the_content(); ?>
                </div>

                <footer class="mt-20 flex justify-center">
                    <a href="<?php echo get_post_type_archive_link('recruit'); ?>" class="inline-flex items-center gap-2 text-gray-400 font-bold hover:text-marukanBlue transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                        採用情報一覧に戻る
                    </a>
                </footer>
            <?php endwhile; endif; ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>
