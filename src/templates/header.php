
<div class="bg-gray-300 py-3 pre-header">
    <div class="max-w-7xl mx-auto flex justify-end pr-5">
        <?php echo do_shortcode('[gtranslate]') ?>
    </div>
</div>
<header id="masthead" class="site-header md:flex justify-between items-center max-w-7xl mx-auto p-5">
    <div class="site-branding">
        <?php logo( is_front_page() ) ?>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation flex items-center justify-center"> 
        <button title="main menu" class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
            <?php require get_template_directory() . '/src/templates/icons/bars.php'  ?>
        </button>

        <div class="mobile-menu flex flex-col justify-center">
            <button title="close menu" class="close-menu" aria-controls="mobile-menu">
                <?php require get_template_directory() . '/src/templates/icons/close.php'  ?>
            </button>
            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'mobile-1' ) ); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'mobile-2' ) ); ?>
        </div>

        <div class="flex">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
        ?>
        </div>
      
        <button class="green-bg font-sm pt-2 px-3 pb-2.5 font-semibold mx-3"><a href="/wp-admin">My Account</a></button>
        <?php require get_template_directory() . '/src/templates/icons/search.php'  ?>
        <?php get_search_form() ?>

    </nav><!-- #site-navigation -->
</header><!-- #masthead -->
 
<div class="secondary-menu flex justify-center w-full">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'menu-2',
            'menu_id'        => 'secondary-menu',
        )
    );
    ?>
</div>
