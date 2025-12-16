<?php defined('ABSPATH') || exit;

get_header();

?>
<main>
	<div class="container reveal">
		<article class="wp-site-blocks">
			<?php /* HERO HEADER */ ?>
			<?php get_template_part('parts/hero-header') ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
	</div>
</main>
<?php get_footer(); ?>
