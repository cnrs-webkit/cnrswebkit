<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * CNRS Web Kit Customizer functionality
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since CNRS Web Kit 0.3
 *
 * @see cnrswebkit_header_style()
 */
function cnrswebkit_custom_header_and_background() {
	$color_scheme             = cnrswebkit_get_color_scheme();
	$default_background_color = trim( $color_scheme[0], '#' );
	$default_text_color       = trim( $color_scheme[3], '#' );

	/**
	 * Filter the arguments used when adding 'custom-background' support in CNRS Web Kit.
	 *
	 * @since CNRS Web Kit 0.3
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'cnrswebkit_custom_background_args', array(
		'default-color' => $default_background_color,
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in CNRS Web Kit.
	 *
	 * @since CNRS Web Kit 0.3
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'cnrswebkit_custom_header_args', array(
		'default-text-color'     => $default_text_color,
		'width'                  => 1200,
		'height'                 => 280,
		'flex-height'            => true,
		'wp-head-callback'       => 'cnrswebkit_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'cnrswebkit_custom_header_and_background' );

if ( ! function_exists( 'cnrswebkit_header_style' ) ) :
/**
 * Styles the header text displayed on the site.
 *
 * Create your own cnrswebkit_header_style() function to override in a child theme.
 *
 * @since CNRS Web Kit 0.3
 *
 * @see cnrswebkit_custom_header_and_background().
 */
function cnrswebkit_header_style() {

    if ( display_header_text() ) {
		return;
	}
	// If the header text has been hidden.
	?>
	<style type="text/css" id="cnrswebkit-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-branding .site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif; // cnrswebkit_header_style
/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @since CNRS Web Kit 0.3
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function cnrswebkit_customize_register( $wp_customize ) {
	$color_scheme = cnrswebkit_get_color_scheme();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control( 'background_color' )->description = __( 'Autour de la page', 'cnrswebkit' );
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'cnrswebkit_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'cnrswebkit_customize_partial_blogdescription',
		) );
	}

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'cnrswebkit_sanitize_color_scheme',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'color_scheme', array(
		'label'    => __( 'Base Color Scheme', 'cnrswebkit' ),
		'section'  => 'colors',
		'type'     => 'select',
		'choices'  => cnrswebkit_get_color_scheme_choices(),
		'priority' => 1,
	) );

	// Add page background color setting and control.
	$wp_customize->add_setting( 'page_background_color', array(
		'default'           => $color_scheme[1],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_background_color', array(
		'label'       => __( 'Page Background Color', 'cnrswebkit' ),
	    'description' => __( 'Le fond est au dessus de l\'arrière plan', 'cnrswebkit' ),
	    'section'     => 'colors',
	) ) );

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Add link color setting and control.
	$wp_customize->add_setting( 'link_color', array(
		'default'           => $color_scheme[2],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'       => __( 'Link Color', 'cnrswebkit' ),
	    //TODO 
	    'description' => '(preview partiellement fonctionnel)',
		'section'     => 'colors',
	) ) );

	// Add main text color setting and control.
	$wp_customize->add_setting( 'main_text_color', array(
		'default'           => $color_scheme[3],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_text_color', array(
		'label'       => __( 'Main Text Color', 'cnrswebkit' ),
		'section'     => 'colors',
	) ) );

	// Add secondary text color setting and control.
	$wp_customize->add_setting( 'secondary_text_color', array(
		'default'           => $color_scheme[4],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_text_color', array(
		'label'       => __( 'Secondary Text Color', 'cnrswebkit' ),
		'section'     => 'colors',
	) ) );
	
	// Section Typography
	$wp_customize->add_section( 'typography' , array(
	'title'      => __( 'Typography', 'cnrswebkit' ),
	'priority'   => 30,
	) );
	
	// Add text justification setting and control.
	$wp_customize->add_setting( 'text_align', array(
	'default'           => 'left',
	'sanitize_callback' => 'cnrswebkit_sanitize_text_align',
	'transport'         => 'postMessage',
	) );
	$text_styles=array( 
	    'left' => 
    	    /* Translators: this is one text-align property */
    	    __( 'Left', 'cnrswebkit' ) ,
	    'right' => 
	        /* Translators: this is one text-align property */
	        __( 'Right', 'cnrswebkit' ) ,
	    'center' => 
	        /* Translators: this is one text-align property */
            __( 'Center', 'cnrswebkit' ) ,
	    'justify' => 
	        /* Translators: this is one text-align property */
	        __( 'Justify', 'cnrswebkit' ) ,
	    
	);
	
	$wp_customize->add_control( 'text_align', array(
	    'label'       => __( 'Text alignement', 'cnrswebkit' ),
	    'section'     => 'typography',
	    'type'     => 'select',
	    'choices'  => cnrswebkit_get_text_aligns(),
	) ) ;
	
}
add_action( 'customize_register', 'cnrswebkit_customize_register', 11 );

function cnrswebkit_get_text_aligns() {
    return 
    array(
        'left' =>
        /* Translators: this is one text-align property */
        __( 'Left', 'cnrswebkit' ) ,
        'right' =>
        /* Translators: this is one text-align property */
        __( 'Right', 'cnrswebkit' ) ,
        'center' =>
        /* Translators: this is one text-align property */
        __( 'Center', 'cnrswebkit' ) ,
        'justify' =>
        /* Translators: this is one text-align property */
        __( 'Justify', 'cnrswebkit' ) ,
        
    );
    
}

function cnrswebkit_sanitize_text_align( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, cnrswebkit_get_text_aligns() ) ? $input : $setting->default );
}
/**
 * Render the site title for the selective refresh partial.
 *
 * @since CNRS Web Kit 1.2
 * @see cnrswebkit_customize_register()
 *
 * @return void
 */
function cnrswebkit_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since CNRS Web Kit 1.2
 * @see cnrswebkit_customize_register()
 *
 * @return void
 */
function cnrswebkit_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Registers color schemes for CNRS Web Kit.
 *
 * Can be filtered with {@see 'cnrswebkit_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Page Background Color.
 * 3. Link Color.
 * 4. Main Text Color.
 * 5. Secondary Text Color.
 *
 * @since CNRS Web Kit 0.3
 *
 * @return array An associative array of color scheme options.
 */
function cnrswebkit_get_color_schemes() {
	/**
	 * Filter the color schemes registered for use with CNRS Web Kit.
	 *
	 * The default schemes include 'default', 'dark', 'gray', 'red', and 'yellow'.
	 *
	 * @since CNRS Web Kit 0.3
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	return apply_filters( 'cnrswebkit_color_schemes', array(
		'default' => array(
			/* Translators: this is one color scheme among all color schemes of CNRSWebKit */
			'label'  => __( 'Default', 'cnrswebkit' ),
			'colors' => array(
				'#1a1a1a',
				'#ffffff',
				'#007acc',
				'#1a1a1a',
				'#686868',
			),
		),
		'dark' => array(
		/* Translators: this is one color scheme among all color schemes of CNRSWebKit */
		'label'  => __( 'Dark', 'cnrswebkit' ),
			'colors' => array(
				'#262626',
				'#1a1a1a',
				'#9adffd',
				'#e5e5e5',
				'#c1c1c1',
			),
		),
		'gray' => array(
		/* Translators: this is one color scheme among all color schemes of CNRSWebKit */
		'label'  => __( 'Gray', 'cnrswebkit' ),
			'colors' => array(
				'#616a73',
				'#4d545c',
				'#c7c7c7',
				'#f2f2f2',
				'#f2f2f2',
			),
		),
		'red' => array(
		/* Translators: this is one color scheme among all color schemes of CNRSWebKit */
		'label'  => __( 'Red', 'cnrswebkit' ),
			'colors' => array(
				'#ffffff',
				'#ff675f',
				'#640c1f',
				'#402b30',
				'#402b30',
			),
		),
		'yellow' => array(
		/* Translators: this is one color scheme among all color schemes of CNRSWebKit */
		'label'  => __( 'Yellow', 'cnrswebkit' ),
			'colors' => array(
				'#3b3721',
				'#ffef8e',
				'#774e24',
				'#3b3721',
				'#5b4d3e',
			),
		),
	) );
}

if ( ! function_exists( 'cnrswebkit_get_color_scheme' ) ) :
/**
 * Retrieves the current CNRS Web Kit color scheme.
 *
 * Create your own cnrswebkit_get_color_scheme() function to override in a child theme.
 *
 * @since CNRS Web Kit 0.3
 *
 * @return array An associative array of either the current or default color scheme HEX values.
 */
function cnrswebkit_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       = cnrswebkit_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // cnrswebkit_get_color_scheme

if ( ! function_exists( 'cnrswebkit_get_color_scheme_choices' ) ) :
/**
 * Retrieves an array of color scheme choices registered for CNRS Web Kit.
 *
 * Create your own cnrswebkit_get_color_scheme_choices() function to override
 * in a child theme.
 *
 * @since CNRS Web Kit 0.3
 *
 * @return array Array of color schemes.
 */
function cnrswebkit_get_color_scheme_choices() {
	$color_schemes                = cnrswebkit_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // cnrswebkit_get_color_scheme_choices


if ( ! function_exists( 'cnrswebkit_sanitize_color_scheme' ) ) :
/**
 * Handles sanitization for CNRS Web Kit color schemes.
 *
 * Create your own cnrswebkit_sanitize_color_scheme() function to override
 * in a child theme.
 *
 * @since CNRS Web Kit 0.3
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function cnrswebkit_sanitize_color_scheme( $value ) {
	$color_schemes = cnrswebkit_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		return 'default';
	}

	return $value;
}
endif; // cnrswebkit_sanitize_color_scheme


/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160816', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', cnrswebkit_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'cnrswebkit_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_customize_preview_js() {
	wp_enqueue_script( 'cnrswebkit-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160816', true );
}
add_action( 'customize_preview_init', 'cnrswebkit_customize_preview_js' );

/**
 * Returns CSS for the color schemes.
 *
 * @since CNRS Web Kit 0.3
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function cnrswebkit_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'background_color'      => '',
		'page_background_color' => '',
		'link_color'            => '',
		'main_text_color'       => '',
		'secondary_text_color'  => '',
		'border_color'          => '',
	    'text_align'            => '',
	) );
	$css = file_get_contents(TEMPLATEPATH . '/library/scss/_cnrs_dyn_custom.scss');
	foreach($colors as $key => $value) {
	    $css = str_replace ('$' . $key , $value, $css);
	}
	 
	return $css; 

}


/**
 * Outputs an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_color_scheme_css_template() {
	$colors = array(
		'background_color'      => '{{ data.background_color }}',
		'page_background_color' => '{{ data.page_background_color }}',
		'link_color'            => '{{ data.link_color }}',
		'main_text_color'       => '{{ data.main_text_color }}',
		'secondary_text_color'  => '{{ data.secondary_text_color }}',
	    'border_color'          => '{{ data.border_color }}',
	    'text_align'            => '{{ data.text_align }}',
	);
	?>
	<script type="text/html" id="tmpl-cnrswebkit-color-scheme">
		<?php echo cnrswebkit_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'cnrswebkit_color_scheme_css_template' );


 
 /**
  * Attempt to use Dynamic css with WP_customizer
  * source: https://seothemes.com/how-to-compile-wordpress-theme-customizer-values-into-main-stylesheet/
  */
add_action( 'customize_save_after', 'cnrswebkit_compile_custom_css');

function cnrswebkit_compile_custom_css() {
    
    // Check if WP-SCSS plugin is active. 
    if ( ! is_plugin_active( 'wp-scss/wp-scss.php' ) ) {
        // TODO message 
        return;
    }
    
    // Tell WP-SCSS to "always" recompile  
    if ( ! defined( 'WP_SCSS_ALWAYS_RECOMPILE' ) ) {
        define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
    }
    // Get the default colors.
    $color_scheme = cnrswebkit_get_color_scheme();
    
    // Convert main text hex color to rgba.
    $color_textcolor_rgb = cnrswebkit_hex2rgb( $color_scheme[3] );
    
    // If we get this far, we have a custom color scheme with $colors default values
    $colors = array(
    'background_color'      => $color_scheme[0],
    'page_background_color' => $color_scheme[1],
    'link_color'            => $color_scheme[2],
    'main_text_color'       => $color_scheme[3],
    'secondary_text_color'  => $color_scheme[4],
    'border_color'          => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.2)', $color_textcolor_rgb ),
    'text_align'            => 'left',
    
    );
    
    // Modify cnrs_dyn.scss file
    $content = file_get_contents(TEMPLATEPATH . '/library/scss/cnrs_dyn.scss');
    
    // Create an array of variables.
    $variables = array();
    
    // Loop through each variable and get theme_mod.
    foreach ( $colors as $key => $value ) {
        $color = get_theme_mod( $key, $value );
        $regexp = '/\$' . $key . ':[#A-Za-z0-9 (),.]{0,30};/';
        var_dump($regexp); 
        $content = preg_replace($regexp, '$' .$key . ':' . $color . ';', $content); 
    }
    
    file_put_contents(TEMPLATEPATH . '/library/scss/cnrs_dyn.scss', $content);
    
    // Recompile cnrs_dyn.scss (this may take a few second but its only done in preview, never in frontend). 
    if ( is_plugin_active( 'wp-scss/wp-scss.php' ) ) {
        if ( ! defined( 'WP_SCSS_ALWAYS_RECOMPILE' ) ) {
            define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
        }
        $wpscss_options = get_option( 'wpscss_options' );
        // Alter the options array appropriately.
        $wpscss_options['scss_dir'] = '/library/scss/';
        $wpscss_options['css_dir']  = '/library/css/';
        global $wpscss_compiler;
        $wpscss_compiler->set_variables($wpscss_options);
        $wpscss_compiler->compile();
    }
}







