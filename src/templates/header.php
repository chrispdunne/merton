
<header id="masthead" class="site-header flex justify-between items-center max-w-7xl mx-auto p-5">
    <div class="site-branding">
        <?php logo( is_front_page() ) ?>
    </div><!-- .site-branding -->
    <nav id="site-navigation" class="main-navigation hidden items-center "> 
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <?php esc_html_e('Primary Menu', 'merton'); ?>
        </button>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            )
        );
        ?>
        <button class="teal-bg font-sm pt-2 px-3 pb-2.5 font-semibold mx-3">My Account</button>
        <?php require get_template_directory() . '/src/templates/icons/search.php'  ?>
 
    </nav><!-- #site-navigation -->
</header><!-- #masthead -->