<?php

// Button
function button_shortcode($atts) {
    extract(shortcode_atts(array(
        'link' => '#',
        'text' => 'Find out more',
        'class' => 'primary'
    ), $atts));

    $return = '<a class="btn btn--'.$class.'" href="'.$link.'">'.$text.'</a>';

    return $return;
}
add_shortcode('button', 'button_shortcode');

// custom Social Media
function social_shortcode($atts) {
    extract(shortcode_atts(array(
        'facebook' => '',
        'twitter' => '',
        'instagram' => ''
    ), $atts));

    $return = '<ul class="custom-social">
        <li class="social-links">
            <a href="' . $facebook . '" class="facebook"><i class="icon-facebook"></i></a>
            <a href="' . $twitter . '" class="twitter"><i class="icon-twitter"></i></a>
        </li>
    </ul>';

    return $return;
}
add_shortcode('social-media', 'social_shortcode');

// Custom UL
function custom_ul($atts, $content) {
    extract(shortcode_atts(array(
      'class' => ''
    ), $atts));

    $return = '<ul class="'.$class.'">'.do_shortcode($content).'</ul>';
    $return =  preg_replace("#<br\s*/?>#i", "\n", $return);

    return $return;
}
add_shortcode('custom-ul', 'custom_ul');

// Cutsom LI
function li($atts, $content) {
    extract(shortcode_atts(array(
      'class' => ''
    ), $atts));

    $return = '<li class="'.$class.'">'.do_shortcode($content).'</li>';
    $return =  preg_replace("#<br\s*/?>#i", "\n", $return);

    return $return;
}
add_shortcode('li', 'li');

// Contact Details
function contact_details() {
    ob_start();
    locate_template( 'partials/contact-details.php', true );
    return ob_get_clean();
}
add_shortcode( 'contact-details', 'contact_details' );
