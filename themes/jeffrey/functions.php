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
        'default-image'         => get_template_directory_uri() . '/img/headers/default.jpg',
        'header-text'           => false,
        'default-text-color'        => '000',
        'width'             => 1000,
        'height'            => 198,
        'random-default'        => false,
        'wp-head-callback'      => $wphead_cb,
        'admin-head-callback'       => $adminhead_cb,
        'admin-preview-callback'    => $adminpreview_cb
        ));*/

        // Enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Localisation Support
        load_theme_textdomain('jeffrey', get_template_directory() . '/languages');
    }

    /* ========================================================================================================================
    PUT ALL CUSTOM FUNCTIONS HERE
    ======================================================================================================================== */
    // Custom Excerpts
    function jeffreyWP_index($length) // Create 20 Word Callback for Index page Excerpts, call using jeffreyWP_excerpt('jeffreyWP_index');
    {
        return 20;
    }

    // Create 40 Word Callback for Custom Post Excerpts, call using jeffreyWP_excerpt('jeffreyWP_custom_post');
    function jeffreyWP_custom_post($length)
    {
        return 40;
    }

    // Remove auto <p> tags in Excerpt (Manual Excerpts only)
    function filter_ptags_on_images($content){
       return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }

    // Create the Custom Excerpts callback
    function jeffreyWP_excerpt($length_callback = '', $more_callback = '')
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

    //Page Slug Body Class
    function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
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
    function jeffreyWP_pagination()
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

        // // Modernizr
        // wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), '2.6.2'); // Modernizr
        // wp_enqueue_script('modernizr'); // Enqueue it!

        // Image Loader
         wp_register_script('imageloader', get_template_directory_uri() . '/js/jquery.imageloader.js', array(), '1.0.0', true); // Image Loader
        wp_enqueue_script('imageloader'); // Enqueue it!

        // Scripts
        wp_register_script('jeffreyscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('jeffreyscripts'); // Enqueue it!
    }

    // Load styles
    function load_styles(){
        // Stylesheet
        wp_register_style('jeffrey', get_template_directory_uri() . '/stylesheets/jeffrey.css', array(), '1.0', 'all');
        wp_enqueue_style('jeffrey'); // Enqueue it!
    }

    /* ========================================================================================================================
    ACTIONS / FILTERS / SHORTCODES
    ======================================================================================================================== */
    // Add Actions
    add_action('init', 'jeffreyWP_pagination'); // Add our Pagination
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
    add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
    add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
    add_filter( 'body_class', 'add_slug_body_class' );
    add_filter('the_content', 'filter_ptags_on_images'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)

    // Remove Filters
    remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

    /* ========================================================================================================================
    PUT ALL CUSTOM POST TYPES HERE
    ======================================================================================================================== */



?>