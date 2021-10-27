<header class="header">
    <div class="header-inner clearfix">

        <a class="logo" href="/">
            <?php /* <img src="<?php echo bloginfo('template_url'); ?>/img/lj-ross-logo.png" /> */ ?>
            <h2 class="logo">LJ Ross.</h2>
        </a>

        <nav class="header-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu clearfix' ) ); ?>
        </nav>

        <div class="nav-wrapper clearfix">
            <?php /* <a class="btn btn--primary" href="">Stay in touch</a> */ ?>
            <?php gravity_form( 1, false, false, false, '', false ); ?>
            <button class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </div>
</header>
