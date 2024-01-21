<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appetizo
 * @since 1.0
 */

get_header(); ?>

    <div id="content-wrap" class="clearfix">

        <div id="content" class="post-list <?php if(get_theme_mod('appetizo_general_sidebar_home') == true) : ?>fullwidth<?php endif; ?> ">
            <!-- post navigation -->
            <div class="sub-title">
            <?php
            the_archive_title( '<h1>', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            </div>

            <div class="post-wrap clearfix <?php if(get_theme_mod('appetizo_general_post_layout')=='grid'){ ?>standard<?php } else if(get_theme_mod('appetizo_general_post_layout')=='list'){ ?>standard<?php } else{?>standard<?php }  ?>">
                <!-- load the posts -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div <?php post_class('post'); ?>>
                        <div class="box">

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

                                    <?php if(get_theme_mod('appetizo_general_post_layout')=='list'){ ?>
                                        <div class="featured-image-wrap"><a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a></div>
                                    <?php }

                                    else{ ?>
                                        <div class="featured-image-wrap"><a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a></div>
                                    <?php } ?>


                                <?php } ?>

                            <?php } ?>


                            <div class="title-wrap <?php if(get_theme_mod('appetizo_general_post_summary') == 'full') : ?>alignleft <?php endif; ?>">

                                <div class="post-metawrap">
                                    <?php appetizo_getCategory(); ?>
                                    <div class="postcomment"><?php comments_popup_link( __( '0', 'appetizo' ), __( '1', 'appetizo' ), __( '%', 'appetizo' ),'','' ); ?></div>
                                </div>


                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                                <div class="post-content">
                                    <?php if( is_search() || is_archive() || is_home() ) { ?>

                                        <?php if(get_theme_mod('appetizo_general_post_summary') != 'full') : ?>

                                            <p><?php the_excerpt(); ?></p>

                                        <?php else:

                                            if(get_theme_mod('appetizo_general_post_layout')=='list'){
                                                the_content();
                                            }
                                            else{
                                                the_content();
                                            }
                                            ?>

                                        <?php endif; ?>

                                        <p class="align-center"><a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read More', 'appetizo' ); ?></a></p>
                                    <?php } else { ?>
                                        <?php the_content( esc_html_e( 'Read More', 'appetizo' ) ); ?>

                                        <?php if( is_single() || is_page() ) { ?>
                                            <div class="pagelink">
                                                <?php wp_link_pages(); ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div><!-- post content -->

                                <?php if( !is_page() )  { ?>
                                    <div class="title-meta clearfix">

                                        <div class="postdate"><?php echo esc_html(get_the_date()); ?></div>

                                        <div class="postcomment"><?php comments_popup_link( __( '0 Comment', 'appetizo' ), __( '1 Comment', 'appetizo' ), __( '% Comments', 'appetizo' ),'','' ); ?></div>


                                    </div>

                                <?php } ?>


                            </div><!-- title wrap -->




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

        <!-- comments -->
        <?php if( is_single() && comments_open() ) {
            comments_template();
        } ?>
    </div><!--content-->

<!-- load the sidebar -->
<?php if(!get_theme_mod('appetizo_general_sidebar_home')) {
    get_sidebar();
} ?>
</div><!-- content wrap -->

<!-- load footer -->
<?php get_footer(); ?>
