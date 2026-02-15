<?php get_header(); ?>

<div class="pt-32 pb-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <header class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">商品案内</h1>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Products</p>
        </header>

        <!-- Category Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="bg-marukanBlue text-white px-6 py-2 rounded-full font-bold shadow-md">すべて</a>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'product_category',
                'hide_empty' => true,
            ));
            foreach ($terms as $term) :
            ?>
                <a href="<?php echo get_term_link($term); ?>" class="bg-white text-gray-600 px-6 py-2 rounded-full font-bold shadow-sm hover:shadow-md transition">
                    <?php echo $term->name; ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group border border-gray-100">
                    <a href="<?php the_permalink(); ?>" class="block h-full flex flex-col">
                        <div class="aspect-square overflow-hidden bg-gray-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-700')); ?>
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-200">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex-grow">
                            <?php
                            $p_terms = get_the_terms(get_the_ID(), 'product_category');
                            if ($p_terms) :
                            ?>
                                <span class="text-[10px] font-bold text-marukanBlue uppercase tracking-wider mb-2 block"><?php echo $p_terms[0]->name; ?></span>
                            <?php endif; ?>
                            <h2 class="text-lg font-bold group-hover:text-marukanBlue transition-colors line-clamp-2"><?php the_title(); ?></h2>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <div class="col-span-full py-20 text-center text-gray-400">
                    現在、登録されている商品はありません。
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-16 flex justify-center">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '前へ',
                'next_text' => '次へ',
            ));
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
