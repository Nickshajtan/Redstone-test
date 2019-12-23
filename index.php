<?php
/**
 * The main template file
 *
 */

get_header();
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		the_title();
		the_content();

	endwhile;

else :

	get_template_part( 'template-parts/content/content', 'none' );

endif;
get_footer();