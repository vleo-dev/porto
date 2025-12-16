<?php defined( 'ABSPATH' ) || exit;

	get_header();


	$page_404 = wp_parse_args(
		array(
			'title' => __( 'Erreur 404 : Page non trouvée', 'vleo' ),
			'text' => '<p>' . __( 'Perdu dans l\'espace ?', 'vleo' ) . '</p>',
			'links' => array(
				array(
					'link' => array(
						'title' => __( 'Je retourne sur le plancher des vaches', 'vleo' ),
						'url' => home_url( '/' ),
						'target' => '',
					),
				),
			),
		)
	);
?>
<main>

	<article class="wp-site-blocks">

		<section class="wp-block-cover alignfull" style="min-height:100vh">

			<div class="wp-block-cover__inner-container has-text-align-center">
				<h1 class="wp-block-heading"><?php echo $page_404['title'] ?></h1>

				<div class="wp-block-group has-global-padding is-layout-constrained">
					<?php echo $page_404['text'] ?>

					<div class="wp-block-buttons is-content-justification-center is-layout-flex">
						<?php foreach ( array_column( $page_404['links'], 'link' ) as $link ): ?>
							<div class="wp-block-button">
								<a class="btn btn-light" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

	</article>

</main>

<?php get_footer() ?>
