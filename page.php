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
 * @package cotodi
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<p><?php echo esc_html_e('this page have been translated to french', 'cotodi') ?></p>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );

				$movie_director = get_post_meta( get_the_ID(), 'dir_id', true);
				$movie_producer = get_post_meta( get_the_ID(), 'producer_id', true);
			
				if( ! empty( $movie_director ) ) {
					echo '<h3>Director: ' . $movie_director . '<h3>';
					echo '<p>PRODUCED BY: ' . $movie_producer . '</p>';
				}
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</div> 
		<!-- Let's show our custom fields here -->						
 
		<?php 
		
			// $movie_director = get_post_meta( get_the_ID(), 'dir_id', true);
			// $movie_producer = get_post_meta( get_the_ID(), 'producer_id', true);
		
			// if( ! empty( $movie_director ) ) {
			// 	echo '<h3>Director: ' . $movie_director . '<h3>';
			// 	echo '<p>PRODUCED BY: ' . $movie_producer . '</p>';
			// }
		
		?>
 
		<!-- End showing our custom fields here -->

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
