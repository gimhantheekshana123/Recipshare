<?php
/**
 * Template for the Post Layout Boxes on the homepage.
 *
 * @package appetizo
 * @since appetizo 1.0
 */
?>

    <!--  scroller -->
<?php if( is_home() ) {

    $default_value = __('SEE MORE POSTS', 'appetizo');
?>
    <div class="layoutboxes">
<?php
    if (get_theme_mod('appetizo_customizer_layoutbox1_disable') != 'disable') { ?>

        <div class="layoutbox1">
            <div class="layoutbox1-title">
                <?php
                if(get_theme_mod('appetizo_layoutbox1_title')){ ?>
                    <h2><?php echo wp_kses_post(get_theme_mod('appetizo_layoutbox1_title')) ?></h2>
                    <?php
                }
                else{ ?>
                    <div class="borderline"></div>
                    <?php
                }
                ?>

            </div>

            <div class="appetizo_layoutbox1  clearfix">
                <?php
                $appetizo_image_box1 = "appetizo-medium-image";
                $appetizo_numberbox1 = get_theme_mod('appetizo_layoutbox1_no');
                $appetizo_categorybox1 = get_theme_mod('appetizo_layoutbox1_category');
                if($appetizo_numberbox1 > 3){
                    $appetizo_nobox1 = 3;
                }
                else{
                    $appetizo_nobox1 = 3;
                }
                $appetizo_featured_list_args_box1 = array(
                    'posts_per_page' => $appetizo_nobox1,
                    'cat' => $appetizo_categorybox1
                );
                $appetizo_featured_list_posts_box1 = new WP_Query($appetizo_featured_list_args_box1);
                ?>

                <?php while ($appetizo_featured_list_posts_box1->have_posts()) : $appetizo_featured_list_posts_box1->the_post() ?>

                    <div class="item-layoutbox1">
                        <div class="layoutbox1-wrap">

                            <?php if (has_post_thumbnail()) {
                                $appetizo_image_src_box1 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $appetizo_image_box1); ?>
                                <div class="image-layoutbox1">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if (!$appetizo_image_src_box1) {
                                            echo esc_url(get_template_directory_uri() . '/images/slider-default.png');
                                        } else {
                                            echo esc_url($appetizo_image_src_box1[0]);
                                        } ?>);"></div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="image-layoutbox1">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item"
                                             style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h3 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="description">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="layoutbox1-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div
                                                    class="postcomment"><?php comments_popup_link(__('0', 'appetizo'), __('1', 'appetizo'), __('%', 'appetizo'), '', ''); ?></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>



            </div>
            <?php if (get_theme_mod('appetizo_seemore_layoutbox1_disable') != 'disable') { ?>

                <div class="see-more">
                    <a href="<?php echo esc_url(get_category_link($appetizo_categorybox1)); ?>"><?php
                        echo wp_kses_post(get_theme_mod('appetizo_layoutbox1_seemore',$default_value)) ?>
                    </a>

                </div>
            <?php } ?>
        </div><!-- Layoutbox1 -->

    <?php }

    if (get_theme_mod('appetizo_customizer_layoutbox2_disable') != 'disable') { ?>

        <div class="layoutbox2">
            <div class="layoutbox2-title">
                <?php
                if(get_theme_mod('appetizo_layoutbox2_title')){ ?>
                    <h2><?php echo wp_kses_post(get_theme_mod('appetizo_layoutbox2_title')) ?></h2>
                    <?php
                }
                else{ ?>
                    <div class="borderline"></div>
                    <?php
                }
                ?>

            </div>

            <div class="appetizo_layoutbox2  clearfix">
                <?php
                $appetizo_image_box2 = "appetizo-medium-image";
                $appetizo_numberbox2 = get_theme_mod('appetizo_layoutbox2_no');
                $appetizo_categorybox2 = get_theme_mod('appetizo_layoutbox2_category');
                if($appetizo_numberbox2 > 5){
                    $appetizo_nobox2 = 5;
                }
                else{
                    $appetizo_nobox2 = 5;
                }
                $appetizo_featured_list_args_box2 = array(
                    'posts_per_page' => $appetizo_nobox2,
                    'cat' => $appetizo_categorybox2
                );
                $appetizo_featured_list_posts_box2 = new WP_Query($appetizo_featured_list_args_box2);
                ?>

                <?php while ($appetizo_featured_list_posts_box2->have_posts()) : $appetizo_featured_list_posts_box2->the_post() ?>

                    <div class="item-layoutbox2">
                        <div class="layoutbox2-wrap">

                            <?php if (has_post_thumbnail()) {
                                $appetizo_image_src_box2 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $appetizo_image_box2); ?>
                                <div class="image-layoutbox2">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if (!$appetizo_image_src_box2) {
                                            echo esc_url(get_template_directory_uri() . '/images/slider-default.png');
                                        } else {
                                            echo esc_url($appetizo_image_src_box2[0]);
                                        } ?>);"></div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="image-layoutbox2">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item"
                                             style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h3 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="description">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="layoutbox2-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div
                                                    class="postcomment"><?php comments_popup_link(__('0', 'appetizo'), __('1', 'appetizo'), __('%', 'appetizo'), '', ''); ?></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if (get_theme_mod('appetizo_seemore_layoutbox2_disable') != 'disable') { ?>

                <div class="see-more">
                    <a href="<?php echo esc_url(get_category_link($appetizo_categorybox2)); ?>"><?php

                        echo wp_kses_post(get_theme_mod('appetizo_layoutbox2_seemore',$default_value)) ?>
                    </a>

                </div>
            <?php } ?>
        </div><!-- Layoutbox2 -->
        <?php
    }

    if (get_theme_mod('appetizo_customizer_layoutbox3_disable') != 'disable') { ?>

        <div class="layoutbox3">
            <div class="layoutbox3-title">
                <?php
                if(get_theme_mod('appetizo_layoutbox3_title')){ ?>
                    <h2><?php echo wp_kses_post(get_theme_mod('appetizo_layoutbox3_title')) ?></h2>
                    <?php
                }
                else{ ?>
                    <div class="borderline"></div>
                    <?php
                }
                ?>

            </div>

            <div class="appetizo_layoutbox3  clearfix">
                <?php
                $appetizo_image_box3 = "appetizo-medium-image";
                $appetizo_numberbox3 = get_theme_mod('appetizo_layoutbox3_no');
                $appetizo_categorybox3 = get_theme_mod('appetizo_layoutbox3_category');
                if($appetizo_numberbox3 > 5){
                    $appetizo_nobox3 = 5;
                }
                else{
                    $appetizo_nobox3 = 5;
                }
                $appetizo_featured_list_args_box3 = array(
                    'posts_per_page' => $appetizo_nobox3,
                    'cat' => $appetizo_categorybox3
                );
                $appetizo_featured_list_posts_box3 = new WP_Query($appetizo_featured_list_args_box3);
                ?>

                <?php while ($appetizo_featured_list_posts_box3->have_posts()) : $appetizo_featured_list_posts_box3->the_post() ?>

                    <div class="item-layoutbox3">
                        <div class="layoutbox3-wrap">

                            <?php if (has_post_thumbnail()) {
                                $appetizo_image_src_box3 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $appetizo_image_box3); ?>
                                <div class="image-layoutbox3">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if (!$appetizo_image_src_box3) {
                                            echo esc_url(get_template_directory_uri() . '/images/slider-default.png');
                                        } else {
                                            echo esc_url($appetizo_image_src_box3[0]);
                                        } ?>);"></div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="image-layoutbox3">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item"
                                             style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h3 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="description">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="layoutbox3-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div
                                                    class="postcomment"><?php comments_popup_link(__('0', 'appetizo'), __('1', 'appetizo'), __('%', 'appetizo'), '', ''); ?></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if (get_theme_mod('appetizo_seemore_layoutbox3_disable') != 'disable') { ?>

                <div class="see-more">
                    <a href="<?php echo esc_url(get_category_link($appetizo_categorybox3)); ?>"><?php

                        echo wp_kses_post(get_theme_mod('appetizo_layoutbox3_seemore',$default_value)) ?>
                    </a>

                </div>
            <?php } ?>
        </div><!-- Layoutbox3 -->
        <?php
    }

    if (get_theme_mod('appetizo_customizer_layoutbox4_disable') != 'disable') { ?>

        <div class="layoutbox4">
            <div class="layoutbox4-title">
                <?php
                if(get_theme_mod('appetizo_layoutbox4_title')){ ?>
                    <h2><?php echo wp_kses_post(get_theme_mod('appetizo_layoutbox4_title')) ?></h2>
                    <?php
                }
                else{ ?>
                    <div class="borderline"></div>
                    <?php
                }
                ?>

            </div>

            <div class="appetizo_layoutbox4  clearfix">
                <?php
                $appetizo_image_box4 = "appetizo-medium-image";
                $appetizo_numberbox4 = get_theme_mod('appetizo_layoutbox4_no');
                $appetizo_categorybox4 = get_theme_mod('appetizo_layoutbox4_category');
                if($appetizo_numberbox4 > 6){
                    $appetizo_nobox4 = 6;
                }
                else{
                    $appetizo_nobox4 = 6;
                }
                $appetizo_featured_list_args_box4 = array(
                    'posts_per_page' => $appetizo_nobox4,
                    'cat' => $appetizo_categorybox4
                );
                $appetizo_featured_list_posts_box4 = new WP_Query($appetizo_featured_list_args_box4);
                ?>

                <?php while ($appetizo_featured_list_posts_box4->have_posts()) : $appetizo_featured_list_posts_box4->the_post() ?>

                    <div class="item-layoutbox4">
                        <div class="layoutbox4-wrap">

                            <?php if (has_post_thumbnail()) {
                                $appetizo_image_src_box4 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $appetizo_image_box4); ?>
                                <div class="image-layoutbox4">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if (!$appetizo_image_src_box4) {
                                            echo esc_url(get_template_directory_uri() . '/images/slider-default.png');
                                        } else {
                                            echo esc_url($appetizo_image_src_box4[0]);
                                        } ?>);"></div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="image-layoutbox4">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item"
                                             style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h3 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="layoutbox4-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div
                                                    class="postcomment"><?php comments_popup_link(__('0', 'appetizo'), __('1', 'appetizo'), __('%', 'appetizo'), '', ''); ?></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if (get_theme_mod('appetizo_seemore_layoutbox4_disable') != 'disable') { ?>

                <div class="see-more">
                    <a href="<?php echo esc_url(get_category_link($appetizo_categorybox4)); ?>"><?php

                        echo wp_kses_post(get_theme_mod('appetizo_layoutbox4_seemore',$default_value)) ?>
                    </a>

                </div>
            <?php } ?>
        </div><!-- Layoutbox4 -->
        <?php
    }

    if (get_theme_mod('appetizo_customizer_layoutbox5_disable') != 'disable') { ?>

        <div class="layoutbox5">
            <div class="layoutbox5-title">
                <?php
                if(get_theme_mod('appetizo_layoutbox5_title')){ ?>
                    <h2><?php echo wp_kses_post(get_theme_mod('appetizo_layoutbox5_title')) ?></h2>
                    <?php
                }
                else{ ?>
                    <div class="borderline"></div>
                    <?php
                }
                ?>

            </div>

            <div class="appetizo_layoutbox5  clearfix">
                <?php
                $appetizo_image_box5 = "appetizo-medium-image";
                $appetizo_numberbox5 = get_theme_mod('appetizo_layoutbox5_no');
                $appetizo_categorybox5 = get_theme_mod('appetizo_layoutbox5_category');
                if($appetizo_numberbox5 > 3){
                    $appetizo_nobox5 = 3;
                }
                else{
                    $appetizo_nobox5 = 3;
                }
                $appetizo_featured_list_args_box5 = array(
                    'posts_per_page' => $appetizo_nobox5,
                    'cat' => $appetizo_categorybox5
                );
                $appetizo_featured_list_posts_box5 = new WP_Query($appetizo_featured_list_args_box5);
                ?>

                <?php while ($appetizo_featured_list_posts_box5->have_posts()) : $appetizo_featured_list_posts_box5->the_post() ?>

                    <div class="item-layoutbox5">
                        <div class="layoutbox5-wrap">

                            <?php if (has_post_thumbnail()) {
                                $appetizo_image_src_box5 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $appetizo_image_box5); ?>
                                <div class="image-layoutbox5">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if (!$appetizo_image_src_box5) {
                                            echo esc_url(get_template_directory_uri() . '/images/slider-default.png');
                                        } else {
                                            echo esc_url($appetizo_image_src_box5[0]);
                                        } ?>);"></div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="image-layoutbox5">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item"
                                             style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h3 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="description">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="layoutbox5-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div
                                                    class="postcomment"><?php comments_popup_link(__('0', 'appetizo'), __('1', 'appetizo'), __('%', 'appetizo'), '', ''); ?></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if (get_theme_mod('appetizo_seemore_layoutbox5_disable') != 'disable') { ?>

                <div class="see-more">
                    <a href="<?php echo esc_url(get_category_link($appetizo_categorybox5)); ?>"><?php

                        echo wp_kses_post(get_theme_mod('appetizo_layoutbox5_seemore',$default_value)) ?>
                    </a>

                </div>
            <?php } ?>
        </div><!-- Layoutbox5 -->
        <?php
    }

    if (get_theme_mod('appetizo_customizer_layoutbox6_disable') != 'disable') { ?>

        <div class="layoutbox6">
            <div class="layoutbox6-title">
                <?php
                if(get_theme_mod('appetizo_layoutbox6_title')){ ?>
                    <h2><?php echo wp_kses_post(get_theme_mod('appetizo_layoutbox6_title')) ?></h2>
                    <?php
                }
                else{ ?>
                    <div class="borderline"></div>
                    <?php
                }
                ?>

            </div>

            <div class="appetizo_layoutbox6  clearfix">
                <?php
                $appetizo_image_box6 = "appetizo-medium-image";
                $appetizo_numberbox6 = get_theme_mod('appetizo_layoutbox6_no');
                $appetizo_categorybox6 = get_theme_mod('appetizo_layoutbox6_category');
                if($appetizo_numberbox6 > 8){
                    $appetizo_nobox6 = 8;
                }
                else{
                    $appetizo_nobox6 = 8;
                }
                $appetizo_featured_list_args_box6 = array(
                    'posts_per_page' => $appetizo_nobox6,
                    'cat' => $appetizo_categorybox6
                );
                $appetizo_featured_list_posts_box6 = new WP_Query($appetizo_featured_list_args_box6);
                ?>

                <?php while ($appetizo_featured_list_posts_box6->have_posts()) : $appetizo_featured_list_posts_box6->the_post() ?>

                    <div class="item-layoutbox6">
                        <div class="layoutbox6-wrap">

                            <?php if (has_post_thumbnail()) {
                                $appetizo_image_src_box6 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $appetizo_image_box6); ?>
                                <div class="image-layoutbox6">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if (!$appetizo_image_src_box6) {
                                            echo esc_url(get_template_directory_uri() . '/images/slider-default.png');
                                        } else {
                                            echo esc_url($appetizo_image_src_box6[0]);
                                        } ?>);"></div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="image-layoutbox6">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item"
                                             style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h3 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="description">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="layoutbox6-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div
                                                    class="postcomment"><?php comments_popup_link(__('0', 'appetizo'), __('1', 'appetizo'), __('%', 'appetizo'), '', ''); ?></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if (get_theme_mod('appetizo_seemore_layoutbox6_disable') != 'disable') { ?>

                <div class="see-more">
                    <a href="<?php echo esc_url(get_category_link($appetizo_categorybox6)); ?>"><?php

                        echo wp_kses_post(get_theme_mod('appetizo_layoutbox6_seemore',$default_value)) ?>
                    </a>

                </div>
            <?php } ?>
        </div><!-- Layoutbox6 -->
        <?php
    } ?>
    </div>
    <?php
}  ?>