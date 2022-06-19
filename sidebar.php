<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cotodi
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<div class="row">
		<section class="col-lg-4 col-md-6 col-sm-12">

		</section>

		<section class="col-lg-4 col-md-6 col-sm-12">
			
		</section>

	</div>
</aside><!-- #secondary -->
