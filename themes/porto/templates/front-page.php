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
			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
		</div>
	</section>

	<section class="more">
		<div class="container">
			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
		</div>
	</section>
</main>

<?php get_footer(); ?>
