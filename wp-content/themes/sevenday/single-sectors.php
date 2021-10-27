<?php
get_header();

$background_image = get_field( 'background_image' );

if ( is_null( $background_image ) ) {
	$background_image = '/wp-content/uploads/2020/10/the-drift-28513.jpg';
}
?>
    <div class="hero">
        <div class="outter">
            <div class="inner">
                <div class="hero-content">
                    <div class="container">
                        <h1 class="hero-title" style="width: 80%;"><?php the_title(); ?></h1>
                        <svg class="down-arrow" xmlns="http://www.w3.org/2000/svg" width="14.486" height="18.412" viewBox="0 0 14.486 18.412">
                            <path d="M7.073,26.241h0L0,19.172l1.414-1.415,4.829,4.829V8h2V22.586l4.829-4.829,1.415,1.415-7.241,7.24Z" transform="translate(0 -8)"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-image" style="background: url(<?php echo $background_image; ?>) no-repeat; background-size: 100% 100%;">
            <div class="overlay" style="position: absolute;background-color: rgba(0, 0, 0, 0.6);height: 100%;width: 100%;top: 0;left: 0;"></div>
        </div>
    </div>
<?php
get_layouts();

get_footer();