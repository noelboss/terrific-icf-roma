<?php

/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
<div class="content" role="main">
<div class="content-inner">
<?php if ( have_posts() ) : ?>
 <header class="page-header">
  <h1 class="page-title"><?php
  printf( __( 'Kategorie: %s', 'terrific' ), '<span>' . single_cat_title( '', false ) . '</span>' );
  ?></h1>
  <?php
  $category_description = category_description();
  if ( ! empty( $category_description ) )
      echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
  ?>
 </header>
 <?php while (have_posts()) : the_post(); ?>
 <?php terrific_module('Content', array('template' => get_post_format())) ?>
 <?php endwhile; ?>
 <?php terrific_module('ContentNavigation', array('nav_id' => 'nav-below')); ?>
 <?php else : ?>
  <article id="post-0" class="post no-results not-found">
   <header class="entry-header">
	<h1 class="entry-title"><?php _e( 'Nothing Found', 'terrific' ); ?></h1>
   </header><!-- .entry-header -->
   <div class="entry-content">
    <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'terrific' ); ?></p>
    <?php get_search_form(); ?>
   </div><!-- .entry-content -->
  </article><!-- #post-0 -->
 <?php endif; ?>
</div>
</div><!-- .content -->
<?php get_footer(); ?>
