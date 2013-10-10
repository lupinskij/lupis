<!doctype html>
<!--
MMMMMMMMMMMMMMMMMMDDDD8MMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMDDD....:DDDMMMMMMMMMMMMMMM
MMMMMMMMMMMM8DD,...8D7....DD8MMMMMMMMMMMM
MMMMMMMMMDDDI....DDDDDDD....ZDDDMMMMMMMMM
MMMMMMDDD7....DDDDDDDDDDDDD....ODDNMMMMMM
MMMDDD7....DDDDDDDDDDDDDDDDDDD,...ODDNMMM
DDDO,..,8DDDDDDDDDDDDDDDDDDDDDDDO....ODDN
DD...$DDDDDDDDDDDDDDDDDDDDDDDDDDDDDD...DD
DD..DDDDDDD.IDDDDDDDDDDDDDDDDDDDDDDDD..DD
DD..DDDDDDD~...,DDDDDDDDDDDDDDDDDDDDD..DD
DD..DDDDDDDDDD,...~DDD..DDDDDDDDDDDDD..DD
DD..DDDDDDDDDDDDD..DD$..DDDDDDDDDDDDD..DD
DD..DDDDDDDDDDDDD..DD$..DDDDDDDDDDDDD..DD
DD..DDDDDDDDDDDDD..DD$..DDDDDDDDDDDDD..DD
DD..DDDDDDDDDDDDD..DD$..DDDDDDDDDDDDD..DD
DD..DD..8DDDDDDDD..DD$..DDDDDDD8..DDD..DD
DD..DDD....8DDDDD..DD$..DDDD8....DDDD..DD
DD...7DDD87...ODD..DD$..D8....DDDDDO...DD
DDDO....8DDDD~.....DD$.....ZDDDDZ....DDDN
MMMDDD$....DDDDD,..DD$..ZDDDDD....DDDDMMM
MMMMMMDDD$....DDDDDDDDDDDDD....8DDNMMMMMM
MMMMMMMMMDDD?...:DDDDDDD,...7DDDMMMMMMMMM
MMMMMMMMMMMM8DD,...ZDI....DDDMMMMMMMMMMMM
MMMMMMMMMMMMMMMDDD,...~DDDMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMDDDDDMMMMMMMMMMMMMMMMMM
-->
<html <?php language_attributes(); ?> class="no-js" itemscope="" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

<?php // dns prefetch ?>
        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // meta ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=device-width">
        <meta name="description" content="Hello. I'm a designer and front end developer based in Providence, Rhode Island. I dig usable websites, responsive web design, typography, and clean code.">

<?php // icons ?>
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon" itemprop="image">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed" itemprop="image">

        <?php wp_head(); ?>

<?php // IE CONDITIONAL STYLESHEETS // ?>
        <!--[if IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie8.css"><![endif]-->
        <!--[if IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/ie8.css"><![endif]-->
        <!--[if IE 9 ]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/ie9.css"><![endif]-->
    </head>

    <body <?php body_class(); ?>>

    <header class="site-header" id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="site-header-wrapper">
            <div class="site-logo">
                <a href="<?php echo home_url(); ?>"><img itemprop="image" src="<?php bloginfo('template_directory'); ?>/img/logo-jeff.svg" id="site-logo" class="site-logo-image" alt="Jeff Lupinski"></a>
            </div>

            <a href="#menu" class="menu-link icon">&#9776;</a>
        </div>
        <nav id="menu" class="nav-header" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	  <?php
			// MAIN NAVIGATION //
			// Uses Wordpress menus to generate main navigation
			$navGridSize = (string)$brewer_grid_options['nav_main'];
			$mainNav = array(
				'theme_location'	=> 'navMain',										// Location in the theme to be used. Needs to be registered
				'menu'				=> 'Main Navigation', 								// Name of menu desired. Accepts ID, slug, name
				'container'			=> 'nav', 											// Container type (div or nav (keep nav for semantics))
				'container_class'	=> 'main ' . $navGridSize . ' columns top-bar', 	// Container class. **NEEDS TO BE** "top-bar" for Foundation navigation to work (http://foundation.zurb.com/docs/navigation.php)
				'container_id'		=> '',												// Container ID
				'menu_class'		=> 'mainMenu',										// Adds class to navigation UL.
				'menu_id'			=> 'changling',										// Adds ID to navigation UL. If you wish to use selectnav.js on this menu (changes menu into a select field for mobile usage), keep this assigned as changling
				'before'			=> '',												// Output text before the <a>
				'after'				=> '',												// Output text after the </a>
				'link_before'		=> '',												// Output text before the link text
				'link_after'		=> '',												// Output text after the link text
				'depth'				=> 3												// How many levels of the hierarchy are to be included where 0 means all
			);
			wp_nav_menu($mainNav);
		?>
        </nav>

        <section class="site-info" itemscope="itemscope">
            <p itemprop="description">Hello. I'm a designer and front end developer based in Providence, Rhode Island. I dig usable websites, responsive web design, typography, and clean code.</p>
        </section>

        <footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            <span class="social">
                <a href="http://dribbble.com/JeffLupinski" class="dribbble icon-social">&#62236;</a>
                <a href="http://jefflupinski.tumblr.com" class="tumblr icon-social">&#62230;</a>
                <a href="http://twitter.com/jefflupinski" class="twitter icon-social">&#62218;</a>
                <a href="http://www.linkedin.com/profile/view?id=87927635" class="linkedin icon-social">&#62233;</a>
            </span>
            <p>&copy; <?php the_time('Y'); ?> All rights reserved.</p>
        </footer>
    </header>

    <div class="site-inner">
        <main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">