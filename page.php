<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Radical
 */

get_header();
?>
<?php
$has_sidebar = get_post_meta(get_the_ID(), 'show_page_sidebar', true);
if ($has_sidebar == 1) :
	echo '<div class="sidebar-wrapper">';
	echo '<div class="sidebar-wrapper__inner-container">';
endif;
?>
<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
if ($has_sidebar == 1) :
	get_sidebar();
	echo '</div>';
	echo '</div>';
endif;
get_footer();