<?php get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <article class="max-w-4xl mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <header class="mb-16 text-center">
                    <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6 uppercase tracking-widest">Case Study</span>
                    <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-8"><?php the_title(); ?></h1>
                    <div class="w-20 h-1 bg-marukanBlue mx-auto mb-8"></div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-16 rounded-[2.5rem] overflow-hidden shadow-2xl">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-lg prose-blue max-w-none prose-img:rounded-[2rem] prose-headings:font-bold">
                    <?php the_content(); ?>
                </div>

                <div class="mt-20 bg-gray-50 rounded-[2.5rem] p-10 md:p-16 text-center">
                    <h2 class="text-2xl md:text-3xl font-bold mb-6">同様の課題をお持ちですか？</h2>
                    <p class="text-gray-600 mb-10 text-lg">
                        神戸まるかんは、お客様一人ひとりに合わせた最適なソリューションを提案します。<br class="hidden md:block">
                        まずはお気軽にご相談ください。
                    </p>
                    <a href="<?php echo esc_url(marukan_get_permalink_by_slug('contact')); ?>" class="inline-flex items-center gap-4 bg-marukanBlue text-white px-12 py-6 rounded-full text-xl font-bold transition-all hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">
                        お問い合わせはこちら
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <footer class="mt-20 flex justify-center">
                    <a href="<?php echo get_post_type_archive_link('case_study'); ?>" class="inline-flex items-center gap-2 text-gray-400 font-bold hover:text-marukanBlue transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                        導入事例一覧に戻る
                    </a>
                </footer>
            <?php endwhile; endif; ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>
