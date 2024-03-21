<?php
/*
Plugin Name: My Custom Plugin
Description: This plugin adds a custom template to display content.
Version: 1.0
*/

// Register custom template
function my_custom_template_register($templates)
{
    $templates['custom-template.php'] = __('Custom Template', 'my-custom-plugin');
    return $templates;
}
add_filter('theme_page_templates', 'my_custom_template_register');

// Load template file
function my_custom_template_load($template)
{
    global $post;

    if (!empty($post) && $post->post_type == 'page' && is_page_template('custom-template.php')) {
        $template = plugin_dir_path(__FILE__) . 'portfolio/index.php';
    }

    return $template;
}
add_filter('page_template', 'my_custom_template_load');

// Load custom template scripts and styles
function my_custom_template_scripts_styles()
{
    if (is_page_template('custom-template.php')) {
        // Enqueue AOS CSS
        // wp_enqueue_style('aos', plugins_url('portfolio/assets/vendor/aos/aos.css', __FILE__));

        // Enqueue Bootstrap CSS
        wp_enqueue_style('bootstrap', plugins_url('portfolio/assets/vendor/bootstrap/css/bootstrap.min.css', __FILE__));

        // Enqueue Bootstrap Icons CSS
        wp_enqueue_style('bootstrap-icons', plugins_url('portfolio/assets/vendor/bootstrap-icons/bootstrap-icons.css', __FILE__));

        // Enqueue Boxicons CSS
        wp_enqueue_style('boxicons', plugins_url('portfolio/assets/vendor/boxicons/css/boxicons.min.css', __FILE__));

        // Enqueue GLightbox CSS
        wp_enqueue_style('glightbox', plugins_url('portfolio/assets/vendor/glightbox/css/glightbox.min.css', __FILE__));

        // Enqueue Swiper CSS
        wp_enqueue_style('swiper', plugins_url('portfolio/assets/vendor/swiper/swiper-bundle.min.css', __FILE__));

        // Template Main CSS File
        wp_enqueue_style('sw-resume-main', plugins_url('portfolio/assets/css/style.css', __FILE__));

        // Enqueue Purecounter Vanilla JS
        wp_enqueue_script('purecounter', plugins_url('portfolio/assets/vendor/purecounter/purecounter_vanilla.js', __FILE__), array(), false, true);

        // Enqueue AOS JS
        wp_enqueue_script('aos', plugins_url('portfolio/assets/vendor/aos/aos.js', __FILE__), array(), false, true);

        // Enqueue Bootstrap JS
        wp_enqueue_script('bootstrap', plugins_url('portfolio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', __FILE__), array(), false, true);

        // Enqueue GLightbox JS
        wp_enqueue_script('glightbox', plugins_url('portfolio/assets/vendor/glightbox/js/glightbox.min.js', __FILE__), array(), false, true);

        // Enqueue Isotope Layout JS
        wp_enqueue_script('isotope-layout', plugins_url('portfolio/assets/vendor/isotope-layout/isotope.pkgd.min.js', __FILE__), array(), false, true);

        // Enqueue Swiper JS
        wp_enqueue_script('swiper', plugins_url('portfolio/assets/vendor/swiper/swiper-bundle.min.js', __FILE__), array(), false, true);

        // Enqueue Typed JS
        wp_enqueue_script('typed', plugins_url('portfolio/assets/vendor/typed.js/typed.umd.js', __FILE__), array(), false, true);

        // Enqueue Waypoints JS
        wp_enqueue_script('waypoints', plugins_url('portfolio/assets/vendor/waypoints/noframework.waypoints.js', __FILE__), array(), false, true);

        // Enqueue PHP Email Form Validation JS
        wp_enqueue_script('php-email-form', plugins_url('portfolio/assets/vendor/php-email-form/validate.js', __FILE__), array(), false, true);

        // Template Main JS File
        wp_enqueue_script('main-js', plugins_url('portfolio/assets/js/main.js', __FILE__), array(), false, true);
    }
}

add_action('wp_enqueue_scripts', 'my_custom_template_scripts_styles');

