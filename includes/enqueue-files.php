<?php 
// CSS and JS Files Enqueue
function custom_post_types_enqueue_scripts() {
    wp_enqueue_style( 'custom-post-tabs-main-css', plugin_dir_url( __DIR__ ) . 'assets/css/main.css'  );
    wp_enqueue_style( 'custom-post-tabs-grid', plugin_dir_url( __DIR__ ) . 'assets/css/grid.min.css'  );
  
    wp_enqueue_script( 'custom-post-tabs-jquery-js', plugin_dir_url( __DIR__ ) . 'assets/js/jquery.min.js', false);
    wp_enqueue_script( 'custom-post-tabs-main-js', plugin_dir_url( __DIR__ ) . 'assets/js/main.js', false);
}
add_action( 'wp_enqueue_scripts', 'custom_post_types_enqueue_scripts', 11);