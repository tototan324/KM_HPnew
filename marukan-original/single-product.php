<?php get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-20">
                <!-- Product Images -->
                <div>
                    <div class="rounded-[2.5rem] overflow-hidden shadow-2xl bg-gray-100 aspect-square">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                        <?php else : ?>
                            <div class="w-full h-full flex items-center justify-center text-gray-200">
                                <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="flex flex-col justify-center">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'product_category');
                    if ($terms) :
                    ?>
                        <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block uppercase"><?php echo $terms[0]->name; ?></span>
                    <?php endif; ?>

                    <h1 class="text-3xl md:text-5xl font-bold mb-8"><?php the_title(); ?></h1>

                    <div class="prose prose-lg text-gray-600 mb-12">
                        <?php the_content(); ?>
                    </div>

                    <div class="border-t border-gray-100 pt-8 mt-auto">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center gap-4 bg-marukanBlue text-white px-10 py-5 rounded-full text-lg font-bold transition-all hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">
                            この商品について問い合わせる
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Products Placeholder -->
            <section class="mt-32 pt-16 border-t border-gray-100">
                <h2 class="text-2xl font-bold mb-10 text-center">その他の商品</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <?php
                    $related = new WP_Query(array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'post__not_in' => array(get_the_ID()),
                    ));
                    if ($related->have_posts()) : while ($related->have_posts()) : $related->the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" class="group">
                            <div class="aspect-square rounded-2xl overflow-hidden bg-gray-50 mb-4 border border-gray-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-500')); ?>
                                <?php endif; ?>
                            </div>
                            <h3 class="font-bold text-sm group-hover:text-marukanBlue transition-colors"><?php the_title(); ?></h3>
                        </a>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </section>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
