<?php defined( 'ABSPATH' ) || exit;

	$args = wp_parse_args(
		$args,
		array(
			'body_classes' => array('fs-body'),
		)
	);

	$body_classes = $args['body_classes'];

	if ( !is_array( $body_classes ) ) {
		if ( is_string( $body_classes ) ) {
			$body_classes = explode( ' ', $body_classes );
		} else {
			$body_classes = array();
		}
	}
	$body_classes[] = 'no-touch';
?>
<!doctype html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">

	<title><?php wp_title('|', true, 'right'); ?>Léo Vuylsteker | Développeur Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">

	<?php wp_head() ?>

</head>

<body <?php body_class( $body_classes ) ?>>

	<?php wp_body_open() ?>

		<?php if ( is_front_page() ) : ?>
		<?php /* PAGE SPLASH (accueil uniquement) */ ?>
		<div class="page-splash" id="page-splash">
			<div class="page-splash__trail"></div>
			<div class="page-splash__rocket">
				<svg viewBox="0 0 60 100" width="42" height="70" xmlns="http://www.w3.org/2000/svg">
					<defs>
						<linearGradient id="splashFlameGrad" x1="30" y1="76" x2="30" y2="102" gradientUnits="userSpaceOnUse">
							<stop stop-color="#6C5BFF" />
							<stop offset="1" stop-color="#ca2775" stop-opacity="0" />
						</linearGradient>
					</defs>
					<path class="page-splash__flame" d="M30 76 C24 89, 26 98, 30 102 C34 98, 36 89, 30 76 Z" fill="url(#splashFlameGrad)" />
					<path d="M30 0 C45 15, 45 55, 38 78 L22 78 C15 55, 15 15, 30 0 Z" fill="#F4EFFF" />
					<path d="M22 58 L8 78 L22 73 Z" fill="#6C5BFF" />
					<path d="M38 58 L52 78 L38 73 Z" fill="#6C5BFF" />
					<circle cx="30" cy="30" r="7.5" fill="#0B0C1F" />
					<circle cx="30" cy="30" r="4.5" fill="#6C5BFF" />
				</svg>
			</div>
			<p class="page-splash__text">Préparation de la navette&hellip;</p>
		</div>
		<?php endif; ?>

		<?php /* HEADER */ ?>
		<?php get_template_part( 'templates/header' ) ?>
