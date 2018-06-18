<?php
/**
 * Template Name: No Border Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Point
 */

get_header(); ?>

<?php 

$_current_page_id = get_the_ID();
$is_fill_width = ($_current_page_id == 5210 || $_current_page_id == 5220 || $_current_page_id == 5572); 

if($is_fill_width){
	echo '</div></div><!--container closed-->';
}
?>
	<div id="primary" class="content-area <?php echo $is_fill_width? 'full-width-content-area':'' ?>">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
if($is_fill_width){
	echo '<!--container started--><div><div>';
}
?>
<?php

get_footer();
