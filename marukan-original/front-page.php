<?php get_header(); ?>

<!-- Main Visual (Swiper Carousel) -->
<section class="relative h-[80vh] md:h-screen overflow-hidden bg-gray-100">
    <div class="swiper heroSwiper h-full w-full">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=2000')]">
                    <div class="absolute inset-0 bg-black/30"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 text-white">
                        <h1 class="text-4xl md:text-7xl font-bold mb-6 leading-tight slide-content">
                            今求められる<br>食を届ける
                        </h1>
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl slide-content opacity-90">
                            卸売業と製造業の2つを軸に、全国へ美味しさと幸せを。
                        </p>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&q=80&w=2000')]">
                    <div class="absolute inset-0 bg-black/40"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 text-white">
                        <h2 class="text-4xl md:text-7xl font-bold mb-6 leading-tight">
                            品質への<br>あくなきこだわり
                        </h2>
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl opacity-90">
                            1977年の創業以来、安全で安心な食の提供を続けています。
                        </p>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1551462147-37885acc3c41?auto=format&fit=crop&q=80&w=2000')]">
                    <div class="absolute inset-0 bg-black/40"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 text-white">
                        <h2 class="text-4xl md:text-7xl font-bold mb-6 leading-tight">
                            食の未来を<br>切り拓く
                        </h2>
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl opacity-90">
                            SDGsに基づいた商品作りで社会に貢献します。
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Progress Pagination -->
        <div class="absolute bottom-12 left-0 w-full z-20 px-4">
            <div class="container mx-auto flex gap-4">
                <div class="hero-pagination-item flex-1 h-1 bg-white/30 relative cursor-pointer overflow-hidden rounded-full active" data-index="0">
                    <div class="progress-bar absolute top-0 left-0 h-full bg-white w-0"></div>
                </div>
                <div class="hero-pagination-item flex-1 h-1 bg-white/30 relative cursor-pointer overflow-hidden rounded-full" data-index="1">
                    <div class="progress-bar absolute top-0 left-0 h-full bg-white w-0"></div>
                </div>
                <div class="hero-pagination-item flex-1 h-1 bg-white/30 relative cursor-pointer overflow-hidden rounded-full" data-index="2">
                    <div class="progress-bar absolute top-0 left-0 h-full bg-white w-0"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .progress-bar {
            width: 0%;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paginationItems = document.querySelectorAll('.hero-pagination-item');
            const slideDuration = 5000;

            const updateBars = (activeIndex) => {
                paginationItems.forEach((item, idx) => {
                    const bar = item.querySelector('.progress-bar');
                    bar.style.transition = 'none';

                    if (idx < activeIndex) {
                        bar.style.width = '100%';
                    } else if (idx > activeIndex) {
                        bar.style.width = '0%';
                    } else {
                        // Current active
                        bar.style.width = '0%';
                        // Force reflow
                        void bar.offsetWidth;
                        bar.style.transition = `width ${slideDuration}ms linear`;
                        bar.style.width = '100%';
                    }
                });
            };

            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                autoplay: {
                    delay: slideDuration,
                    disableOnInteraction: false,
                },
                on: {
                    init: function() {
                        updateBars(0);
                    },
                    slideChange: function() {
                        updateBars(this.realIndex);
                    }
                }
            });

            paginationItems.forEach((item, idx) => {
                item.addEventListener('click', () => {
                    swiper.slideToLoop(idx);
                });
            });
        });
    </script>
</section>

<!-- News Section -->
<section id="news" class="py-16 bg-white border-b border-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10">
            <div class="flex items-center gap-6">
                <h2 class="text-3xl font-bold">お知らせ</h2>
                <span class="text-gray-400 tracking-widest uppercase text-xs">News</span>
            </div>
            <a href="<?php echo get_post_type_archive_link('post'); ?>" class="text-marukanBlue font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all mt-4 md:mt-0">
                一覧を見る
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $news_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                <article class="group">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <div class="mb-4 overflow-hidden rounded-2xl aspect-[16/10] bg-gray-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition duration-500')); ?>
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center gap-4 mb-2">
                            <time class="text-sm text-gray-400 font-medium"><?php echo get_the_date(); ?></time>
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <span class="text-[10px] font-bold uppercase tracking-wider bg-gray-100 px-2 py-0.5 rounded text-gray-600">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <h3 class="font-bold text-lg leading-snug group-hover:text-marukanBlue transition-colors line-clamp-2">
                            <?php the_title(); ?>
                        </h3>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-span-3 bg-gray-50 rounded-2xl p-12 text-center">
                    <p class="text-gray-400">現在お知らせはありません。</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Representative Message Section -->
<section id="message" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block">MESSAGE</span>
            <h2 class="text-3xl md:text-5xl font-bold mb-12 leading-tight">
                <?php echo esc_html(get_theme_mod('marukan_original_message_title', '代表者メッセージ')); ?>
            </h2>
            <div class="text-gray-700 space-y-8 leading-relaxed text-xl md:text-2xl font-medium">
                <?php echo nl2br(esc_html(get_theme_mod('marukan_original_message_content', '卸売業からスタートし、現在は自社工場での製造も手掛けています。食のニーズが変化する中、私たちは常に新しい価値を提供し続けます。'))); ?>
            </div>
            <div class="mt-16 flex flex-col items-center">
                <div class="w-12 h-1 bg-marukanBlue mb-6"></div>
                <p class="font-bold text-xl md:text-2xl">代表取締役社長　西谷 賢亮</p>
            </div>
        </div>
    </div>
</section>

<!-- MVV Section -->
<section id="mvv" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">企業理念・MVV</h2>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Mission / Vision / Value</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-white p-12 rounded-[2rem] shadow-sm border border-gray-100">
                <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-8">
                    <svg class="w-10 h-10 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-6">Mission (使命)</h3>
                <p class="text-gray-600 leading-relaxed">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_mission', "美味しさと戦略をセットで届ける。\n顧客の繁盛を創る"))); ?>
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-white p-12 rounded-[2rem] shadow-sm border border-gray-100">
                <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-8">
                    <svg class="w-10 h-10 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-6">Vision (将来像)</h3>
                <p class="text-gray-600 leading-relaxed">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_vision', "「困ったら神戸まるかん」と一番に選ばれる、食のトータルソリューション・カンパニー。"))); ?>
                </p>
            </div>

            <!-- Value -->
            <div class="bg-white p-12 rounded-[2rem] shadow-sm border border-gray-100">
                <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-8">
                    <svg class="w-10 h-10 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-6">Value (価値観)</h3>
                <p class="text-gray-600 leading-relaxed">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_value', "納品をゴールとせず、顧客の売上アップをゴールとする達人集団"))); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Products & Cases Section -->
<section id="products-cases" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Case Studies Card -->
            <a href="<?php echo get_post_type_archive_link('case_study'); ?>" class="group relative aspect-[16/9] md:aspect-auto md:h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1543157145-f78c636d023d?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-marukanBlue/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-300 font-bold tracking-widest text-xs uppercase mb-2 block">Case Studies</span>
                    <h3 class="text-3xl font-bold">導入事例</h3>
                    <p class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">お客様と共に歩む、私たちの実績</p>
                </div>
            </a>

            <!-- Products Card -->
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="group relative aspect-[16/9] md:aspect-auto md:h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-400 font-bold tracking-widest text-xs uppercase mb-2 block">Products</span>
                    <h3 class="text-3xl font-bold">商品案内</h3>
                    <p class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">水産物からスイーツまで多彩なラインナップ</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- History Section -->
<section id="history" class="py-24 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">神戸まるかんの歩み</h2>
            <p class="text-gray-400 tracking-widest uppercase text-sm">History</p>
        </div>

        <div class="relative">
            <!-- Vertical Line -->
            <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-px bg-gray-200 -translate-x-1/2"></div>

            <div class="space-y-12">
                <?php
                $history = [
                    ['year' => '1977年', 'event' => '神戸市中央区に前身となるマルカン商事株式会社設立'],
                    ['year' => '1987年', 'event' => '本社を神戸市兵庫区に移転'],
                    ['year' => '1992年', 'event' => '中国山東省煙台市に煙台魯星有限公司設立'],
                    ['year' => '2003年', 'event' => '中国山東省煙台市に煙台緑美有限公司設立'],
                    ['year' => '2005年', 'event' => '本社機能を東灘区に移転、本社敷地内に工場を設立'],
                    ['year' => '2009年', 'event' => '中国の加工事業を煙台緑美食品有限公司に統合'],
                    ['year' => '2017年', 'event' => '株式会社神明グループに参画'],
                    ['year' => '2018年', 'event' => '東京営業所開設'],
                    ['year' => '2022年', 'event' => '神戸工場にてISO22000認証取得'],
                ];

                foreach ($history as $index => $item) :
                    $is_even = $index % 2 === 1;
                ?>
                    <div class="relative flex items-center <?php echo $is_even ? 'md:flex-row-reverse' : ''; ?>">
                        <!-- Dot -->
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-marukanBlue rounded-full -translate-x-1/2 z-10 border-4 border-white"></div>

                        <div class="w-full md:w-1/2 pl-8 md:pl-0 <?php echo $is_even ? 'md:pl-12' : 'md:pr-12 text-right'; ?>">
                            <div class="bg-gray-50 p-6 rounded-2xl hover:bg-blue-50 transition-colors duration-300">
                                <span class="text-marukanBlue font-bold block mb-2"><?php echo $item['year']; ?></span>
                                <p class="text-gray-700 font-medium"><?php echo $item['event']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Members Section -->
<section id="members" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">働く仲間</h2>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Members</p>
        </div>

        <div class="max-w-5xl mx-auto space-y-24">
            <!-- Member 1 -->
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20">
                <div class="w-full md:w-2/5">
                    <div class="aspect-[4/5] rounded-[2rem] overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=800" alt="社員紹介1" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="w-full md:w-3/5">
                    <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6">営業本部 / 2018年入社</span>
                    <h3 class="text-2xl md:text-3xl font-bold mb-6">「食のプロとして、お客様の期待を超える提案を」</h3>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        お客様が抱える課題は千差万別です。単に商品を売るのではなく、その先の消費者が何を求めているかを常に考え、最適なソリューションを提案することにやりがいを感じています。
                    </p>
                    <p class="font-bold text-lg">佐藤 結衣</p>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-12 md:gap-20">
                <div class="w-full md:w-2/5">
                    <div class="aspect-[4/5] rounded-[2rem] overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=800" alt="社員紹介2" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="w-full md:w-3/5">
                    <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6">製造部 工場長 / 2010年入社</span>
                    <h3 class="text-2xl md:text-3xl font-bold mb-6">「安全・安心、そして美味しさへの責任」</h3>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        ISO22000の認証取得など、徹底した品質管理のもとで製造を行っています。最新の設備と職人の知恵を融合させ、神戸から全国へ最高の品質をお届けしています。
                    </p>
                    <p class="font-bold text-lg">田中 健二</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recruitment Section -->
<section id="recruit" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">採用情報</h2>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Recruit</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <?php
            $recruit_links = array(
                'new-graduate' => marukan_get_permalink_by_slug('recruit/new-graduate'),
                'career'       => marukan_get_permalink_by_slug('recruit/career'),
                'part-time'    => marukan_get_permalink_by_slug('recruit/part-time')
            );
            ?>
            <!-- New Graduate -->
            <a href="<?php echo esc_url($recruit_links['new-graduate']); ?>" class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:shadow-marukanBlue/20 hover:-translate-y-2 transition-all duration-500 border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                        <svg class="w-8 h-8 text-marukanBlue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">新卒採用</h3>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        これからの食の未来を共に創る、熱意ある若い力を募集しています。
                    </p>
                </div>
                <div class="flex items-center text-marukanBlue font-bold gap-2">
                    詳しく見る
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <!-- Career -->
            <a href="<?php echo esc_url($recruit_links['career']); ?>" class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:shadow-marukanBlue/20 hover:-translate-y-2 transition-all duration-500 border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                        <svg class="w-8 h-8 text-marukanBlue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">中途採用</h3>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        培ってきた経験を活かし、神戸まるかんのさらなる成長を牽引してください。
                    </p>
                </div>
                <div class="flex items-center text-marukanBlue font-bold gap-2">
                    詳しく見る
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <!-- Part-time -->
            <a href="<?php echo esc_url($recruit_links['part-time']); ?>" class="group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:shadow-marukanBlue/20 hover:-translate-y-2 transition-all duration-500 border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                        <svg class="w-8 h-8 text-marukanBlue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">パート・アルバイト</h3>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        地域に根ざした職場で、ライフスタイルに合わせた働き方を。
                    </p>
                </div>
                <div class="flex items-center text-marukanBlue font-bold gap-2">
                    詳しく見る
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Company Profile Section -->
<section id="company" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">会社概要</h2>
            <p class="text-gray-400 tracking-widest uppercase text-sm">Company Profile</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="overflow-hidden rounded-[2rem] border border-gray-100 shadow-sm">
                <table class="w-full text-left border-collapse">
                    <tbody>
                        <tr class="border-b border-gray-50">
                            <th class="py-8 px-8 bg-gray-50 w-1/3 text-gray-700 font-bold">社名</th>
                            <td class="py-8 px-8 text-gray-600"><?php echo esc_html(get_theme_mod('marukan_original_company_name', '株式会社神戸まるかん')); ?></td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <th class="py-8 px-8 bg-gray-50 text-gray-700 font-bold">所在地</th>
                            <td class="py-8 px-8 text-gray-600">
                                <?php echo nl2br(esc_html(get_theme_mod('marukan_original_address', "〒658-0023\n兵庫県神戸市東灘区深江浜町5番地の1"))); ?>
                                <div class="mt-4">
                                    <a href="https://maps.google.com/?q=兵庫県神戸市東灘区深江浜町5番地の1" target="_blank" class="text-marukanBlue font-bold text-sm flex items-center gap-1 hover:underline">
                                        Google Mapで見る
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <th class="py-8 px-8 bg-gray-50 text-gray-700 font-bold">設立</th>
                            <td class="py-8 px-8 text-gray-600">1977年（昭和52年）12月</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <th class="py-8 px-8 bg-gray-50 text-gray-700 font-bold">資本金</th>
                            <td class="py-8 px-8 text-gray-600">3,000万円</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <th class="py-8 px-8 bg-gray-50 text-gray-700 font-bold">代表者</th>
                            <td class="py-8 px-8 text-gray-600">代表取締役社長　西谷 賢亮</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <th class="py-8 px-8 bg-gray-50 text-gray-700 font-bold">事業内容</th>
                            <td class="py-8 px-8 text-gray-600">
                                ・水産物卸売及び加工販売<br>
                                ・調理冷凍食品の製造販売<br>
                                ・スイーツの製造販売<br>
                                ・食品輸出入業務
                            </td>
                        </tr>
                        <tr>
                            <th class="py-8 px-8 bg-gray-50 text-gray-700 font-bold">主要取引銀行</th>
                            <td class="py-8 px-8 text-gray-600">三井住友銀行、みなと銀行、商工組合中央金庫</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section (Anchored) -->
<section id="contact" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">お気軽にご相談ください</h2>
            <p class="text-gray-600 mb-12">
                食のトータルソリューション・カンパニーとして、<br class="hidden md:block">
                お客様の課題解決に最適なご提案をさせていただきます。
            </p>
            <div class="flex justify-center">
                <?php
                $contact_url = marukan_get_permalink_by_slug('contact');
                ?>
                <a href="<?php echo esc_url($contact_url); ?>" class="group relative inline-flex items-center gap-4 bg-marukanBlue text-white px-16 py-8 rounded-full text-2xl font-bold transition-all duration-500 hover:bg-blue-800 hover:-translate-y-2 hover:shadow-[0_20px_50px_-10px_rgba(0,64,152,0.5)]">
                    お問い合わせフォーム
                    <svg class="w-8 h-8 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
