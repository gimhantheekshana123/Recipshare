<?php
/**
 * Template for the post and page titles.
 *
 * @package appetizo
 * @since appetizo 1.0
 */
?>

<?php if ( !is_front_page() && !is_single() && !is_page() )  {
    if ( is_search() ) {
        ?>
        <div class="sub-title">
            <h1>Searched for: <?php echo get_search_query(); ?></h1>
        </div>
        <?php
    } else {
        ?>
        <div class="sub-title">
            <?php
            the_archive_title( '<h1>', '</h1>' );
            ?>
        </div>
        <?php
    }
} ?>
