<?php
    /**
     * Single Post Template
     * This template is used when a single post page is shown.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
     *
     * @package appetizo
     * @since appetizo 1.0
     */

    get_header(); ?>

        <div id="content-wrap" class="clearfix">
            <div class="single-container"></div>

                <div id="content" tabindex="-1" class="<?php if(get_theme_mod('appetizo_general_sidebar_post') == true) : ?>fullwidth<?php endif; ?>">
                    <!-- post navigation -->
                    <?php get_template_part( 'template-title' ); ?>

                    <div class="post-wrap">
                        <!-- load the posts -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                            <div <?php post_class('post'); ?>>
                                <div class="box">



                                    <div class="frame">
                                        <?php if( !is_page() )  { ?>
                                            <div class="bar-categories">
                                                <div class="post-date">
                                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_date()); ?></a>
                                                </div>

                                                <?php if ( has_category() ) { ?>
                                                    <div class="categories">
                                                        <?php appetizo_getCategory(); ?>
                                                    </div>
                                                <?php } ?>


                                            </div><!-- bar categories -->
                                        <?php } ?>
                                        <div class="title-wrap">

                                            <h1 class="entry-title"><?php the_title(); ?></h1>

                                            <?php if( !is_page() )  { ?>
                                                 <div class="title-meta">

                                                     <?php
                                                     echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'appetizo_author_bio_avatar_size', 100 ), '', '', [ 'extra_attr' => 'itemprop="image"' ] );
                                                     ?>
                                                     <?php the_author_posts_link(); ?>



                                     <i class="fa fa-comments"></i><?php comments_popup_link( __( '0 Comment', 'appetizo' ), __( '1 Comment', 'appetizo' ), __( '% Comments', 'appetizo' ) ); ?>
                                </div><!-- title meta -->
                                            <?php } ?>

                                        </div><!-- title wrap -->


                                        <?php if ( has_post_format( 'gallery' , $post->ID ) ) { ?>
                                            <?php if ( function_exists( 'array_gallery' ) ) { array_gallery(); } ?>
                                        <?php } ?>

                                        <!-- load the video -->
                                        <?php if ( get_post_meta( $post->ID, 'arrayvideo', true ) ) { ?>
                                            <div class="arrayvideo">
                                                <?php echo esc_html(get_post_meta( $post->ID, 'arrayvideo', true )) ?>
                                            </div>

                                        <?php } else { ?>

                                            <!-- load the featured image -->
                                            <?php if ( has_post_thumbnail() ) { ?>
                                                <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'appetizo-large-image' ); ?></a>
                                            <?php } ?>

                                        <?php } ?>


                                        <div class="post-content clearfix">
                                            <?php if( is_search() || is_archive() ) { ?>
                                                <?php the_excerpt(); ?>
                                                <p><a href="<?php the_permalink(); ?>" class="readmore"><?php _e( 'Read More', 'appetizo' ); ?></a></p>
                                            <?php } else { ?>
                                                <?php the_content( __( 'Read More', 'appetizo' ) ); ?>

                                                <?php if( is_single() || is_page() ) { ?>
                                                    <div class="pagelink">
                                                        <?php wp_link_pages(); ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>



                                           </div> 
                                        </div><!-- post content -->
                                    </div><!-- frame -->

                                    <!-- post meta -->
                                    <?php get_template_part( 'template-meta' ); ?>
                                </div><!-- box -->
                            </div><!-- post-->

                        <?php endwhile; ?>
                    </div><!-- post wrap -->

                    <!-- post navigation -->
                    <?php get_template_part( 'template-nav' ); ?>

                    <?php else: ?>
                </div><!-- content -->

                <?php endif; ?>
                <!-- end posts -->


<?php    if(get_theme_mod('appetizo_general_author_post') != true) {
 do_action( 'appetizo_authorbox' );
} ?>



                <!-- comments -->
                <?php if( is_single() && comments_open() ) {
                    comments_template();
                } ?>
            </div><!--content-->

            <!-- load the sidebar -->
    <?php if(!get_theme_mod('appetizo_general_sidebar_post')) {
        get_sidebar();
    } ?>
        </div><!-- content wrap -->

        <!-- load footer -->
        <?php get_footer(); ?>
