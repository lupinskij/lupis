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
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<?php wp_head(); ?>

		<?php // IE CONDITIONAL STYLESHEETS // ?>
		<!--[if IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie8.css"><![endif]-->
		<!--[if IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/ie8.css"><![endif]-->
		<!--[if IE 9 ]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/ie9.css"><![endif]-->
	</head>

	<body <?php body_class(); ?>>

	<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="site-logo">
			<a href="javascript:;" class="group"><img itemprop="image" src="<?php bloginfo('template_directory'); ?>/img/logo-jeff.svg" class="site-logo-image" alt="Jeff Lupinski"></a>
		</div>

		<nav class="nav-header" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<ul id="menu-primary-navigation" class="nav-menu responsive-menu">
				<li class="menu-item"><a href="javascript:;">Work</a></li>
				<li class="menu-item"><a href="javascript:;">About</a></li>
				<li class="menu-item"><a href="javascript:;">Contact</a></li>
				<li class="menu-item"><a href="javascript:;">Connect</a></li>
			</ul>
		</nav>

		<section class="site-info" itemscope="itemscope">
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at. Maecenas sed diam eget risus euro varius blandit sit amet non. </p>
		</section>
		
		<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<p>&copy; 2013 All rights reserved.</p>
		</footer>
	</header>