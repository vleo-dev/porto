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

	<title><?php wp_title( '' ) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">

	<?php wp_head() ?>

</head>

<body <?php body_class( $body_classes ) ?>>

	<?php wp_body_open() ?>

		<?php /* HEADER */ ?>
		<?php get_template_part( 'parts/header' ) ?>
