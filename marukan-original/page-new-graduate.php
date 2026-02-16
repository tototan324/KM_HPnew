<?php get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <header class="mb-16 text-center">
                <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block uppercase">New Graduate Recruitment</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-8">新卒採用</h1>
                <div class="w-20 h-1 bg-marukanBlue mx-auto mb-8"></div>
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    これからの食の未来を共に創り、<br class="hidden md:block">
                    成長し続ける情熱を持った若い力を募集しています。
                </p>
            </header>

            <div class="mb-16 rounded-[2.5rem] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&q=80&w=2000" alt="新卒採用" class="w-full h-auto">
            </div>

            <section class="mb-20">
                <h2 class="text-3xl font-bold mb-10 flex items-center gap-4">
                    <span class="w-8 h-8 bg-marukanBlue text-white rounded-lg flex items-center justify-center text-lg">01</span>
                    私たちの想い
                </h2>
                <div class="bg-gray-50 p-10 rounded-[2rem] text-gray-700 leading-relaxed text-lg space-y-6">
                    <p>
                        神戸まるかんは、1977年の創業以来「食」を通じて社会に貢献してきました。卸売から始まり、現在は自社工場での製造も手がける「食のトータルソリューション・カンパニー」へと進化を続けています。
                    </p>
                    <p>
                        新卒の皆様に期待するのは、既成概念にとらわれない新しい発想と、変化を恐れない挑戦心です。若いうちから責任ある仕事を任せ、一人ひとりの成長を会社全体でバックアップします。
                    </p>
                </div>
            </section>

            <section class="mb-20">
                <h2 class="text-3xl font-bold mb-10 flex items-center gap-4">
                    <span class="w-8 h-8 bg-marukanBlue text-white rounded-lg flex items-center justify-center text-lg">02</span>
                    募集要項
                </h2>
                <div class="overflow-hidden rounded-[2rem] border border-gray-100 shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <tbody>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 w-1/3 text-gray-700 font-bold">募集職種</th>
                                <td class="py-6 px-8 text-gray-600">
                                    総合職（営業・品質管理・生産管理・企画）
                                </td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">給与</th>
                                <td class="py-6 px-8 text-gray-600">大学卒：220,000円〜（諸手当別）</td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">勤務地</th>
                                <td class="py-6 px-8 text-gray-600">神戸本社、神戸工場、東京営業所</td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">勤務時間</th>
                                <td class="py-6 px-8 text-gray-600">8:30〜17:30（休憩60分）</td>
                            </tr>
                            <tr>
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">休日・休暇</th>
                                <td class="py-6 px-8 text-gray-600">週休2日制、祝日、夏季休暇、年末年始休暇、有給休暇、慶弔休暇</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <div class="text-center">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')->ID)); ?>" class="inline-flex items-center gap-4 bg-marukanBlue text-white px-12 py-6 rounded-full text-xl font-bold transition-all hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">
                    エントリーする
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
