<?php

/**
 * my theme functions and definitions
 *
 */


//  theme title 
add_theme_support('title-tag');



// //theme css and jquery file calling
// function pobi_css_js_file_calling(){
//     wp_enqueue_style("pobi-style", get_stylesheet_uri());

//     wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '4.3.1', 'all');
//     wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
//     wp_enqueue_style('bootstrap');
//     wp_enqueue_style('custom');


//     // JQUERY FILE CALLING
//     wp_enqueue_script('jquery');
//     wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '4.3.1', true);
//     wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', true);
// }
// add_action('wp_enqueue_scripts','pobi_css_js_file_calling');



function pobi_css_js_file_calling()
{
    // Enqueue CSS
    wp_enqueue_style("pobi-style", get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.3', 'all');
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0', 'all');

    // Enqueue JavaScript
    wp_enqueue_script('jquery'); // Ensure jQuery loads
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '5.3.3', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'pobi_css_js_file_calling');



//theme function

function pobi_customization_register($wp_customize)
{
    $wp_customize->add_section("pobi_header_area", array('title' => __('Header Area', 'PobiRoy'), 'description' => 'You can update here your logo'));

    $wp_customize->add_setting("pobi_logo", array('default' => get_template_directory_uri() . '/img/logo.png'));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "pobi_logo", array('label' => 'Upload Logo', 'PobiRoy', 'section' => 'pobi_header_area', 'setting' => 'pobi_logo', 'description' => 'You can upload your logo')));
};




add_action('customize_register', 'pobi_customization_register');


//register main menu
register_nav_menu('main_menu', __('Main Menu', 'PobiRoy'));


// gooogle fonts enqueue
function pobi_add_google_fonnts()
{
    wp_enqueue_style('pobi-google-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap', false);
}

add_action('wp_enqueue_scripts', 'pobi_add_google_fonnts');





// this line taken from chatgpt for solving issue

// function pobi_customization_register($wp_customize)
// {
//     // Add a new section
//     $wp_customize->add_section("pobi_header_area", array(
//         'title'       => __('Header Area', 'PobiRoy'),
//         'description' => __('You can update your data here', 'PobiRoy')
//     ));

//     // Add a new setting
//     $wp_customize->add_setting("pobi_logo", array(
//         'default'    => get_template_directory_uri() . '/img/logo.jpg',
//         'transport'  => 'refresh'
//     ));

//     // Add an image upload control
//     $wp_customize->add_control(new WP_Customize_Image_Control(
//         $wp_customize,
//         "pobi_logo",
//         array(
//             'label'       => __('Upload Logo', 'PobiRoy'),
//             'section'     => 'pobi_header_area',
//             'settings'    => 'pobi_logo',
//             'description' => __('You can upload your logo', 'PobiRoy')
//         )
//     ));
//     // Add a setting for the logo URL
//     $wp_customize->add_setting("pobi_logo_url", array(
//         'default'    => home_url(), // Default to homepage
//         'transport'  => 'refresh',
//         'sanitize_callback' => 'esc_url_raw' // Sanitize URL
//     ));

//     // Add a text input control for the logo URL
//     $wp_customize->add_control("pobi_logo_url", array(
//         'label'       => __('Logo URL', 'PobiRoy'),
//         'section'     => 'pobi_header_area',
//         'settings'    => 'pobi_logo_url',
//         'type'        => 'url',
//         'description' => __('Enter the URL for your logo link', 'PobiRoy')
//     ));

//     // Add a setting for the header background color
//     $wp_customize->add_setting("pobi_header_color", array(
//         'default'    => '#ffffff', // Default to white
//         'transport'  => 'refresh',
//         'sanitize_callback' => 'sanitize_hex_color' // Ensures valid color format
//     ));

//     // Add a color picker control for the header background
//     $wp_customize->add_control(new WP_Customize_Color_Control(
//         $wp_customize,
//         "pobi_header_color",
//         array(
//             'label'       => __('Header Background Color', 'PobiRoy'),
//             'section'     => 'pobi_header_area',
//             'settings'    => 'pobi_header_color',
//             'description' => __('Select a background color for your header.', 'PobiRoy')
//         )
//     ));
// }

// Hook the function to the WordPress Customizer
// add_action('customize_register', 'pobi_customization_register'); 

class Custom_Nav_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<ul class="submenu">';
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));

        if (in_array('menu-item-has-children', $classes)) {
            $output .= '<li class="' . esc_attr($class_names) . '"><a href="' . esc_url($item->url) . '">' . $item->title . ' ▼</a>';
        } else {
            $output .= '<li class="' . esc_attr($class_names) . '"><a href="' . esc_url($item->url) . '">' . $item->title . '</a>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }
}
