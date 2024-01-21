<?php
    /**
     * Template for the post excerpt slider on the homepage.
     *
     * @package appetizo
     * @since appetizo 1.0
     */
    ?>

    <!--  scroller -->
    <?php if( is_home() && get_theme_mod( 'appetizo_customizer_slider_disable' ) != 'disable' ) {

        if(get_theme_mod('appetizo_slider_designs')=='Slider1'){ ?>

            <div class="appetizo_slides">
                    <?php
                    $appetizo_image_size = "appetizo-medium-image";
                    $appetizo_number23 = get_theme_mod( 'appetizo_slider_slides' );
                    $appetizo_category=get_theme_mod('appetizo_slider_category');

                        $appetizo_featured_list_args  = array(
                            'posts_per_page' => $appetizo_number23,
                            'cat' => $appetizo_category
                        );
                        $appetizo_featured_list_posts = new WP_Query( $appetizo_featured_list_args );
                    ?>

                    <?php while( $appetizo_featured_list_posts->have_posts() ) : $appetizo_featured_list_posts->the_post() ?>
                <div class="item-slide">


                <div class="slide-wrap">

                    <div class="feat-item-wrapper">
                        <div class="feat-overlay">
                            <div class="feat-inner">
                                <div class="scroll-post">
                                    <?php echo appetizo_getCategory(); ?>
                                </div>
                                <h2 class="feat-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="slider-meta">
                                    <div class="post-date">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                    </div>
                                    <div class="postcomment"><?php comments_popup_link( __( '0', 'appetizo' ), __( '1', 'appetizo' ), __( '%', 'appetizo' ),'','' ); ?></div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <?php if ( has_post_thumbnail() ) {
                        $appetizo_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $appetizo_image_size ); ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php if(!$appetizo_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($appetizo_image[0]); } ?>);"></div>
                            </a>
                        </div>
                    <?php }
                    else { ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                            </a>
                        </div>
                    <?php } ?>


                </div>

                </div>

            <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
            </div><!-- slides -->

        <?php }

        else if(get_theme_mod( 'appetizo_slider_designs' ) != 'Slider2' && get_theme_mod( 'appetizo_slider_designs' ) != 'Slider3'){ ?>
            <div class="appetizo_slides ">
                <?php
                $appetizo_image_size = "appetizo-medium-image";
                $appetizo_number23 = get_theme_mod( 'appetizo_slider_slides' );
                $appetizo_category=get_theme_mod('appetizo_slider_category');

                $appetizo_featured_list_args  = array(
                    'posts_per_page' => $appetizo_number23,
                    'cat' => $appetizo_category
                );
                $appetizo_featured_list_posts = new WP_Query( $appetizo_featured_list_args );
                ?>

                <?php while( $appetizo_featured_list_posts->have_posts() ) : $appetizo_featured_list_posts->the_post() ?>
                    <div class="item-slide">


                        <div class="slide-wrap">

                            <div class="feat-item-wrapper">
                                <div class="feat-overlay">
                                    <div class="feat-inner">
                                        <div class="scroll-post">
                                            <?php echo appetizo_getCategory(); ?>
                                        </div>
                                        <h2 class="feat-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="slider-meta">
                                            <div class="post-date">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                            </div>
                                            <div class="postcomment"><?php comments_popup_link( __( '0', 'appetizo' ), __( '1', 'appetizo' ), __( '%', 'appetizo' ),'','' ); ?></div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <?php if ( has_post_thumbnail() ) {
                                $appetizo_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $appetizo_image_size ); ?>
                                <div class="image-slide">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php if(!$appetizo_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($appetizo_image[0]); } ?>);"></div>
                                    </a>
                                </div>
                            <?php }
                            else { ?>
                                <div class="image-slide">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                    </a>
                                </div>
                            <?php } ?>


                        </div>

                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- slides -->
        <?php
        }

        if(get_theme_mod('appetizo_slider_designs')=='Slider2'){ ?>

            <div class="appetizo_slides2 container">
                <?php
                $appetizo_image_size = "appetizo-large-image";
                $appetizo_number23 = get_theme_mod( 'appetizo_slider_slides' );
                $appetizo_category=get_theme_mod('appetizo_slider_category');

                if($appetizo_number23!=0&&$appetizo_number23>5){
                    $appetizo_number23=5;
                }
                else{
                    $appetizo_number23=5;
                }
                $appetizo_featured_list_args  = array(
                    'posts_per_page' => $appetizo_number23,
                    'cat' => $appetizo_category
                );
                $appetizo_featured_list_posts = new WP_Query( $appetizo_featured_list_args );
                ?>

                <?php while( $appetizo_featured_list_posts->have_posts() ) : $appetizo_featured_list_posts->the_post() ?>
                    <div class="item-slide">


                        <?php if ( has_post_thumbnail() ) {
                            $appetizo_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $appetizo_image_size ); ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="feat-item" style="background-image:url(<?php if(!$appetizo_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($appetizo_image[0]); } ?>);"></div>
                                </a>
                            </div>
                        <?php }
                        else { ?>
                            <div class="image-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                                </a>
                            </div>
                        <?php } ?>


                        <div class="feat-item-wrapper">
                            <div class="feat-overlay">
                                <div class="feat-inner">
                                    <div class="scroll-post">
                                        <?php echo appetizo_getCategory(); ?>
                                    </div>
                                    <h2 class="feat-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="slider-meta">
                                        <div class="post-date">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                        </div>
                                        <div class="postcomment"><?php comments_popup_link( __( '0', 'appetizo' ), __( '1', 'appetizo' ), __( '%', 'appetizo' ),'','' ); ?></div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- slides -->

        <?php }


    if(get_theme_mod('appetizo_slider_designs')=='Slider3'){ ?>

        <div class="appetizo_slides3">
            <?php
            $appetizo_image_size = "appetizo-large-image";
            $appetizo_number23 = get_theme_mod( 'appetizo_slider_slides' );
            $appetizo_category=get_theme_mod('appetizo_slider_category');

            $appetizo_featured_list_args  = array(
                'posts_per_page' => $appetizo_number23,
                'cat' => $appetizo_category
            );
            $appetizo_featured_list_posts = new WP_Query( $appetizo_featured_list_args );
            ?>

            <?php while( $appetizo_featured_list_posts->have_posts() ) : $appetizo_featured_list_posts->the_post() ?>
                <div class="item-slide">


                    <?php if ( has_post_thumbnail() ) {
                        $appetizo_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $appetizo_image_size ); ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php if(!$appetizo_image) { echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); } else { echo esc_url($appetizo_image[0]); } ?>);"></div>
                            </a>
                        </div>
                    <?php }
                    else { ?>
                        <div class="image-slide">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="feat-item" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>);"></div>
                            </a>
                        </div>
                    <?php } ?>


                    <div class="feat-item-wrapper">
                        <div class="feat-overlay">
                            <div class="feat-inner">
                                <div class="scroll-post">
                                    <?php echo appetizo_getCategory(); ?>
                                </div>
                                <h2 class="feat-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="slider-meta">
                                    <div class="post-date">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                    </div>
                                    <div class="postcomment"><?php comments_popup_link( __( '0', 'appetizo' ), __( '1', 'appetizo' ), __( '%', 'appetizo' ),'','' ); ?></div>
                                </div>

                            </div>
                        </div>




                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- slides -->

    <?php } ?>


    <?php } ?>