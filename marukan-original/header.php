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
    <header id="main-header" class="fixed w-full z-50 transition-all duration-500 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="container mx-auto px-4 h-20 md:h-24 flex items-center justify-between transition-all duration-500" id="header-container">
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
                    $home_url = esc_url(home_url('/'));
                    ?>
                    <a href="<?php echo $home_url; ?>#news" class="text-sm font-bold hover:text-marukanBlue transition">お知らせ</a>
                    <a href="<?php echo $home_url; ?>#products-cases" class="text-sm font-bold hover:text-marukanBlue transition">商品案内・事例</a>
                    <a href="<?php echo $home_url; ?>#members" class="text-sm font-bold hover:text-marukanBlue transition">働く仲間</a>
                    <?php
                    $recruit_page = get_page_by_path('recruit');
                    $recruit_url = $recruit_page ? get_permalink($recruit_page->ID) : $home_url . '#recruit';
                    ?>
                    <a href="<?php echo esc_url($recruit_url); ?>" class="text-sm font-bold hover:text-marukanBlue transition">採用情報</a>
                    <a href="<?php echo $home_url; ?>#company" class="text-sm font-bold hover:text-marukanBlue transition">会社概要</a>
                    <?php
                    $contact_url = marukan_get_permalink_by_slug('contact');
                    ?>
                    <a href="<?php echo esc_url($contact_url); ?>" class="bg-marukanBlue text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-blue-800 transition">お問い合わせ</a>
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
                    $home_url = esc_url(home_url('/'));
                    ?>
                    <a href="<?php echo $home_url; ?>#news" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">お知らせ</a>
                    <a href="<?php echo $home_url; ?>#products-cases" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">商品案内・導入事例</a>
                    <a href="<?php echo $home_url; ?>#members" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">働く仲間</a>
                    <?php
                    $recruit_page = get_page_by_path('recruit');
                    $recruit_url = $recruit_page ? get_permalink($recruit_page->ID) : $home_url . '#recruit';
                    ?>
                    <a href="<?php echo esc_url($recruit_url); ?>" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">採用情報</a>
                    <a href="<?php echo $home_url; ?>#company" class="text-lg font-bold py-2 border-b border-gray-100 mobile-link">会社概要</a>
                    <?php
                    $contact_url = marukan_get_permalink_by_slug('contact');
                    ?>
                    <a href="<?php echo esc_url($contact_url); ?>" class="bg-marukanBlue text-white px-6 py-4 rounded-xl text-center font-bold mobile-link">お問い合わせ</a>
                    <?php
                }
                ?>
            </nav>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const header = document.getElementById('main-header');
                const container = document.getElementById('header-container');
                const button = document.getElementById('mobile-menu-button');
                const menu = document.getElementById('mobile-menu');
                const menuIcon = document.getElementById('menu-icon');
                const closeIcon = document.getElementById('close-icon');
                const links = document.querySelectorAll('.mobile-link');

                // Header Scroll Effect
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        header.classList.add('bg-white', 'shadow-lg');
                        header.classList.remove('bg-white/80', 'backdrop-blur-md');
                        container.classList.remove('md:h-24');
                        container.classList.add('md:h-20');
                    } else {
                        header.classList.remove('bg-white', 'shadow-lg');
                        header.classList.add('bg-white/80', 'backdrop-blur-md');
                        container.classList.add('md:h-24');
                        container.classList.remove('md:h-20');
                    }
                });

                function toggleMenu() {
                    menu.classList.toggle('hidden');
                    menu.classList.toggle('animate-fade-in');
                    menuIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                    document.body.classList.toggle('overflow-hidden');
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
