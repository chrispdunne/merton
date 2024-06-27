<?php function logo( $is_home = false ) {
    $tag = $is_home ? 'h1' : 'p'; ?>
    <<?php echo $tag ?> class="site-title">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img 
                class="mx-auto"
                src="<?php echo get_template_directory_uri() ?>/images/logo.svg" 
                alt="Merton SSP" 
                onerror="this.src='<?php echo get_template_directory_uri() ?>/images/logo.png'; this.onerror=null;"
            />
        </a>
    </<?php echo $tag ?>>
<?php } ?>
