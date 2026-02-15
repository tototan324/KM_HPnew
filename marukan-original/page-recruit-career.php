<?php
/**
 * Template Name: 中途採用
 */
get_header(); ?>

<div class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <header class="mb-16 text-center">
                <span class="text-marukanBlue font-bold tracking-widest text-sm mb-4 block uppercase">Career Recruitment</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-8">中途採用</h1>
                <div class="w-20 h-1 bg-marukanBlue mx-auto mb-8"></div>
                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    あなたの培ってきた経験とスキルを、<br class="hidden md:block">
                    神戸まるかんのさらなる飛躍のために活かしませんか。
                </p>
            </header>

            <div class="mb-16 rounded-[2.5rem] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2000" alt="中途採用" class="w-full h-auto">
            </div>

            <section class="mb-20">
                <h2 class="text-3xl font-bold mb-10 flex items-center gap-4">
                    <span class="w-8 h-8 bg-marukanBlue text-white rounded-lg flex items-center justify-center text-lg">01</span>
                    プロフェッショナルとして
                </h2>
                <div class="bg-gray-50 p-10 rounded-[2rem] text-gray-700 leading-relaxed text-lg space-y-6">
                    <p>
                        私たちは、専門性を持ち、自律的に行動できるプロフェッショナルを求めています。食品業界での経験はもちろん、他業界で培った知見が私たちの新しい力になります。
                    </p>
                    <p>
                        中途入社の社員も多く活躍しており、実力と成果を正当に評価する文化があります。神戸から世界へ、食の価値を届ける挑戦に加わってください。
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
                                    営業職、品質管理職、製造管理、開発職
                                </td>
                            </tr>
                            <tr class="border-b border-gray-50">
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">給与</th>
                                <td class="py-6 px-8 text-gray-600">経験・能力を考慮の上、当社規定により決定します。</td>
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
                                <th class="py-6 px-8 bg-gray-50 text-gray-700 font-bold">福利厚生</th>
                                <td class="py-6 px-8 text-gray-600">社会保険完備、退職金制度、産休・育休制度、各種手当（通勤・住宅・家族）</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <div class="text-center">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center gap-4 bg-marukanBlue text-white px-12 py-6 rounded-full text-xl font-bold transition-all hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">
                    キャリア登録・応募
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
