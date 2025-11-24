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
	<section class="presentation">
		<div class="container">
			<h1><?php echo $title; ?></h1>
			<p class="presentation__desc"><?php echo $main_desc; ?></p>
		</div>
	</section>

	<section class="projects">
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
								<div class="web-content__infos">
									<h3><?php echo $title; ?></h3>
									<div class="web-content__infos__short">
										<p><?php echo $web_short; ?></p>
									</div>
								</div>
								<div class="web-content__img">
									<img src="<?php echo $web_img[ 'url' ]; ?>"/>
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
		<div class="container">
			<?php echo 'skills'; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
