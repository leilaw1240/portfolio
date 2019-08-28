<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage portfolio
 * @since Portfolio 1.0
 */
?> 
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">

        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

        <!-- Animate.css -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css">
        <!-- Flexslider  -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/flexslider.css">
        <!-- Flaticons  -->
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.min.css">
        <!-- Theme style  -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

        <!-- Modernizr JS -->
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
        <![endif]-->

        <script>
            var base_url = '<?php echo site_url(); ?>';
        </script>

    </head>
    <body <?php body_class(); ?>>
        <div id="colorlib-page">
            <div class="container-wrap">
                <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
                    <div class="text-center">
                        <?php
                        $profileImg = '//via.placeholder.com/350x350';
                        if (has_post_thumbnail()) {
                            $profileImg = get_the_post_thumbnail_url();
                        }
                        $name = get_post_meta(get_the_ID(), 'my-name', true);
                        $designation = get_post_meta(get_the_ID(), 'my-designation', true);
                        ?>
                        <div class="author-img" style="background-image: url(<?php echo $profileImg; ?>);"></div>
                        <h1 id="colorlib-logo">
                            <a href="<?php echo site_url(); ?>"><?php echo $name; ?></a>
                        </h1>
                        <span class="position">
                            <a href="#"><?php echo $designation; ?></a>
                        </span>
                    </div>
                    <?php
                    if (has_nav_menu('primary')) : $menu_name = 'primary'; //e.g. primary-menu; $options['menu_choice'] in your case

                        if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
                            $menu = wp_get_nav_menu_object($locations[$menu_name]);
                            $menu_items = wp_get_nav_menu_items($menu->term_id);
                        }
                        
//                        echo '<pre>'; print_r($menu_items);exit;

                        $custom_menu_items = '';

                        foreach ($menu_items as $menu_item) {
                            $id = $menu_item->ID;
                            $title = $menu_item->title;
                            $url = $menu_item->url;
                            $menu_class = implode(' ', $menu_item->classes);

                            $menu_set = array('id' => $id, 'title' => $title, 'url' => $url,'menu_class'=>$menu_class);

                            if ($parent_id = $menu_item->menu_item_parent) {
                                $custom_sub_menu_items[$menu_item->menu_item_parent][] = $menu_set;
                            } else {
                                $custom_menu_items[] = $menu_set;
                            }
                        }
//                    echo '<pre>'; print_r($custom_menu_items);exit;
                        ?>
                        <nav id="colorlib-main-menu" role="navigation" class="navbar">
                            <div id="navbar" class="collapse">
                                <ul>
                                    <!--                                    <li class="active"><a href="#" data-nav-section="about">About</a></li>
                                                                        <li><a href="#" data-nav-section="skills">Skills</a></li>
                                                                        <li><a href="#" data-nav-section="education">Education</a></li>
                                                                        <li><a href="#" data-nav-section="experience">Experience</a></li>
                                                                        <li><a href="#" data-nav-section="work">Work</a></li>
                                                                        <li><a href="#" data-nav-section="contact">Contact</a></li>-->
                                    <?php
                                    $i = 1;
                                    foreach ($custom_menu_items as $custom_menu_item) {
                                        $has_sub_menu = !empty($custom_sub_menu_items[$custom_menu_item['id']]) ? 1 : 0
                                        ?>
                                        <li ><a href="#" <?php echo $i == 1 ? 'class="active"' : '' ?> <?php echo !empty($custom_menu_item['menu_class']) ? 'data-nav-section="'.$custom_menu_item['menu_class'].'"' : '' ?> ><?php echo $custom_menu_item['title']; ?></a></li>
                                    <?php $i++; } ?>
                                </ul>
                            </div>
                        </nav>
                    <?php endif; ?>

                    <div class="colorlib-footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li><a href="#"><i class="icon-twitter2"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                        </ul>
                    </div>

                </aside>

                <div id="colorlib-main">


