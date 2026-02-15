<?php get_header(); ?>

<!-- Main Visual (Carousel) -->
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-100">
    <div id="hero-carousel" class="absolute inset-0">
        <!-- Slide 1 -->
        <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=2000')]">
                <div class="absolute inset-0 bg-black/30"></div>
            </div>
            <div class="relative h-full flex items-center">
                <div class="container mx-auto px-4 text-white">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight slide-up">
                        今求められる<br>食を届ける
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl slide-up delay-100">
                        卸売業と製造業の2つを軸に、全国へ美味しさと幸せを。
                    </p>
                    <a href="#products" class="inline-block bg-white text-marukanBlue px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition shadow-xl slide-up delay-200">
                        商品を見る
                    </a>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&q=80&w=2000')]">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <div class="relative h-full flex items-center">
                <div class="container mx-auto px-4 text-white">
                    <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        品質への<br>あくなきこだわり
                    </h2>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl">
                        1977年の創業以来、安全で安心な食の提供を続けています。
                    </p>
                    <a href="#about" class="inline-block bg-white text-marukanBlue px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition shadow-xl">
                        会社案内
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel Controls -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
        <button class="carousel-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition" data-index="0"></button>
        <button class="carousel-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition" data-index="1"></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            let currentSlide = 0;

            function showSlide(index) {
                slides.forEach(s => s.classList.add('opacity-0'));
                slides[index].classList.remove('opacity-0');
                slides[index].classList.add('opacity-100');

                dots.forEach(d => d.classList.replace('bg-white', 'bg-white/50'));
                dots[index].classList.replace('bg-white/50', 'bg-white');
                currentSlide = index;
            }

            function nextSlide() {
                let next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', () => showSlide(idx));
            });

            setInterval(nextSlide, 5000);
            showSlide(0); // Init
        });
    </script>
</section>

<!-- News Section -->
<section id="news" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold mb-2">お知らせ</h2>
                <p class="text-gray-500">NEWS</p>
            </div>
            <a href="#" class="text-marukanBlue font-bold hover:underline">一覧を見る &rarr;</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $news_args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            );
            $news_query = new WP_Query($news_args);

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                <article class="group">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <div class="overflow-hidden rounded-xl mb-4">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover group-hover:scale-105 transition duration-500']); ?>
                            <?php else : ?>
                                <div class="w-full h-48 bg-gray-200 group-hover:scale-105 transition duration-500"></div>
                            <?php endif; ?>
                        </div>
                        <time class="text-sm text-gray-400"><?php echo get_the_date(); ?></time>
                        <h3 class="font-bold mt-2 group-hover:text-marukanBlue transition"><?php the_title(); ?></h3>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Fallback content if no posts -->
                <p class="col-span-3 text-center text-gray-400">現在、お知らせはありません。</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Bento Box Layout Section -->
<section id="about" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-2">神戸まるかんについて</h2>
            <p class="text-gray-500 uppercase tracking-widest">About Us</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-none md:grid-rows-2 gap-6">
            <!-- Message (Large) -->
            <div class="md:col-span-2 md:row-span-1 bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-blue-900/10 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-marukanBlue font-bold text-sm uppercase">Message</span>
                    <h3 class="text-2xl font-bold mt-4 mb-4"><?php echo esc_html(get_theme_mod('marukan_message_title', '代表者メッセージ')); ?></h3>
                    <p class="text-gray-600 leading-relaxed">
                        <?php echo nl2br(esc_html(get_theme_mod('marukan_message_content', '卸売業からスタートし、現在は自社工場での製造も手掛けています。食のニーズが変化する中、私たちは常に新しい価値を提供し続けます。'))); ?>
                    </p>
                </div>
                <a href="#" class="text-marukanBlue font-bold mt-6 inline-flex items-center">
                    詳しく見る <span class="ml-2">→</span>
                </a>
            </div>

            <!-- Philosophy (Square) -->
            <div class="md:col-span-1 md:row-span-1 bg-marukanBlue text-white p-8 rounded-3xl hover:shadow-2xl hover:shadow-blue-900/30 hover:-translate-y-1 transition-all duration-300 border border-marukanBlue">
                <span class="text-blue-200 font-bold text-sm uppercase">Philosophy</span>
                <h3 class="text-xl font-bold mt-4 mb-4">企業理念</h3>
                <p class="text-sm leading-relaxed">
                    <?php echo esc_html(get_theme_mod('marukan_philosophy', '私たちは食を通じて、美味しさと幸せを創造し、人々の明るい食生活に貢献します。')); ?>
                </p>
            </div>

            <!-- History (Tall) -->
            <div class="md:col-span-1 md:row-span-2 bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-blue-900/10 hover:-translate-y-1 transition-all duration-300 flex flex-col">
                <span class="text-marukanBlue font-bold text-sm uppercase">History</span>
                <h3 class="text-xl font-bold mt-4 mb-6">歩み</h3>
                <div class="space-y-4 flex-grow">
                    <div class="border-l-2 border-marukanBlue/20 pl-4 py-1">
                        <p class="text-xs text-gray-400">1977</p>
                        <p class="text-sm font-bold">マルカン商事設立</p>
                    </div>
                    <div class="border-l-2 border-marukanBlue/20 pl-4 py-1">
                        <p class="text-xs text-gray-400">1992</p>
                        <p class="text-sm font-bold">中国に食品工場を設立</p>
                    </div>
                    <div class="border-l-2 border-marukanBlue/20 pl-4 py-1">
                        <p class="text-xs text-gray-400">2022</p>
                        <p class="text-sm font-bold">ISO22000認証取得</p>
                    </div>
                </div>
                <a href="#" class="text-marukanBlue font-bold mt-6 inline-flex items-center">
                    沿革を見る <span class="ml-2">→</span>
                </a>
            </div>

            <!-- Products (Wide) -->
            <div id="products" class="md:col-span-2 md:row-span-1 bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-blue-900/10 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between overflow-hidden relative">
                <div class="z-10">
                    <span class="text-marukanBlue font-bold text-sm uppercase">Products</span>
                    <h3 class="text-2xl font-bold mt-4 mb-4">商品案内</h3>
                    <p class="text-gray-600 mb-6">水産物からスイーツ、ソースまで多彩なラインナップ。</p>
                    <div class="flex flex-wrap gap-2">
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'product_category',
                            'hide_empty' => false,
                        ));
                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                echo '<a href="' . esc_url(get_term_link($term)) . '" class="px-3 py-1 bg-blue-50 text-marukanBlue text-xs rounded-full hover:bg-marukanBlue hover:text-white transition">' . esc_html($term->name) . '</a>';
                            }
                        } else {
                            // Fallback if no categories exist yet
                            echo '<span class="px-3 py-1 bg-blue-50 text-marukanBlue text-xs rounded-full">Seafood</span>';
                            echo '<span class="px-3 py-1 bg-blue-50 text-marukanBlue text-xs rounded-full">Sweets</span>';
                            echo '<span class="px-3 py-1 bg-blue-50 text-marukanBlue text-xs rounded-full">Source</span>';
                        }
                        ?>
                    </div>
                </div>
                <div class="absolute right-0 top-0 h-full w-1/3 bg-gray-100 -rotate-12 translate-x-8 translate-y-8 rounded-3xl"></div>
            </div>

            <!-- Recruit (Square) -->
            <div id="recruit" class="md:col-span-1 md:row-span-1 bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-blue-900/10 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-marukanBlue font-bold text-sm uppercase">Recruit</span>
                    <h3 class="text-xl font-bold mt-4 mb-2">採用情報</h3>
                    <p class="text-sm text-gray-500">未来の仲間を募集しています。</p>
                </div>
                <a href="#" class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center self-end hover:bg-marukanBlue transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Members Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-2">働く仲間</h2>
            <p class="text-gray-500 uppercase tracking-widest">Members</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="flex flex-col md:flex-row gap-8 items-center bg-gray-50 p-8 rounded-3xl hover:bg-white hover:shadow-xl transition duration-300">
                <div class="w-32 h-32 rounded-full bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="text-marukanBlue font-bold text-sm mb-1">営業本部 / 2021年入社</p>
                    <h4 class="text-xl font-bold mb-4">ルートセールス・新規開拓</h4>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        お客様が困ったとき、最初に相談したくなる営業を目指しています。
                    </p>
                    <a href="#" class="text-marukanBlue font-bold text-sm underline">詳しく見る</a>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-8 items-center bg-gray-50 p-8 rounded-3xl hover:bg-white hover:shadow-xl transition duration-300">
                <div class="w-32 h-32 rounded-full bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="text-marukanBlue font-bold text-sm mb-1">商品部・生産課 / 2015年入社</p>
                    <h4 class="text-xl font-bold mb-4">生産管理・マネジメント</h4>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        品質向上と効率改善のプロセスに面白さを感じています。
                    </p>
                    <a href="#" class="text-marukanBlue font-bold text-sm underline">詳しく見る</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Profile -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white p-12 rounded-3xl shadow-sm border border-gray-100">
            <h2 class="text-3xl font-bold mb-12 text-center">会社概要</h2>
            <dl class="grid grid-cols-1 md:grid-cols-[200px_1fr] gap-y-6 text-sm md:text-base border-t border-gray-100 pt-8">
                <dt class="font-bold text-gray-500">会社名</dt>
                <dd><?php echo esc_html(get_theme_mod('marukan_company_name', '株式会社神戸まるかん')); ?></dd>

                <dt class="font-bold text-gray-500">創立</dt>
                <dd>1977年4月</dd>

                <dt class="font-bold text-gray-500">代表者</dt>
                <dd>代表取締役社長：西谷 賢亮</dd>

                <dt class="font-bold text-gray-500">資本金</dt>
                <dd>4,000万円</dd>

                <dt class="font-bold text-gray-500">事業内容</dt>
                <dd>水産物を中心とした、食品の製造および販売</dd>

                <dt class="font-bold text-gray-500">所在地</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_address', "〒658-0023 兵庫県神戸市東灘区深江浜町5番地の1"))); ?><br>
                    <a href="https://goo.gl/maps/FV8pMspQeqDC4dW47" target="_blank" class="text-marukanBlue underline mt-2 inline-block">Googleマップで見る</a>
                </dd>
            </dl>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="bg-marukanBlue p-12 text-white flex flex-col justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-6">お問い合わせ</h2>
                        <p class="text-blue-100 mb-8 leading-relaxed">
                            商品に関するご質問や、採用についてのご相談など、お気軽にお問い合わせください。
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            <span class="font-bold text-xl">078-431-6600</span>
                        </div>
                        <p class="text-sm text-blue-200">受付時間：平日 9:00 〜 17:00</p>
                    </div>
                </div>
                <div class="p-12">
                    <div class="cf7-container">
                        <?php
                        $cf7_id = get_theme_mod('marukan_cf7_id');
                        // If Contact Form 7 is active, display the form.
                        // Otherwise, display a helpful message.
                        if (shortcode_exists('contact-form-7')) {
                            if (!empty($cf7_id)) {
                                if (strpos($cf7_id, '[') !== false) {
                                    echo do_shortcode($cf7_id);
                                } else {
                                    echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_id) . '"]');
                                }
                            } else {
                                echo '<p class="text-gray-500 text-center py-8">管理画面の「外観 > カスタマイズ > Analytics & Integration」からContact Form 7のIDを設定してください。</p>';
                            }
                        } else {
                            ?>
                            <div class="bg-gray-50 border border-gray-200 p-8 rounded-xl text-center">
                                <p class="text-gray-600 mb-4">
                                    お問い合わせフォームを表示するには「Contact Form 7」プラグインを有効にしてください。
                                </p>
                                <p class="text-xs text-gray-400 leading-relaxed">
                                    【ベストプラクティス】<br>
                                    プラグイン導入後、以下の項目（ハニーポットを含む）を設定することを推奨します：<br>
                                    [text* your-name] [email* your-email] [textarea* your-message] [honeypot spam-protection]
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
