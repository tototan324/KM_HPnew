</main>

<footer class="bg-gray-50 pt-16 pb-8 border-t border-gray-200">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <div class="text-2xl font-bold text-marukanBlue mb-4">神戸まるかん</div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_philosophy', "私たちは食を通じて、美味しさと幸せを創造し、\n人々の明るい食生活に貢献します。"))); ?>
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4">所在地</h4>
                <p class="text-sm text-gray-600 mb-2">
                    <?php echo nl2br(esc_html(get_theme_mod('marukan_original_address', "神戸本社\n〒658-0023\n兵庫県神戸市東灘区深江浜町5番地の1"))); ?>
                </p>
                <p class="text-sm text-gray-600">
                    TEL: 078-431-6600
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4">メニュー</h4>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><a href="#" class="hover:text-marukanBlue">プライバシーポリシー</a></li>
                    <li><a href="#" class="hover:text-marukanBlue">サイトマップ</a></li>
                    <li><a href="https://www.marukan.jp/" class="hover:text-marukanBlue">旧サイトはこちら</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; <?php echo date('Y'); ?> 株式会社神戸まるかん All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
