<!doctype html>
<html <?php language_attributes(); ?> class="no-js" itemscope="" itemtype="http://schema.org/WebPage">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <?php // dns prefetch ?>
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php // meta ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=device-width">

    <?php // icons ?>
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <?php wp_head(); ?>

    <script type="text/javascript" src="//use.typekit.net/hux3cyh.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <?php // IE CONDITIONAL STYLESHEETS // ?>
    <!--[if IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie8.css"><![endif]-->
    <!--[if IE 8 ]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/ie8.css"><![endif]-->
    <!--[if IE 9 ]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/ie9.css"><![endif]-->
</head>

<body <?php body_class(); ?>>

    <header id="header" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="animated fadeInDownBig">
            <h1 class="site-title" itemprop="headline"><a href="<?php echo home_url(); ?>" title="Jeff Lupinski">Jeff Lupinski</a></h1>
            <span>Designer <em class="amp">&amp;</em> Developer</span>
        </div>

        <?php if(is_front_page()): ?><img itemprop="image" src="<?php bloginfo('template_directory'); ?>/img/me.jpg" id="site-logo" class="head animated pulse" alt="Jeff Lupinski"><?php endif; ?>
    </header>

    <div class="site-inner">
        <main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">