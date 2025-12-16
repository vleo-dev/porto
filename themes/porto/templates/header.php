<?php 
  $webs = get_field( 'webs_elements' ); 
?>
<header>
  <div class="header__container">
    <div class="header__logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/astro-gus.png" alt="logo_cat" title="logo_cat" />
    </div>
    <div class="burger" id="burger">
      <span></span><span></span><span></span>
    </div>
    <div class="header__nav">
      <nav>
        <ul>
          <li><a href="<?php echo home_url('/'); ?>#skills">Compétences</a></li>
          <li>
            <a href="<?php echo home_url('/'); ?>#projects">Projets</a>
            <ul>
              <?php foreach( $webs as $web ) : ?>
                <li><a href="<?php echo get_permalink( $web ); ?>"><?php echo get_the_title( $web ); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li><a href="<?php echo home_url('/'); ?>#history">Parcours Pro</a></li>
          <li><a href="<?php echo home_url('/'); ?>#contact">Contact</a></li>
        </ul>
      </nav>
  </div>
</header>
