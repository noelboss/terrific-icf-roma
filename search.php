<?php

/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */

get_header(); ?>   
<?php get_sidebar(); ?>
<div class="content" role="main">
<div class="mod modContent">
<?php if ( have_posts() ) : ?>
	<header class="page-header">
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'terrific' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header>
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php terrific_module('Content', array('template' => get_post_format())) ?>
	<?php endwhile; ?>
	<?php terrific_module('ContentNavigation', array('nav_id' => 'nav-below')); ?>
<?php else : ?>
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'terrific' ); ?></h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'terrific' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>
</div>
</div><!-- .content -->
<?php get_footer(); ?>