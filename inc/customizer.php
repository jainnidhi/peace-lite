<?php
/**
 * Peace Theme Customizer support
 *
 * @package WordPress
 * @subpackage Peace
 * @since Peace 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Peace 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function peace_customize_register($wp_customize) {
    
    $wp_customize->get_control( 'background_color'  )->section   = 'background_image';
    $wp_customize->get_section( 'background_image'  )->title     = __('Background Settings','peace');
    $wp_customize->get_section( 'background_image' )->description = __('Please note that background color and image settings work only for Boxed Layout','peace'); 
    
    $wp_customize->get_section('header_image')->priority = 27;
    $wp_customize->get_section('static_front_page')->priority = 28;
    $wp_customize->get_section('nav')->priority = 29;
    $wp_customize->get_section( 'background_image' )->priority  = 30;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class peace_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'peace') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for custom favicon settings
    $wp_customize->add_section('peace_custom_favicon_setting', array(
        'title' => __('Custom Favicon', 'peace'),
        'priority' => 77,
    ));


    $wp_customize->add_setting('custom_favicon');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'custom_favicon', array(
        'label' => 'Custom Favicon',
        'section' => 'peace_custom_favicon_setting',
        'settings' => 'custom_favicon',
        'priority' => 1,
            )
            )
    );

    // Add new section for custom favicon settings
    $wp_customize->add_section('peace_tracking_code_setting', array(
        'title' => __('Tracking Code', 'peace'),
        'priority' => 76,
    ));

    $wp_customize->add_setting('tracking_code', array('default' => '',
        'sanitize_js_callback' => 'peace_sanitize_escaping',
    ));

    $wp_customize->add_control(new peace_customize_textarea_control($wp_customize, 'tracking_code', array(
        'label' => __('Tracking Code', 'peace'),
        'section' => 'peace_tracking_code_setting',
        'settings' => 'tracking_code',
        'priority' => 2,
    )));


    // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'peace'),
        'priority' => 35,
    ));

    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 1,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 6,
    ));
    
    $wp_customize->add_setting('dribbble_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('dribbble_link_url', array(
        'label' => __('Dribble URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'dribbble_link_url',
        'priority' => 7,
    ));
    
    $wp_customize->add_setting('tumblr_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tumblr_link_url', array(
        'label' => __('Tumblr URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'tumblr_link_url',
        'priority' => 8,
    ));
    
    $wp_customize->add_setting('flickr_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('flickr_link_url', array(
        'label' => __('Flickr URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'flickr_link_url',
        'priority' => 9,
    ));
    
    $wp_customize->add_setting('vimeo_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('vimeo_link_url', array(
        'label' => __('Vimeo URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'vimeo_link_url',
        'priority' => 10,
    ));
    
    $wp_customize->add_setting('linkedin_link_url', array('default' => __('', 'peace'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('linkedin_link_url', array(
        'label' => __('Linkedin URL', 'peace'),
        'section' => 'social_icon_setting',
        'settings' => 'linkedin_link_url',
        'priority' => 11,
    ));

   
    // Add footer text section
    $wp_customize->add_section('peace_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 75,
    ));

    $wp_customize->add_setting('peace_footer_footer_text', array(
        'default' => null,
        'sanitize_js_callback' => 'peace_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new peace_customize_textarea_control($wp_customize, 'peace_footer_footer_text', array(
        'section' => 'peace_footer', // id of section to which the setting belongs
        'settings' => 'peace_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('peace_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('peace_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'peace_sanitize_custom_css',
        'sanitize_js_callback' => 'peace_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new peace_customize_textarea_control($wp_customize, 'peace_custom_css', array(
        'section' => 'peace_custom_css', // id of section to which the setting belongs
        'settings' => 'peace_custom_css',
    )));


    //remove default customizer sections
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'peace_customize_register');



/*
 * Sanitize numeric values 
 * 
 * @since Peace 1.0
 */

function peace_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Peace 1.0
 */

function peace_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Peace 1.0
 */

function peace_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Peace 1.0
 */

function peace_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Peace 1.0
 */

function peace_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'gray', 'purple', 'orange', 'brown', 'pink'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}

/*
 * Sanitize background color scheme options 
 * 
 * @since Peace 1.0
 */

function peace_sanitize_bg_color_scheme_option($bg_colorscheme_option) {
    if (!in_array($bg_colorscheme_option, array('light', 'dark'))) {
        $bg_colorscheme_option = 'light';
    }

    return $bg_colorscheme_option;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Peace 1.0
 */
function peace_customize_preview_js() {
    wp_enqueue_script('peace_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'peace_customize_preview_js');

function peace_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('peace_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'peace_header_output');

function peace_footer_tracking_code() {
    echo get_theme_mod('tracking_code');
}

add_action('wp_footer', 'peace_footer_tracking_code');
