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
    $wp_customize->add_section("pobi_header_area", array('titile' => __('Header Area', 'PobiRoy'), 'description' => 'You can update here your logo'));

    $wp_customize->add_setting("pobi_logo", array('default' => get_bloginfo('template_directory') . 'img/logo.jpg'));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "pobi_logo", array('label' => 'Upload Logo', 'PobiRoy', 'section' => 'pobi_header_area', 'setting' => 'pobi_logo', 'description' => 'You can upload your logo')));
};

add_action('customize_register', 'pobi_customization_register');
