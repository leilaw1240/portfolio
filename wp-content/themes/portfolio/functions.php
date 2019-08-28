<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentysixteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own twentysixteen_setup() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     */
    function twentysixteen_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
         * If you're building a theme based on Twenty Sixteen, use a find and replace
         * to change 'twentysixteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentysixteen');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for custom logo.
         *
         *  @since Twenty Sixteen 1.2
         */
        add_theme_support('custom-logo', array(
            'height' => 240,
            'width' => 240,
            'flex-height' => true,
        ));

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentysixteen'),
            'social' => __('Social Links Menu', 'twentysixteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
            'project'
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', twentysixteen_fonts_url()));

        // Load regular editor styles into the new block-based editor.
        add_theme_support('editor-styles');

        // Load default block styles.
        add_theme_support('wp-block-styles');

        // Add support for responsive embeds.
        add_theme_support('responsive-embeds');

        // Add support for custom color scheme.
        add_theme_support('editor-color-palette', array(
            array(
                'name' => __('Dark Gray', 'twentysixteen'),
                'slug' => 'dark-gray',
                'color' => '#1a1a1a',
            ),
            array(
                'name' => __('Medium Gray', 'twentysixteen'),
                'slug' => 'medium-gray',
                'color' => '#686868',
            ),
            array(
                'name' => __('Light Gray', 'twentysixteen'),
                'slug' => 'light-gray',
                'color' => '#e5e5e5',
            ),
            array(
                'name' => __('White', 'twentysixteen'),
                'slug' => 'white',
                'color' => '#fff',
            ),
            array(
                'name' => __('Blue Gray', 'twentysixteen'),
                'slug' => 'blue-gray',
                'color' => '#4d545c',
            ),
            array(
                'name' => __('Bright Blue', 'twentysixteen'),
                'slug' => 'bright-blue',
                'color' => '#007acc',
            ),
            array(
                'name' => __('Light Blue', 'twentysixteen'),
                'slug' => 'light-blue',
                'color' => '#9adffd',
            ),
            array(
                'name' => __('Dark Brown', 'twentysixteen'),
                'slug' => 'dark-brown',
                'color' => '#402b30',
            ),
            array(
                'name' => __('Medium Brown', 'twentysixteen'),
                'slug' => 'medium-brown',
                'color' => '#774e24',
            ),
            array(
                'name' => __('Dark Red', 'twentysixteen'),
                'slug' => 'dark-red',
                'color' => '#640c1f',
            ),
            array(
                'name' => __('Bright Red', 'twentysixteen'),
                'slug' => 'bright-red',
                'color' => '#ff675f',
            ),
            array(
                'name' => __('Yellow', 'twentysixteen'),
                'slug' => 'yellow',
                'color' => '#ffef8e',
            ),
        ));

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');
    }

endif; // twentysixteen_setup
add_action('after_setup_theme', 'twentysixteen_setup');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
    $GLOBALS['content_width'] = apply_filters('twentysixteen_content_width', 840);
}

add_action('after_setup_theme', 'twentysixteen_content_width', 0);

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'twentysixteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 1', 'twentysixteen'),
        'id' => 'sidebar-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 2', 'twentysixteen'),
        'id' => 'sidebar-3',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'twentysixteen_widgets_init');

if (!function_exists('twentysixteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Sixteen.
     *
     * Create your own twentysixteen_fonts_url() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentysixteen_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Merriweather font: on or off', 'twentysixteen')) {
            $fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
        }

        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'twentysixteen')) {
            $fonts[] = 'Montserrat:400,700';
        }

        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentysixteen')) {
            $fonts[] = 'Inconsolata:400';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentysixteen_javascript_detection', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Twenty Sixteen 1.6
 */
function twentysixteen_block_editor_styles() {
    // Block styles.
    wp_enqueue_style('twentysixteen-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20181230');
    // Add custom fonts.
    wp_enqueue_style('twentysixteen-fonts', twentysixteen_fonts_url(), array(), null);
}

add_action('enqueue_block_editor_assets', 'twentysixteen_block_editor_styles');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes($classes) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if (get_background_image()) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'twentysixteen_body_classes');

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb($color) {
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } else if (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }

    return array('red' => $r, 'green' => $g, 'blue' => $b);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr($sizes, $size) {
    $width = $size[0];

    if (840 <= $width) {
        $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
    }

    if ('page' === get_post_type()) {
        if (840 > $width) {
            $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
        }
    } else {
        if (840 > $width && 600 <= $width) {
            $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        } elseif (600 > $width) {
            $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
        }
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentysixteen_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    if ('post-thumbnail' === $size) {
        if (is_active_sidebar('sidebar-1')) {
            $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        } else {
            $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
        }
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10, 3);

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentysixteen_widget_tag_cloud_args($args) {
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    $args['format'] = 'list';

    return $args;
}

add_filter('widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args');


if (class_exists('RW_Meta_Box')) {

    function my_protfolio_get_meta_box($meta_boxes) {
        $prefix = 'my-';

        $post_types = array('page');
        //Meta Data fields for Personal Information
        $meta_boxes[] = array(
            'id' => 'personal-info',
            'title' => esc_html__('Personal Information', 'portfolio'),
            'post_types' => $post_types,
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => $prefix . 'name',
                    'type' => 'text',
                    'name' => esc_html__('Name', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'email',
                    'type' => 'text',
                    'name' => esc_html__('Email', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'mobile',
                    'type' => 'text',
                    'name' => esc_html__('Mobile Number', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'designation',
                    'type' => 'text',
                    'name' => esc_html__('Designation', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'address',
                    'type' => 'textarea',
                    'name' => esc_html__('Address', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'contact-form',
                    'name' => esc_html__('Contact Form', 'portfolio'),
                    'type' => 'wysiwyg',
                ),
            ),
        );


        //Meta Data fields for Education
        $meta_boxes[] = array(
            'id' => 'education',
            'title' => esc_html__('Education', 'portfolio'),
            'post_types' => $post_types,
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => $prefix . 'education',
                    'type' => 'text_list',
                    'name' => esc_html__('Education', 'portfolio'),
                    'options' => array(
                        'Institute Name' => 'Inistitute Name',
                        '2000' => 'From',
                        '2010' => 'To'
                    ),
                    'clone' => 'true',
                    'sort_clone' => 'true',
                    'max_clone' => 10,
                ),
            ),
        );

        //Meta Data fields for work experience

        $meta_boxes[] = array(
            'id' => 'work-experience',
            'title' => esc_html__('Work Experience', 'portfolio'),
            'post_types' => $post_types,
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => $prefix . 'experience',
                    'type' => 'text_list',
                    'name' => esc_html__('Work Experience', 'portfolio'),
                    'options' => array(
                        'XYZ PVT LTD' => 'Company Name',
                        '2000' => 'From',
                        '2010' => 'To'
                    ),
                    'clone' => 'true',
                    'sort_clone' => 'true',
                    'max_clone' => 10,
                ),
            ),
        );

        //Meta Data fields for Skills

        $meta_boxes[] = array(
            'id' => 'skills',
            'title' => esc_html__('Skills', 'portfolio'),
            'post_types' => $post_types,
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => $prefix . 'skills',
                    'type' => 'text_list',
                    'name' => esc_html__('Skills', 'portfolio'),
                    'options' => array(
                        'Java' => 'Technology',
                        '2' => 'Years of Experience',
                    ),
                    'clone' => 'true',
                    'max_clone' => 20,
                ),
            ),
        );


        $prefix = 'project-';

        $post_types = array('project');
        //Meta Data fields for Personal Information
        $meta_boxes[] = array(
            'id' => 'project-info',
            'title' => esc_html__('Project Information', 'portfolio'),
            'post_types' => $post_types,
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => $prefix . 'team',
                    'type' => 'number',
                    'name' => esc_html__('Team Size', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'client',
                    'type' => 'text',
                    'name' => esc_html__('Client', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'duration',
                    'type' => 'text',
                    'name' => esc_html__('Project Duration', 'portfolio'),
                ),
                array(
                    'id' => $prefix . 'url',
                    'type' => 'text',
                    'name' => esc_html__('Project Url', 'portfolio'),
                ),
//                array(
//                    'id' => $prefix . 'start-date',
//                    'type' => 'date',
//                    'name' => esc_html__('Start Date', 'portfolio'),
//                ),
//                
//                 array(
//                    'id' => $prefix . 'end-date',
//                    'type' => 'date',
//                    'name' => esc_html__('End Date', 'portfolio'),
//                ),
            ),
        );


        return $meta_boxes;
    }

    add_filter('rwmb_meta_boxes', 'my_protfolio_get_meta_box');
} else {
    showNotificationMessage('error', 'Meta Box Plugin need to be installed. In order install please refer this <a href="https://wordpress.org/plugins/meta-box/">Link</a>');
}

// display custom admin notice
function showNotificationMessage($type, $message) {
    ?>
    <div class="notice notice-<?php echo $type; ?> is-dismissible">
        <p><?php _e($message); ?></p>
    </div>

    <?php
}

add_filter('use_block_editor_for_post', 'disable_gutenberg_editor');

function disable_gutenberg_editor() {
    return false;
}

// Creatiing custom post type for projects info
function create_custom_post_type() {

    register_post_type('project', array(
        'labels' => array(
            'name' => __('Projects'),
            'singular_name' => __('Project')
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
//        'taxonomies' => array('category'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projects'),
            )
    );

    register_taxonomy(
            'project_tag', //your tags taxonomy
            'project', // Your post type
            array(
        'hierarchical' => false,
        'label' => __('Tags', CURRENT_THEME),
        'singular_name' => __('Tag', CURRENT_THEME),
        'rewrite' => true,
        'query_var' => true
            )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_custom_post_type');


add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

function filter_projects() {

    if (!empty($_POST) && $_POST['action'] == 'filter_projects') {
        extract($_POST);
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'project',
        );
        if ($term_id > 0) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project_tag',
                    'field' => 'term_id',
                    'terms' => $term_id,
                )
            );
        }

        $projects = get_posts($args);

        $response['error'] = true;

        if ($projects) {
//            print_r($projects);exit;
            $response['error'] = false;
            foreach ($projects as $project) :
                setup_postdata($project);
                $team_size = get_post_meta($project->ID, 'project-team', true);
                $client = get_post_meta($project->ID, 'project-client', true);
                $team_duration = get_post_meta($project->ID, 'project-duration', true);
                $url = get_post_meta($project->ID, 'project-url', true);
                $projectImg = get_template_directory_uri() . '/assets/images/img-1.jpg';
                if (has_post_thumbnail($project->ID)) {
                    $projectImg = get_the_post_thumbnail_url($project->ID);
                }
                $response['data']['projects'][] = array(
                    'title' => get_the_title($project->ID),
                    'client' => $client,
                    'team' => $team_size,
                    'duration' => $team_duration,
                    'url' => $url,
                    'project_image' => $projectImg
                );
            endforeach;
            wp_reset_postdata();
        } else {
            $response['message'] = 'No project Available';
        }

        echo json_encode($response);
        exit;
    }
}
