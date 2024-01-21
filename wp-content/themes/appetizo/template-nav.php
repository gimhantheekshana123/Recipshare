<?php
/**
 * Template for the post navigation and archive pagination.
 *
 * @package appetizo
 * @since appetizo 1.0
 */
?>




<?php if( is_single() ) { ?>
    <div class="next-prev">
        <?php previous_post_link( '<div class="prev-post"><strong class="next-prev-title">' . __( 'Previous Post', 'appetizo' ) . '</strong><span>%link</span></div>' ); ?>
        <?php next_post_link( '<div class="next-post"><strong class="next-prev-title">' . __( 'Next Post', 'appetizo' ) . '</strong><span>%link</span></div>' ); ?>
    </div><!-- next prev -->
<?php } ?>




<!-- post navigation -->
<?php if( $wp_query->max_num_pages > 1 ) : ?>
    <?php the_posts_pagination(array(
        'screen_reader_text' => __( 'Posts navigation','appetizo' ),
        'mid_size' => 2
    )); ?>
<?php endif; ?>
