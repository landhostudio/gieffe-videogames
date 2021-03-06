<?php

  if ( !function_exists( 'gieffe_videogames_setup' ) ) {

    function gieffe_videogames_setup() {
      
      // Let WordPress manage the document title -------------------------------
			
      add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages -----------------
			
      add_theme_support( 'post-thumbnails' );

			// Enables dynamic navigation --------------------------------------------

      register_nav_menus( array(
				'menu' => 'Menu'
			));

      // Load the assets -------------------------------------------------------
			
			function init_assets() {

        wp_enqueue_style( 'css-main', get_template_directory_uri() . '/dist/css/main.css', array(), '1.0.0' );
        wp_enqueue_script( 'js-plugins', get_template_directory_uri() . '/dist/js/vendor.js', array( 'jquery' ), '1.0.0', true );
        
        if ( is_page_template( 'template-pages/contact.php' ) ) {
          wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAy9L-ARM6uJGEjfALrS5RBVuPYlD8nfRc', array(), '1.0.0', true );
        }
        
        wp_enqueue_script( 'js-scripts', get_template_directory_uri() . '/dist/js/main.js', array( 'jquery' ), '1.0.0', true );

			}
			add_action( 'wp_enqueue_scripts', 'init_assets' );
      
      // Content Width ---------------------------------------------------------
      
      if (!isset($content_width)) $content_width = 1280;

      // Custom Post Type ------------------------------------------------------

      function gieffe_videogames_products() {

        $labels = array(
          'name' => __('Products', '') ,
          'singular_name' => __('Product', '')
        );

        $args = array(
          'labels' => $labels,
          'public' => true,
          'publicly_queryable' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'query_var' => true,
          'rewrite' => true,
          'capability_type' => 'post',
          'hierarchical' => false,
          'supports' => array(
            'title',
            'editor',
            'thumbnail'
          ),
          'menu_icon' => 'dashicons-cart'
        );

      	register_post_type( 'product', $args );

      }
      add_action( 'init', 'gieffe_videogames_products' );

      // Custom Post Type Taxonomy ---------------------------------------------

      function gieffe_videogames_products_taxonomy() {

      	$labels = array(
      		'name' => __( 'Categories', '' ),
      		'singular_name' => __( 'Category', '' )
      	);

        $args = array(
          'labels' => $labels,
          'hierarchical' => true,
          'query_var' => true,
          'show_ui' => true,
          'rewrite' => array(
            'hierarchical' => true
          )
        );

      	register_taxonomy( 'products', array( 'product' ), $args );

      }

      add_action( 'init', 'gieffe_videogames_products_taxonomy' );

      // Tools & hacks ---------------------------------------------------------

      get_template_part( 'inc/tools' );

      // Soil ------------------------------------------------------------------
      
      get_template_part( 'inc/soil' );

      // ACF -------------------------------------------------------------------

      if ( function_exists( 'acf_add_options_page' ) ) {

        acf_add_options_page( array(
      		'page_title' => 'Options',
      		'menu_title' => 'Options',
      		'menu_slug'  => 'theme-options'
      	));
        
      }

      function my_acf_google_map_api( $api ) {
        $api[ 'key' ] = 'AIzaSyAy9L-ARM6uJGEjfALrS5RBVuPYlD8nfRc';
        return $api;
      }
      add_filter( 'acf/fields/google_map/api', 'my_acf_google_map_api' );

    }

  }
  add_action( 'after_setup_theme', 'gieffe_videogames_setup' );
