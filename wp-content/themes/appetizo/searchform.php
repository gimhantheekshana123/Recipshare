<?php
/**
 * Search form template
 *
 * @package appetizo
 * @since appetizo 1.0
 */
?>
	
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'appetizo' ); ?></label>
		<input type="text" class="field" placeholder="<?php esc_attr_e( 'Search','appetizo' ); ?>"  name="s" value="<?php echo get_search_query(); ?>" id="s" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'appetizo' ); ?>" />
	</form>