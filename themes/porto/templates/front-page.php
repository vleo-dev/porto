<?php defined( 'ABSPATH' ) || exit;

/**
 * Template Name: Front page
 * Template Post Type: page
 */
	get_fields();
	get_header();

	$main_img = get_field( 'main_img' ); 
	$main_desc = get_field( 'main_desc' );

	$title = get_field( 'st01_title' );
	$st01_desc = get_field( 'st01_desc' );

	$skills = get_terms([
    	'taxonomy' => 'skill',
    	'hide_empty' => false,
	]);

	$car_title = get_field( 'car_title' );
	$webs = get_field( 'webs_elements' ); 
	
?>

<main class="hp_content">

	<section class="main-pres">
		<div class="mains-pres__img">
			<img src="<?php echo $main_img['url']; ?>" />
		</div>

		<div class="main-pres__desc">
			<p><?php echo $main_desc; ?></p>

		</div>
		<div class="moon"></div>
	</section>

	<section class="presentation" id="presentation">
		<div class="container reveal">
			<h2><?php echo $title; ?></h2>
			<p class="presentation__desc"><?php echo $st01_desc; ?></p>
			<a class="btn btn-light" href="#skills"><?php echo 'Continuer'; ?></a>
		</div>
		<span class="floating-shape shape-1"></span>
		<span class="floating-shape shape-2"></span>
		<span class="floating-shape shape-3"></span>
	</section>

	<?php if ( !empty($skills) && !is_wp_error($skills) ): ?>
		<section class="skills" id="skills">
			<div class="container reveal">
				<h2 class="dark"><?php echo "Compétences"; ?></h2>
				<div class="skills-grid">
					<?php foreach($skills as $skill):
						$desc = get_field('desc', $skill);
						$fa_picto = get_field('fa_picto', $skill);
					?>
						<div class="skill-card">
							<?php if ($fa_picto): ?>
								<i class="<?php echo esc_attr($fa_picto); ?>"></i>
							<?php endif; ?>
							<h3><?php echo esc_html($skill->name); ?></h3>
							<?php if ($skill->description): ?>
								<p><?php echo esc_html($skill->description); ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="projects">
		<?php if ( !empty( $webs ) ): ?>
			<h2 class="dark"><?php echo "Projets"; ?></h2>
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
								
								<div class="web-content__img">
									<img src="<?php echo $web_img['url']; ?>" alt="<?php echo $web_title; ?>"/>
									<div class="web-content__infos">
										<h3 class="web-content__title"><?php echo $web_title; ?></h3>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		<?php endif; ?>
	</section>

	<section class="history">
		<div class="container reveal">
			<h2><?php echo "Parcours Pro"; ?></h2>

			<div class="history__timeline">

			<div class="history__timeline__item">
				<div class="dot">
					<div class="dot__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fs-logo.png" alt="Logo" class="round-img">
					</div>
				</div>
				<div class="content">
					<h3>sept 2017 – En cours</h3>
					<p>Développeur Full Stack Wordpress / Drupal -- Faire Savoir</p>
				</div>
			</div>

			<div class="history__timeline__item">
				<div class="dot">
					<div class="dot__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/hb-digit.png" alt="Logo" class="round-img">
					</div>
				</div>
				<div class="content">
					<h3>oct 2016 – août 2017</h3>
					<p>Développeur Web Drupal -- HB Digit</p>
				</div>
			</div>

			<div class="history__timeline__item">
				<div class="dot">
					<div class="dot__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/auchan.png" alt="Logo" class="round-img">
					</div>
				</div>
				<div class="content">
					<h3>avr 2016 – aoüt 2018</h3>
					<p>Stage Développeur WEB -- CGI -- Auchan E - Commerce</p>
				</div>
			</div>

			<div class="history__timeline__item">
				<div class="dot">
					<div class="dot__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/iut.jpg" alt="Logo" class="round-img">
					</div>
				</div>
				<div class="content">
					<h3>sept 2015 – août 2016</h3>
					<p>Licence proffessionnelle DAII -- Université de Lille</p>
				</div>
			</div>

			<div class="history__timeline__item">
				<div class="dot">
					<div class="dot__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/bts.png" alt="Logo" class="round-img">
					</div>
				</div>
				<div class="content">
					<h3>sept 2013 – août 2015</h3>
					<p>BTS Services Informatiques aux Organisations, Solutions Logicielles et Applications Métiers -- Lycée Saint Rémi ROUBAIX</p>
				</div>
			</div>

			</div>
		</div>
	</section>

	<section class="contact">
		<div class="container reveal">
			<h2 class="dark"><?php echo "Contact"; ?></h2>
			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
		</div>
	</section>
</main>

<?php get_footer(); ?>
