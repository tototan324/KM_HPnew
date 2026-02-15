<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Analytics placeholder -->
    <?php if ( !empty(get_theme_mod('ga_tracking_id')) ) : ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr(get_theme_mod('ga_tracking_id')); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo esc_attr(get_theme_mod('ga_tracking_id')); ?>');
    </script>
    <?php endif; ?>
    <?php wp_head(); ?>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        marukanBlue: '<?php echo esc_attr(get_theme_mod('marukan_original_primary_color', '#004098')); ?>',
                    }
                }
            }
        }
    </script>
</head>
<body <?php body_class(); ?>>
    <header class="fixed w-full z-50 transition-all duration-300 bg-white/90 backdrop-blur-sm shadow-sm">
        <div class="container mx-auto px-4 h-20 flex items-center justify-between">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl font-bold text-marukanBlue tracking-tighter">
                    株式会社神戸まるかん
                </a>
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-8">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new Marukan_Original_Tailwind_Walker(),
                    ));
                } else {
                    ?>
                    <a href="#news" class="text-sm font-bold hover:text-marukanBlue transition">お知らせ</a>
                    <a href="#message" class="text-sm font-bold hover:text-marukanBlue transition">メッセージ</a>
                    <a href="#members" class="text-sm font-bold hover:text-marukanBlue transition">働く仲間</a>
                    <a href="#history" class="text-sm font-bold hover:text-marukanBlue transition">歩み</a>
                    <a href="#recruit" class="text-sm font-bold hover:text-marukanBlue transition">採用情報</a>
                    <a href="#company" class="text-sm font-bold hover:text-marukanBlue transition">会社概要</a>
                    <a href="#contact" class="bg-marukanBlue text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-blue-800 transition">お問い合わせ</a>
                    <?php
                }
                ?>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden p-2 text-marukanBlue focus:outline-none" aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-xl overflow-hidden transition-all duration-300 ease-in-out">
            <nav class="flex flex-col p-6 space-y-4">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new Marukan_Original_Tailwind_Mobile_Walker(),
                    ));
                } else {
                    ?>
                    <a href="#news" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">お知らせ</a>
                    <a href="#message" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">代表メッセージ</a>
                    <a href="#members" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">働く仲間</a>
                    <a href="#history" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">歩み</a>
                    <a href="#recruit" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">採用情報</a>
                    <a href="#company" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">会社概要</a>
                    <a href="#contact" class="bg-marukanBlue text-white px-6 py-4 rounded-xl text-center font-bold mobile-link">お問い合わせ</a>
                    <?php
                }
                ?>
            </nav>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const button = document.getElementById('mobile-menu-button');
                const menu = document.getElementById('mobile-menu');
                const menuIcon = document.getElementById('menu-icon');
                const closeIcon = document.getElementById('close-icon');
                const links = document.querySelectorAll('.mobile-link');

                function toggleMenu() {
                    menu.classList.toggle('hidden');
                    menuIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                }

                button.addEventListener('click', toggleMenu);

                links.forEach(link => {
                    link.addEventListener('click', () => {
                        if (!menu.classList.contains('hidden')) {
                            toggleMenu();
                        }
                    });
                });
            });
        </script>
    </header>
    <main>
