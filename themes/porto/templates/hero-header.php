<?php defined('ABSPATH') || exit;

get_header();
$main_img = get_field('image_detail');

?>
<?php if( $main_img ): ?>
	<section class="ban">
		<img src="<?php echo esc_url($main_img['url']); ?>" alt="<?php echo esc_attr($main_img['alt']); ?>" class="ban__image" />
		<h1 class="ban__title">
			<?php the_title(); ?>
    	</h1>
	</section>
<?php endif; ?>
