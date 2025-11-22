<?php defined( 'ABSPATH' ) || exit;

/**
 * Template Name: Front page
 * Template Post Type: page
 */
	get_fields();
	get_header();

	//ACF
	$title = get_field( 'st01_title' );
	$main_desc = get_field( 'st01_desc' );
	$car_title = get_field( 'car_title' );
	$webs = get_field( 'webs_elements' ); 
?>
<main>
	<h1><?php echo get_the_title(); ?>

	<section class="presentation container">
		<h2><?php echo $title; ?></h2>
		<p class="presentation__desc"><?php echo $main_desc; ?></p>
	</section>

	<section class="projects">
		<h2><?php echo $car_title; ?></h2>
		<?php if ( !empty( $webs ) ): ?>
			<div class="swiper projectsSwiper">
				<div class="swiper-wrapper">
					<?php foreach( $webs as $web ) : ?>
						<?php
							$web_title = get_field( 'title', $web->ID );
							$web_short = get_field( 'short_desc', $web->ID ); 
							$web_img = get_field( 'image', $web->ID ); 
						?>
						<div class="swiper-slide">
							<div class="web-content">
								<h3><?php echo $title; ?></h3>
								<div class="web-content__short">
									<p><?php echo $web_short; ?></p>
								</div>
								<div class="web-content__img">
									<img src="<?php echo $web_img[ 'url' ]; ?>">
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		<?php endif; ?>
	</section>

	<section class="skills">
		<?php echo 'skills'; ?>
	</section>
</main>

<?php get_footer(); ?>
