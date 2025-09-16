<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package oyanova
 */

get_header();
?>

<!-- Banner Start -->
<section class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner-content white-text text-center">
					<h1 class="h1-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'redeluxe'); ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- 404 Page Section Start -->
<div class="inner-page-text error-404 not-found text-center">
	<div class="banner-bg back-img" style="background-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<img width="1200" height="937" src="<?php echo get_template_directory_uri();?>/assets/images/404.svg" alt="404 Not Found!">
			</div>
		</div>
	</div>
</div>
<!-- 404 Page Section End -->

<?php
get_footer();
