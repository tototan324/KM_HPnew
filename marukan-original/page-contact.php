<?php
/**
 * Template Name: お問い合わせ（フォーム）
 */
get_header(); ?>

<div class="pt-32 pb-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <header class="mb-16 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">お問い合わせ</h1>
                <p class="text-gray-400 tracking-widest uppercase text-sm">Contact</p>
                <div class="w-20 h-1 bg-marukanBlue mx-auto mt-8 mb-8"></div>
                <p class="text-gray-600 leading-relaxed">
                    商品に関するご相談、採用に関するご質問など、<br class="hidden md:block">
                    お気軽にお問い合わせください。
                </p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <!-- Phone Contact -->
                <div class="bg-white p-10 rounded-[2rem] shadow-sm border border-gray-100 flex items-center gap-6">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 font-bold block mb-1">お電話でのお問い合わせ</span>
                        <a href="tel:078-431-6600" class="text-2xl font-bold text-marukanBlue hover:underline">078-431-6600</a>
                        <p class="text-xs text-gray-500 mt-1">受付時間：平日 9:00〜17:00</p>
                    </div>
                </div>

                <!-- Email/Form Intro -->
                <div class="bg-white p-10 rounded-[2rem] shadow-sm border border-gray-100 flex items-center gap-6">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-marukanBlue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 font-bold block mb-1">フォームでのお問い合わせ</span>
                        <p class="text-sm text-gray-600">
                            以下のフォームより必要事項を<br>ご入力の上、送信してください。
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 md:p-16 rounded-[3rem] shadow-xl border border-gray-100">
                <?php
                $cf7_id = get_theme_mod('marukan_original_cf7_id');
                if (!empty($cf7_id)) {
                    if (strpos($cf7_id, '[') !== false) {
                        echo do_shortcode($cf7_id);
                    } else {
                        echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_id) . '"]');
                    }
                } else {
                    ?>
                    <div class="text-center py-12">
                        <p class="text-gray-400 mb-6">コンタクトフォームを設置するには、管理画面の「カスタマイズ」からショートコードを設定してください。</p>
                        <div class="space-y-4 max-w-md mx-auto text-left opacity-50 pointer-events-none">
                            <div class="h-10 bg-gray-100 rounded-lg"></div>
                            <div class="h-10 bg-gray-100 rounded-lg"></div>
                            <div class="h-32 bg-gray-100 rounded-lg"></div>
                            <div class="h-14 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Privacy Policy Notice -->
            <div class="mt-12 text-center text-sm text-gray-400">
                <p>
                    お問い合わせいただいた内容は、弊社の<a href="<?php echo esc_url(marukan_get_permalink_by_slug('privacy-policy')); ?>" class="underline hover:text-marukanBlue">プライバシーポリシー</a>に基づき適切に管理いたします。
                </p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
