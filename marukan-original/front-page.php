<?php get_header(); ?>

<!-- Main Visual (Swiper Carousel) -->
<section class="relative h-[80vh] md:h-screen overflow-hidden bg-white">
    <div class="swiper heroSwiper h-full w-full">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=2000')]">
                    <div class="absolute inset-0 bg-black/20"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 text-white">
                        <div class="max-w-3xl">
                            <span class="inline-block px-4 py-1 bg-marukanBlue text-white text-sm font-bold mb-6 tracking-widest animate-fade-in-up">SINCE 1977</span>
                            <h1 class="text-4xl md:text-7xl font-bold mb-6 leading-tight animate-fade-in-up" style="animation-delay: 0.2s">
                                今求められる<br><span class="text-marukanBlue bg-white px-2">食</span>を届ける
                            </h1>
                            <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up" style="animation-delay: 0.4s">
                                卸売業と製造業の2つを軸に、全国へ美味しさと幸せを。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&q=80&w=2000')]">
                    <div class="absolute inset-0 bg-black/30"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 text-white">
                        <div class="max-w-3xl">
                            <span class="inline-block px-4 py-1 bg-marukanBlue text-white text-sm font-bold mb-6 tracking-widest">QUALITY FIRST</span>
                            <h2 class="text-4xl md:text-7xl font-bold mb-6 leading-tight">
                                品質への<br>あくなきこだわり
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 opacity-90">
                                安全で安心な食の提供を続け、信頼の絆を築きます。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Pagination -->
        <div class="absolute bottom-12 left-0 w-full z-20 px-4">
            <div class="container mx-auto flex items-end justify-between">
                <div class="flex gap-4 flex-1 max-w-xs">
                    <div class="hero-pagination-item flex-1 h-1 bg-white/30 relative cursor-pointer overflow-hidden rounded-full active" data-index="0">
                        <div class="progress-bar absolute top-0 left-0 h-full bg-white w-0"></div>
                    </div>
                    <div class="hero-pagination-item flex-1 h-1 bg-white/30 relative cursor-pointer overflow-hidden rounded-full" data-index="1">
                        <div class="progress-bar absolute top-0 left-0 h-full bg-white w-0"></div>
                    </div>
                </div>
                <div class="flex gap-2 text-white/50 font-bold text-sm">
                    <span class="text-white">01</span> / <span>02</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paginationItems = document.querySelectorAll('.hero-pagination-item');
            const slideDuration = 6000;

            const updateBars = (activeIndex) => {
                paginationItems.forEach((item, idx) => {
                    const bar = item.querySelector('.progress-bar');
                    bar.style.transition = 'none';
                    if (idx < activeIndex) bar.style.width = '100%';
                    else if (idx > activeIndex) bar.style.width = '0%';
                    else {
                        bar.style.width = '0%';
                        void bar.offsetWidth;
                        bar.style.transition = `width ${slideDuration}ms linear`;
                        bar.style.width = '100%';
                    }
                });
            };

            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade',
                autoplay: { delay: slideDuration, disableOnInteraction: false },
                on: {
                    init: function() { updateBars(0); },
                    slideChange: function() {
                        updateBars(this.realIndex);
                        const labels = document.querySelectorAll('.heroSwiper .container span:last-child');
                        // Update numbers etc if needed
                    }
                }
            });
        });
    </script>
</section>

<!-- News Section -->
<section id="news" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-marukanBlue font-bold tracking-[0.2em] text-sm mb-2 block uppercase">News</span>
                <h2 class="text-4xl font-bold">お知らせ</h2>
            </div>
            <a href="<?php echo get_post_type_archive_link('post'); ?>" class="group flex items-center gap-3 font-bold text-gray-900">
                <span class="border-b-2 border-transparent group-hover:border-marukanBlue transition-all">一覧を見る</span>
                <div class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center group-hover:bg-marukanBlue group-hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php
            $news_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3));
            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                <article class="group bento-hover">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <div class="relative mb-6 overflow-hidden rounded-3xl aspect-[16/10] bg-gray-100 shadow-sm transition-all duration-500 group-hover:shadow-[0_20px_40px_-10px_rgba(0,64,152,0.2)]">
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition duration-700 group-hover:scale-110')); else : ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            <?php endif; ?>
                            <div class="absolute top-4 left-4">
                                <?php $categories = get_the_category(); if (!empty($categories)) : ?>
                                    <span class="bg-white/90 backdrop-blur-sm text-marukanBlue text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <time class="text-sm text-gray-400 font-medium mb-2 block"><?php echo get_the_date(); ?></time>
                        <h3 class="font-bold text-xl leading-snug group-hover:text-marukanBlue transition-colors line-clamp-2">
                            <?php the_title(); ?>
                        </h3>
                    </a>
                </article>
            <?php endwhile; wp_reset_postdata(); else : ?>
                <div class="col-span-3 py-20 text-center bg-gray-50 rounded-3xl border border-dashed border-gray-200 text-gray-400">
                    現在、お知らせはありません。
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Representative Message Section -->
<section id="message" class="py-32 bg-gray-50 overflow-hidden relative">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-marukanBlue/5 -skew-x-12 translate-x-1/2"></div>
    <div class="container mx-auto px-4 relative">
        <div class="max-w-4xl mx-auto">
            <div class="text-center md:text-left">
                <span class="text-marukanBlue font-bold tracking-[0.2em] text-sm mb-4 block uppercase">Message</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-10 leading-tight">
                    <?php echo esc_html(get_theme_mod('marukan_original_message_title', '食の未来を創り、<br>社会に貢献する。')); ?>
                </h2>
                <div class="text-gray-600 space-y-6 leading-relaxed text-xl md:text-2xl italic border-l-4 border-marukanBlue pl-8 mb-16">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_message_content', '1977年の創業以来、私たちは「食」という人々の営みに欠かせない領域で、常に最高の品質と新しい価値を追求してきました。卸売から製造まで一貫して手掛ける強みを活かし、変化し続けるニーズに応え続けます。'))); ?>
                </div>
                <div class="flex items-center justify-center md:justify-start gap-6">
                    <div class="w-16 h-px bg-marukanBlue"></div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">President & CEO</p>
                        <p class="font-bold text-2xl">西谷 賢亮</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Corporate Philosophy (Bento Box Design) -->
<section id="mvv" class="py-32 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20">
            <span class="text-marukanBlue font-bold tracking-[0.2em] text-sm mb-2 block uppercase">Philosophy</span>
            <h2 class="text-4xl font-bold">企業理念・MVV</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-6 h-auto md:h-[600px]">
            <!-- Mission (2x2) -->
            <div class="md:col-span-2 md:row-span-2 bg-marukanBlue text-white p-12 rounded-[2.5rem] flex flex-col justify-between shadow-xl">
                <div>
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z"></path></svg>
                    </div>
                    <span class="text-sm font-bold tracking-widest opacity-60 block mb-2 uppercase">Mission</span>
                    <h3 class="text-3xl font-bold mb-6"><?php echo nl2br(esc_html(get_theme_mod('marukan_original_mission', '美味しさと戦略をセットで届ける。顧客の繁盛を創る。'))); ?></h3>
                </div>
                <p class="text-lg opacity-80 leading-relaxed">
                    <?php echo esc_html(get_theme_mod('marukan_original_mission_desc', '私たちは単に食品を届けるだけでなく、その先にある顧客の成功を見据え、共に歩むパートナーであり続けます。')); ?>
                </p>
            </div>

            <!-- Vision (2x1) -->
            <div class="md:col-span-2 bg-gray-50 p-10 rounded-[2.5rem] flex items-center gap-8 shadow-sm border border-gray-100">
                <div class="shrink-0 w-16 h-16 bg-marukanBlue/10 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <span class="text-xs font-bold tracking-widest text-marukanBlue block mb-1 uppercase">Vision</span>
                    <h3 class="text-xl font-bold"><?php echo esc_html(get_theme_mod('marukan_original_vision', '「困ったら神戸まるかん」と一番に選ばれる、食のトータルソリューション・カンパニー。')); ?></h3>
                </div>
            </div>

            <!-- Value (1x1) -->
            <div class="md:col-span-1 bg-gray-50 p-10 rounded-[2.5rem] flex flex-col justify-center shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-marukanBlue/10 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="text-xs font-bold tracking-widest text-marukanBlue block mb-1 uppercase">Value</span>
                <h3 class="text-lg font-bold"><?php echo esc_html(get_theme_mod('marukan_original_value', '納品をゴールとせず、顧客の売上アップをゴールとする達人集団')); ?></h3>
            </div>

            <!-- Decoration/Image (1x1) -->
            <div class="md:col-span-1 relative overflow-hidden rounded-[2.5rem] shadow-sm">
                <img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=600" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-marukanBlue/20"></div>
            </div>
        </div>
    </div>
</section>

<!-- Members Section -->
<section id="members" class="py-32 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-end justify-between mb-20 gap-8">
            <div class="max-w-2xl">
                <span class="text-marukanBlue font-bold tracking-[0.2em] text-sm mb-2 block uppercase">Members</span>
                <h2 class="text-4xl font-bold mb-6">働く仲間</h2>
                <p class="text-gray-600 text-lg">神戸まるかんを支える、各分野のスペシャリストたちを紹介します。</p>
            </div>
        </div>

        <div class="max-w-5xl mx-auto space-y-12">
            <?php
            $member_query = new WP_Query(array('post_type' => 'member', 'posts_per_page' => -1));
            if ($member_query->have_posts()) :
                while ($member_query->have_posts()) : $member_query->the_post();
                    $dept = get_post_meta(get_the_ID(), 'member_dept', true);
            ?>
                <div class="bg-white p-10 rounded-[3rem] shadow-sm flex flex-col md:flex-row gap-10 bento-hover">
                    <div class="w-full md:w-1/3 shrink-0">
                        <div class="aspect-[4/5] rounded-2xl overflow-hidden">
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); else : ?>
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center">
                        <?php if ($dept) : ?>
                            <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6 w-fit"><?php echo esc_html($dept); ?></span>
                        <?php endif; ?>
                        <h3 class="text-2xl md:text-3xl font-bold mb-6 leading-snug"><?php echo strip_tags(get_the_excerpt()); ?></h3>
                        <div class="text-gray-600 text-lg leading-relaxed mb-8">
                            <?php the_content(); ?>
                        </div>
                        <p class="font-bold text-xl text-marukanBlue"><?php the_title(); ?></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); else : ?>
                <!-- Fallback if no members are registered -->
                <div class="bg-white p-10 rounded-[3rem] shadow-sm flex flex-col md:flex-row gap-10 bento-hover">
                    <div class="w-full md:w-1/3 shrink-0">
                        <div class="aspect-[4/5] rounded-2xl overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=800" alt="佐藤 結衣" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6 w-fit">営業本部 / 2018年入社</span>
                        <h3 class="text-2xl md:text-3xl font-bold mb-6 leading-snug">「食のプロとして、お客様の期待を超える提案を」</h3>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            単に商品を売るのではなく、その先の消費者が何を求めているかを常に考え提案しています。お客様と共に悩み、喜びを分かち合えるパートナーでありたいと考えています。
                        </p>
                        <p class="font-bold text-xl text-marukanBlue">佐藤 結衣 <span class="text-xs text-gray-400 ml-2 font-normal uppercase tracking-widest">Sato Yui</span></p>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[3rem] shadow-sm flex flex-col md:flex-row gap-10 bento-hover">
                    <div class="w-full md:w-1/3 shrink-0">
                        <div class="aspect-[4/5] rounded-2xl overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=800" alt="田中 健二" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="inline-block bg-blue-50 text-marukanBlue text-xs font-bold px-4 py-1 rounded-full mb-6 w-fit">製造部 / 2010年入社</span>
                        <h3 class="text-2xl md:text-3xl font-bold mb-6 leading-snug">「安全・安心、そして美味しさへの責任」</h3>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            最新の設備と職人の知恵を融合させ、神戸から全国へ最高の品質をお届けしています。日々の徹底した管理が、多くの人々の笑顔に繋がっていることを誇りに思います。
                        </p>
                        <p class="font-bold text-xl text-marukanBlue">田中 健二 <span class="text-xs text-gray-400 ml-2 font-normal uppercase tracking-widest">Tanaka Kenji</span></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- History Section -->
<section id="history" class="py-32 bg-white overflow-hidden">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-24">
            <span class="text-marukanBlue font-bold tracking-[0.2em] text-sm mb-2 block uppercase">History</span>
            <h2 class="text-4xl font-bold">神戸まるかんの歩み</h2>
        </div>

        <div class="relative">
            <!-- Continuous Line -->
            <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-px bg-gray-100 -translate-x-1/2"></div>

            <div class="space-y-24">
                <?php
                $history_raw = get_theme_mod('marukan_original_history');
                $history_items = [];

                if (!empty($history_raw)) {
                    $lines = explode("\n", str_replace("\r", "", $history_raw));
                    foreach ($lines as $line) {
                        $parts = explode('|', $line);
                        if (count($parts) >= 2) {
                            $history_items[] = [
                                'year'  => trim($parts[0]),
                                'title' => trim($parts[1]),
                                'text'  => isset($parts[2]) ? trim($parts[2]) : ''
                            ];
                        }
                    }
                }

                // Fallback to defaults if empty
                if (empty($history_items)) {
                    $history_items = [
                        ['year' => '1977', 'title' => '創業', 'text' => '神戸市中央区に前身となるマルカン商事株式会社を設立。'],
                        ['year' => '2005', 'title' => '工場設立', 'text' => '本社機能を東灘区に移転し、本社敷地内に工場を設立。自社製造を開始。'],
                        ['year' => '2017', 'title' => '新体制', 'text' => '株式会社神明グループに参画。より強固な経営基盤を構築。'],
                        ['year' => '2022', 'title' => '品質の証明', 'text' => '神戸工場にてISO22000認証取得。世界基準の安全性を確保。'],
                    ];
                }

                foreach ($history_items as $index => $item) :
                    $is_even = $index % 2 === 1;
                ?>
                <div class="relative flex items-center <?php echo $is_even ? 'md:flex-row-reverse' : ''; ?>">
                    <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-marukanBlue rounded-full -translate-x-1/2 z-10 ring-8 ring-blue-50"></div>
                    <div class="w-full md:w-1/2 pl-12 md:pl-0 <?php echo $is_even ? 'md:pl-20' : 'md:pr-20 text-left md:text-right'; ?>">
                        <div class="group">
                            <span class="text-6xl font-black text-gray-50 mb-2 block group-hover:text-blue-50 transition-colors"><?php echo $item['year']; ?></span>
                            <div class="-mt-8 relative z-10">
                                <h3 class="text-2xl font-bold mb-4"><?php echo $item['title']; ?></h3>
                                <p class="text-gray-500 leading-relaxed"><?php echo $item['text']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-20 text-center">
                <a href="#" class="inline-flex items-center gap-2 text-marukanBlue font-bold border-b-2 border-marukanBlue pb-1 hover:gap-4 transition-all">
                    詳細な沿革を見る
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Recruitment Section (Bento Box Design) -->
<section id="recruit" class="py-32 bg-gray-900 text-white rounded-[4rem] mx-4 mb-12 overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1551462147-37885acc3c41?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10"></div>
    <div class="container mx-auto px-8 relative">
        <div class="max-w-4xl mb-16">
            <span class="text-blue-400 font-bold tracking-[0.2em] text-sm mb-4 block uppercase">Recruit</span>
            <h2 class="text-4xl md:text-5xl font-bold mb-8">未来の食を、<br>共にデザインする。</h2>
            <p class="text-gray-400 text-lg">神戸まるかんは、常に新しい挑戦を楽しむ仲間を探しています。</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $rec_items = [
                ['slug' => 'new-graduate', 'title' => '新卒採用', 'desc' => 'これからの食の未来を共に創る、熱意ある若い力を募集しています。', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z'],
                ['slug' => 'career', 'title' => '中途採用', 'desc' => '培ってきた経験を活かし、神戸まるかんのさらなる成長を牽引してください。', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01'],
                ['slug' => 'part-time', 'title' => '準社員・パート', 'desc' => '地域に根ざした職場で、ライフスタイルに合わせた働き方を。', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z']
            ];
            foreach ($rec_items as $item) :
                $url = marukan_get_permalink_by_slug('recruit/' . $item['slug']);
            ?>
            <a href="<?php echo esc_url($url); ?>" class="group bg-white/5 backdrop-blur-md p-10 rounded-[2.5rem] border border-white/10 hover:bg-white hover:text-gray-900 transition-all duration-500 bento-hover shadow-2xl">
                <div class="w-16 h-16 bg-blue-500/20 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-marukanBlue transition-colors duration-500">
                    <svg class="w-8 h-8 text-blue-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $item['icon']; ?>"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4"><?php echo $item['title']; ?></h3>
                <p class="text-gray-400 group-hover:text-gray-600 leading-relaxed mb-10"><?php echo $item['desc']; ?></p>
                <div class="flex items-center font-bold gap-2 text-blue-400 group-hover:text-marukanBlue">
                    詳しく見る
                    <svg class="w-4 h-4 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Company Profile -->
<section id="company" class="py-32 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-20">
            <div class="w-full md:w-1/3">
                <span class="text-marukanBlue font-bold tracking-[0.2em] text-sm mb-2 block uppercase">Company</span>
                <h2 class="text-4xl font-bold mb-8">会社概要</h2>
                <div class="aspect-square rounded-[3rem] overflow-hidden shadow-lg border-8 border-gray-50">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1000" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-full md:w-2/3">
                <dl class="grid grid-cols-1 gap-0 border-t border-gray-100">
                    <?php
                    $company_data = [
                        '社名' => get_theme_mod('marukan_original_company_name', '株式会社神戸まるかん'),
                        '所在地' => get_theme_mod('marukan_original_address', '〒658-0023 兵庫県神戸市東灘区深江浜町5番地の1'),
                        '設立' => get_theme_mod('marukan_original_establish_date', '1977年（昭和52年）12月'),
                        '資本金' => get_theme_mod('marukan_original_capital', '3,000万円'),
                        '代表者' => get_theme_mod('marukan_original_ceo', '代表取締役社長　西谷 賢亮'),
                        '事業内容' => get_theme_mod('marukan_original_business', '水産物卸売及び加工販売、調理冷凍食品の製造販売、スイーツの製造販売、食品輸出入業務'),
                    ];
                    foreach ($company_data as $label => $val) :
                    ?>
                    <div class="flex flex-col md:flex-row py-8 border-b border-gray-100 items-start">
                        <dt class="w-full md:w-1/3 font-bold text-gray-900 mb-2 md:mb-0"><?php echo $label; ?></dt>
                        <dd class="w-full md:w-2/3 text-gray-600 leading-relaxed"><?php echo nl2br($val); ?></dd>
                    </div>
                    <?php endforeach; ?>
                </dl>
                <div class="mt-12">
                    <a href="https://maps.google.com/?q=兵庫県神戸市東灘区深江浜町5番地の1" target="_blank" class="inline-flex items-center gap-3 bg-gray-50 hover:bg-gray-100 px-8 py-4 rounded-2xl font-bold text-gray-900 transition-all">
                        <svg class="w-5 h-5 text-marukanBlue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                        Google Mapsで見る
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20">
    <div class="container mx-auto px-4">
        <div class="bg-marukanBlue rounded-[4rem] p-12 md:p-24 text-white text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-8">お気軽にご相談ください</h2>
                <p class="text-xl opacity-80 mb-16 max-w-2xl mx-auto leading-relaxed">食のトータルソリューション・カンパニーとして、貴社の課題解決に最適な提案をさせていただきます。</p>
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <a href="<?php echo esc_url(marukan_get_permalink_by_slug('contact')); ?>" class="bg-white text-marukanBlue px-12 py-6 rounded-full text-xl font-bold hover:bg-gray-100 hover:-translate-y-2 hover:shadow-[0_20px_50px_-10px_rgba(0,0,0,0.3)] transition-all shadow-xl">
                        お問い合わせフォーム
                    </a>
                    <a href="tel:078-431-6600" class="border-2 border-white/30 px-12 py-6 rounded-full text-xl font-bold hover:bg-white/10 transition-all">
                        078-431-6600
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products & Cases Section -->
<section id="products-cases" class="py-32 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Case Studies Card -->
            <a href="<?php echo get_post_type_archive_link('case_study'); ?>" class="group relative aspect-[16/9] md:aspect-auto md:h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg bento-hover">
                <img src="https://images.unsplash.com/photo-1543157145-f78c636d023d?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-marukanBlue/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-300 font-bold tracking-widest text-xs uppercase mb-2 block">Case Studies</span>
                    <h3 class="text-3xl font-bold">導入事例</h3>
                    <p class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">お客様と共に歩む、私たちの実績</p>
                </div>
            </a>

            <!-- Products Card (Main) -->
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="group relative aspect-[16/9] md:aspect-auto md:h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg bento-hover">
                <img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-400 font-bold tracking-widest text-xs uppercase mb-2 block">Products</span>
                    <h3 class="text-3xl font-bold">商品案内</h3>
                    <p class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">水産物からスイーツまで多彩なラインナップ</p>
                </div>
            </a>
        </div>

        <div class="text-center mb-16">
            <h3 class="text-2xl font-bold">カテゴリーから探す</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $cats = [
                ['name' => 'オーダーメイド', 'en' => 'Order Made', 'img' => 'https://images.unsplash.com/photo-1551462147-37885acc3c41?auto=format&fit=crop&q=80&w=600'],
                ['name' => 'シーフード', 'en' => 'Seafood', 'img' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&q=80&w=600'],
                ['name' => 'ソース', 'en' => 'Sauce', 'img' => 'https://images.unsplash.com/photo-1472476443507-c7a5948772fc?auto=format&fit=crop&q=80&w=600'],
                ['name' => 'スイーツ', 'en' => 'Sweets', 'img' => 'https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&q=80&w=600'],
            ];
            foreach ($cats as $cat) :
            ?>
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="group relative aspect-square rounded-[2.5rem] overflow-hidden shadow-sm bento-hover">
                <img src="<?php echo $cat['img']; ?>" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-marukanBlue/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <span class="text-blue-300 font-bold tracking-widest text-[10px] uppercase mb-1 block"><?php echo $cat['en']; ?></span>
                    <h3 class="text-2xl font-bold"><?php echo $cat['name']; ?></h3>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
