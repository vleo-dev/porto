<?php defined('ABSPATH') || exit;

get_header();
$main_desc = get_field( 'long_desc' );
?>
<main>
	<?php /* HERO HEADER */ ?>
	<?php get_template_part('templates/hero-header') ?>
	<div class="container reveal">
		<article class="wp-site-blocks">
			<section class="main_desc">
				<p><?php echo $main_desc; ?></p>
			</section>
			<section class="edito_part">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content() ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
		</article>
	</div>
</main>
<?php get_footer(); ?>
