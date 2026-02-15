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
            transition: width 5000ms linear;
        }
        .hero-pagination-item.active .progress-bar {
            width: 100%;
        }
        .hero-pagination-item.completed .progress-bar {
            width: 100%;
            transition: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paginationItems = document.querySelectorAll('.hero-pagination-item');
            const progressBars = document.querySelectorAll('.progress-bar');
            const slideDuration = 5000;

            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                autoplay: {
                    delay: slideDuration,
                    disableOnInteraction: false,
                },
                on: {
                    slideChange: function() {
                        const activeIndex = this.realIndex;
                        paginationItems.forEach((item, idx) => {
                            item.classList.remove('active', 'completed');
                            if (idx < activeIndex) {
                                item.classList.add('completed');
                            } else if (idx === activeIndex) {
                                item.classList.add('active');
                            }
                        });
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

<!-- Representative Message Section -->
<section id="message" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2">
                <div class="relative">
                    <div class="aspect-[4/5] bg-gray-100 rounded-3xl overflow-hidden shadow-2xl">
                        <!-- Placeholder for CEO Image -->
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=1000" alt="代表者" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-8 -right-8 w-64 h-64 bg-marukanBlue/5 -z-10 rounded-full blur-3xl"></div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block">MESSAGE</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-8 leading-tight">
                    <?php echo esc_html(get_theme_mod('marukan_original_message_title', '代表者メッセージ')); ?>
                </h2>
                <div class="text-gray-600 space-y-6 leading-relaxed text-lg">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_message_content', '卸売業からスタートし、現在は自社工場での製造も手掛けています。食のニーズが変化する中、私たちは常に新しい価値を提供し続けます。'))); ?>
                </div>
                <div class="mt-12">
                    <p class="font-bold text-xl">代表取締役社長　西谷 賢亮</p>
                </div>
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
            <div class="bg-white p-12 rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 group border border-gray-100">
                <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                    <svg class="w-10 h-10 text-marukanBlue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-6">Mission (使命)</h3>
                <p class="text-gray-600 leading-relaxed">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_mission', "美味しさと戦略をセットで届ける。\n顧客の繁盛を創る"))); ?>
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-white p-12 rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 group border border-gray-100">
                <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                    <svg class="w-10 h-10 text-marukanBlue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <div class="bg-white p-12 rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 group border border-gray-100">
                <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                    <svg class="w-10 h-10 text-marukanBlue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

<!-- Products & Cases Section -->
<section id="products-cases" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Products Card -->
            <a href="#" class="group relative aspect-[16/9] md:aspect-auto md:h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-400 font-bold tracking-widest text-xs uppercase mb-2 block">Products</span>
                    <h3 class="text-3xl font-bold">商品案内</h3>
                    <p class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">水産物からスイーツまで多彩なラインナップ</p>
                </div>
            </a>

            <!-- Case Studies Card -->
            <a href="#" class="group relative aspect-[16/9] md:aspect-auto md:h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1543157145-f78c636d023d?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-marukanBlue/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-300 font-bold tracking-widest text-xs uppercase mb-2 block">Case Studies</span>
                    <h3 class="text-3xl font-bold">導入事例</h3>
                    <p class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">お客様と共に歩む、私たちの実績</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Navigation Buttons Grid -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="#" class="group bg-gray-50 p-10 rounded-3xl border border-gray-100 hover:bg-marukanBlue transition-all duration-500">
                <div class="flex flex-col h-full justify-between">
                    <h3 class="text-xl font-bold group-hover:text-white transition-colors">働く仲間</h3>
                    <div class="flex justify-end mt-8">
                        <div class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center group-hover:bg-white group-hover:border-white transition-all">
                            <svg class="w-6 h-6 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" class="group bg-gray-50 p-10 rounded-3xl border border-gray-100 hover:bg-marukanBlue transition-all duration-500">
                <div class="flex flex-col h-full justify-between">
                    <h3 class="text-xl font-bold group-hover:text-white transition-colors">採用情報</h3>
                    <div class="flex justify-end mt-8">
                        <div class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center group-hover:bg-white group-hover:border-white transition-all">
                            <svg class="w-6 h-6 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#" class="group bg-gray-50 p-10 rounded-3xl border border-gray-100 hover:bg-marukanBlue transition-all duration-500">
                <div class="flex flex-col h-full justify-between">
                    <h3 class="text-xl font-bold group-hover:text-white transition-colors">会社概要</h3>
                    <div class="flex justify-end mt-8">
                        <div class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center group-hover:bg-white group-hover:border-white transition-all">
                            <svg class="w-6 h-6 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#contact" class="group bg-marukanBlue p-10 rounded-3xl border border-marukanBlue hover:bg-blue-800 transition-all duration-500">
                <div class="flex flex-col h-full justify-between">
                    <h3 class="text-xl font-bold text-white">お問い合わせ</h3>
                    <div class="flex justify-end mt-8">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center">
                            <svg class="w-6 h-6 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
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
            <div class="cf7-container bg-white p-12 rounded-[2.5rem] shadow-xl text-left border border-gray-100">
                <?php
                $cf7_id = get_theme_mod('marukan_original_cf7_id');
                if (shortcode_exists('contact-form-7')) {
                    if (!empty($cf7_id)) {
                        echo do_shortcode($cf7_id);
                    } else {
                        echo '<p class="text-gray-400 text-center">Contact Form 7 ID is not set.</p>';
                    }
                } else {
                    echo '<p class="text-gray-400 text-center">Contact Form 7 plugin is not active.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
