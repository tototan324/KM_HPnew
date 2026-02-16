<?php
/**
 * Template Name: 採用情報（アルバイト）
 */
get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <header class="mb-16 text-center">
                <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block uppercase">Part-time / Associate</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-8">パート・アルバイト採用</h1>
                <div class="w-20 h-1 bg-marukanBlue mx-auto mb-8"></div>
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    地域に根ざした職場で、<br class="hidden md:block">
                    あなたのライフスタイルに合わせた働き方を。
                </p>
            </header>

            <div class="mb-16 rounded-[2.5rem] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1556740734-7f952f69042c?auto=format&fit=crop&q=80&w=2000" alt="パート・アルバイト採用" class="w-full h-auto">
            </div>

            <section class="mb-20">
                <h2 class="text-3xl font-bold mb-10 flex items-center gap-4">
                    <span class="w-8 h-8 bg-marukanBlue text-white rounded-lg flex items-center justify-center text-lg">01</span>
                    未経験者も歓迎
                </h2>
                <div class="bg-gray-50 p-10 rounded-[2rem] text-gray-700 leading-relaxed text-lg space-y-6">
                    <p>
                        神戸工場では、製造や梱包、ピッキングなど様々な業務があります。丁寧に指導しますので、未経験の方も安心してスタートできます。
                    </p>
                    <p>
                        主婦の方や学生の方、シニアの方まで幅広い世代が活躍中。和気あいあいとした職場で、一緒に「美味しさ」を届けるお手伝いをしてください。
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
                                    製造ラインスタッフ、梱包・出荷作業
                                </td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">給与</th>
                                <td class="py-6 px-8 text-gray-600">時給 1,050円〜（経験考慮）</td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">勤務地</th>
                                <td class="py-6 px-8 text-gray-600">神戸工場（神戸市東灘区深江浜町）</td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">勤務時間</th>
                                <td class="py-6 px-8 text-gray-600">9:00〜17:00（時間・曜日相談可）</td>
                            </tr>
                            <tr>
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">待遇</th>
                                <td class="py-6 px-8 text-gray-600">交通費規定支給、制服貸与、有給休暇、車・バイク通勤可</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <div class="text-center">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')->ID)); ?>" class="inline-flex items-center gap-4 bg-marukanBlue text-white px-12 py-6 rounded-full text-xl font-bold transition-all hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">
                    お問い合わせ・応募
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
