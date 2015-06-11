<!DOCTYPE html>
<html>
<head <?php language_attributes(); ?>>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name=viewport content="width=device-width, initial-scale=1">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('url'); ?>/?infinite-option=css" type="text/css" media="screen" />
<script src="<?php echo get_option('home').'/wp-content/themes/blog_press/js/script.js'; ?>"></script>
<?php wp_head(); ?>
</head>
<body>

<!-- Header -->
<header id="header">
    <div class="inner-wrap">
        <div>
            <h1><a href="<?php bloginfo('url'); ?>"><img class="logo" src="<?php echo get_option('infinite-logo', get_template_directory_uri().'/img/logo.jpg');?>"></a></h1>
        </div>
    </div>
</header>
<nav id="navigation">
    <div class="inner-wrap">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'primary-menu' ) ); ?>
    </div>
</nav>