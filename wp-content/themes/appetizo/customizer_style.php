<?php
/**
 Customizer Style
 */

function appetizo_customizer_css() {
    ?>
    <style type="text/css">
        .below-slider-wrapper input[type="submit"], .readmore:hover,::selection,#sidebar .widget_categories li a:hover + span, .footer-inside .widget_categories li a:hover + span,.widget_archive li a:hover + span,.navigation li a:hover, .navigation li.active a,#commentform #submit:hover, .wpcf7-submit:hover ,#searchsubmit,#credits:hover, .below-slider-wrapper .mc4wp-form input[type="submit"],#commentform #submit, .wpcf7-submit,.featured-box-item:hover h4,.featured-box-link .featured-box-overlay h4:after,.post span.post-category a:after{  background:<?php echo esc_attr(get_theme_mod( 'appetizo_main_color' )); ?>; }

        #searchform input, #secondary #searchform #searchsubmit,.readmore:hover,.navigation li a:hover, .navigation li.active a,#commentform #submit, .wpcf7-submit {  border-color:<?php echo esc_attr(get_theme_mod( 'appetizo_main_color' )); ?>; }



        #sidebar .widget h2, .footer-inside .widget h2 {  outline-color:<?php echo esc_attr(get_theme_mod( 'appetizo_main_color' )); ?>; }

        span.post-category a,a:hover,.scroll-post .post-category a, .slick-dots li.slick-active button:before,#sidebar a:hover,.theme-author a,.post-content a,.appetizo_bio_section a,#commentform #submit, .wpcf7-submit,.bar a:hover, .side-pop.list:hover .side-count,.post-list .post .entry-title a:hover, #content .entry-title a:hover{  color:<?php echo esc_attr(get_theme_mod( 'appetizo_main_color' )); ?>; }

        .logo-text a,.logo-text h1 a , .logo-text span{ color:#<?php echo esc_attr(get_header_textcolor()); ?>; }
        .logo-text h1 a:hover{ color:<?php echo esc_attr(get_theme_mod('appetizo_header_hover_color')); ?> }
        .appetizo-top-bar,.slicknav_menu{ background:<?php echo esc_attr(get_theme_mod('appetizo_top_header')); ?> }
        .appetizo-top-bar a,#modal-1 a,button#open-trigger{ color:<?php echo esc_attr(get_theme_mod('appetizo_top_header_color')); ?> }
        
    </style>
    <?php
}
add_action( 'wp_head', 'appetizo_customizer_css' );

?>