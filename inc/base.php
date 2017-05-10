<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<nav class="site-navigation">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="site-navigation-inner">
						<div class="navbar-header">
						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

							<!-- Your site title as branding in the menu -->
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><h1><?php bloginfo( 'name' ); ?></h1></a>

						</div><!-- .navbar-header -->

						<!-- The WordPress Menu goes here -->
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
						  <?php wp_nav_menu(
                              array(
                                  'theme_location' => 'menu-1',
                                  'depth' => 2,
                                  'menu_id' => 'primary-menu',
                                  'container_class' => false,
                                  'menu_class' => 'nav navbar-nav',
                                  'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                  // 'walker' 			=> new wp_bootstrap_navwalker()
                              )
                          ); ?>
                          <div class="navbar-form navbar-right">
                          	<?php get_search_form(); ?>
                          </div>
                        </div>
					</div><!-- .site-navigation-inner -->
				</div><!-- .container -->
			</div><!-- .navbar -->
		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->
    
    <div class="container">
    	<div class="row">
    <main id="main" class="site-main col-xs-12 col-sm-6 col-md-8" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
              <?php
              if ( is_single() ) :
                  the_title( '<h1 class="entry-title">', '</h1>' );
              else :
                  the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
              endif;
      
              if ( 'post' === get_post_type() ) : ?>
              <div class="entry-meta">
                  
              </div><!-- .entry-meta -->
              <?php
              endif;
			  ?>
          </header><!-- .entry-header -->
      
          <div class="entry-content">
              <?php
                  the_content( sprintf(
                      /* translators: %s: Name of current post. */
                      wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'joseguerrauk' ), array( 'span' => array( 'class' => array() ) ) ),
                      the_title( '<span class="screen-reader-text">"', '"</span>', false )
                  ) );
      
                  wp_link_pages( array(
                      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'joseguerrauk' ),
                      'after'  => '</div>',
                  ) );
              ?>
          </div><!-- .entry-content -->
    <?php endwhile; endif; ?>
    </main>


	<?php
	  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		  return;
	  }
    ?>

    <aside  id="secondary" class="widget-area col-xs-6 col-md-4" role="complementary">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>
    	</div>
    </div>


    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info text-center">
            &copy; <?php echo date('Y'); ?> JoseGuerraUK
            <span class="sep"> | </span>
            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'joseguerrauk' ), 'JoseGuerraUK', '<a href="http://joseguerrauk.com/" rel="nofollow">Jose Guerra</a>' ); ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>