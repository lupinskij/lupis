<?php

	/* ========================================================================================================================
	ADD THEME SUPPORT
	======================================================================================================================== */

	if (!isset($content_width))
	{
	    $content_width = 900;
	}

	if (function_exists('add_theme_support'))
	{
	    // Add Menu Support
	    add_theme_support('menus');

	    // Add Thumbnail Theme Support
	    add_theme_support('post-thumbnails');
	    add_image_size('large', 700, '', true); // Large Thumbnail
	    add_image_size('medium', 250, '', true); // Medium Thumbnail
	    add_image_size('small', 120, '', true); // Small Thumbnail
	    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

	    // Add Support for Custom Header - Uncomment below if you're going to use
	    /*add_theme_support('custom-header', array(
		'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
		'header-text'			=> false,
		'default-text-color'		=> '000',
		'width'				=> 1000,
		'height'			=> 198,
		'random-default'		=> false,
		'wp-head-callback'		=> $wphead_cb,
		'admin-head-callback'		=> $adminhead_cb,
		'admin-preview-callback'	=> $adminpreview_cb
	    ));*/

	    // Enables post and comment RSS feed links to head
	    add_theme_support('automatic-feed-links');

	    // Localisation Support
	    load_theme_textdomain('lupis', get_template_directory() . '/languages');
	}

	/* ========================================================================================================================
	PUT ALL CUSTOM FUNCTIONS HERE
	======================================================================================================================== */
	// Custom Excerpts
	function lupisWP_index($length) // Create 20 Word Callback for Index page Excerpts, call using lupisWP_excerpt('lupisWP_index');
	{
	    return 20;
	}

	// Create 40 Word Callback for Custom Post Excerpts, call using lupisWP_excerpt('lupisWP_custom_post');
	function lupisWP_custom_post($length)
	{
	    return 40;
	}

	// Create the Custom Excerpts callback
	function lupisWP_excerpt($length_callback = '', $more_callback = '')
	{
	    global $post;
	    if (function_exists($length_callback)) {
	        add_filter('excerpt_length', $length_callback);
	    }
	    if (function_exists($more_callback)) {
	        add_filter('excerpt_more', $more_callback);
	    }
	    $output = get_the_excerpt();
	    $output = apply_filters('wptexturize', $output);
	    $output = apply_filters('convert_chars', $output);
	    $output = '<p>' . $output . '</p>';
	    echo $output;
	}

	// Add page slug to body class, love this
	function add_slug_to_body_class($classes)
	{
	    global $post;
	    if (is_home()) {
	        $key = array_search('blog', $classes);
	        if ($key > -1) {
	            unset($classes[$key]);
	        }
	    } elseif (is_page()) {
	        $classes[] = sanitize_html_class($post->post_name);
	    } elseif (is_singular()) {
	        $classes[] = sanitize_html_class($post->post_name);
	    }

	    return $classes;
	}

	// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
	function remove_thumbnail_dimensions( $html )
	{
	    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	    return $html;
	}

	// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
	function lupisWP_pagination()
	{
	    global $wp_query;
	    $big = 999999999;
	    echo paginate_links(array(
	        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
	        'format' => '?paged=%#%',
	        'current' => max(1, get_query_var('paged')),
	        'total' => $wp_query->max_num_pages
	    ));
	}

	// Custom View Article link to Post
	function html5_blank_view_article($more)
	{
	    global $post;
	    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
	}

	/* ========================================================================================================================
	Register Menus
	===========================================================================================================================
	@http://codex.wordpress.org/Function_Reference/register_nav_menus
	---------------------------------------------------------------------------------------------------------------------------
	register_nav_menus(array(
		'example_one' => 'Example Menu Name One'
	));
	*/


	/* ========================================================================================================================
	Register Sidebars
	=========================================================================================================================== 
	@http://codex.wordpress.org/Function_Reference/register_sidebar
	---------------------------------------------------------------------------------------------------------------------------
	register_sidebar(array(
		'name' => 'Sidebar 1',
		'id' => 'sidebar-1',
		'description' => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => "</li>\n",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n"
	));
	*/

	/* ========================================================================================================================
	Register & Enqueue CSS and Javascript Plugins
	===========================================================================================================================*/
	// Load styles
	function load_scripts(){
		// jQuery
		wp_deregister_script('jquery'); // Deregister WordPress jQuery
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', array(), '1.9.1'); // Google CDN jQuery
    	wp_enqueue_script('jquery'); // Enqueue it!

    	// Modernizr
		wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        // Scripts
		wp_register_script('scripts', '/js/scripts.js', array(), '2.6.2'); // dev scripts
        wp_enqueue_script('scripts'); // Enqueue it!
	}

	// Load styles
	function load_styles(){
	    // Stylesheet
		wp_register_style('lupis', get_template_directory_uri() . '/stylesheets/lupis.css', array(), '1.0', 'all');
    	wp_enqueue_style('lupis'); // Enqueue it!

    	// Google Fonts
		wp_register_style('Lato', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic');
        wp_enqueue_style( 'Lato');
	}

	/* ========================================================================================================================
	ACTIONS / FILTERS / SHORTCODES
	======================================================================================================================== */
	// Add Actions
	add_action('init', 'lupisWP_pagination'); // Add our HTML5 Pagination
	add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
	add_action('wp_enqueue_scripts', 'load_scripts'); // Add Theme Stylesheet
	add_action('wp_enqueue_scripts', 'load_styles'); // Add Theme Stylesheet

	// Remove Actions
	remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
	remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
	remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
	remove_action('wp_head', 'index_rel_link'); // Index link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
	remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

	// Add Filters
	add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
	add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
	add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts

	// Remove Filters
	remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

	/* ========================================================================================================================
	PUT ALL CUSTOM POST TYPES HERE
	======================================================================================================================== */
	/*------------------------------------*\
		Custom Post Types
	\*------------------------------------*/

	// Create 1 Custom Post type for a Demo, called HTML5-Blank
	function create_post_type_html5()
	{
	    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
	    register_taxonomy_for_object_type('post_tag', 'html5-blank');
	    register_post_type('html5-blank', // Register Custom Post Type
	        array(
	        'labels' => array(
	            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
	            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
	            'add_new' => __('Add New', 'html5blank'),
	            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
	            'edit' => __('Edit', 'html5blank'),
	            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
	            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
	            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
	            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
	            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
	            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
	            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
	        ),
	        'public' => true,
	        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
	        'has_archive' => true,
	        'supports' => array(
	            'title',
	            'editor',
	            'excerpt',
	            'thumbnail'
	        ), // Go to Dashboard Custom HTML5 Blank post for supports
	        'can_export' => true, // Allows export in Tools > Export
	        'taxonomies' => array(
	            'post_tag',
	            'category'
	        ) // Add Category and Post Tags support
	    ));
	}



?>