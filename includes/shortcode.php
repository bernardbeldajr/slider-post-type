<?php
add_shortcode('slider_post_type_shortcode', 'show_custom_post_type');
function show_custom_post_type($atts) {
    ob_start();
    $post_id = $atts['id'];
    $args = array( 'post_type' => 'slider_post_type' , 'p' => $post_id );
    $the_query = new WP_Query( $args ); 
    
    while ( $the_query->have_posts() ) { $the_query->the_post();
  ?>
  <div class="slider-post-type">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="slider-recent-subheading">
            <h6>
            <?php 
              $subhead = !empty(carbon_get_the_post_meta('custom_slider_subhead')) ? carbon_get_the_post_meta('custom_slider_subhead') : "Default Subheading";
            ?>
            <?php echo $subhead; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
  
<?php

    wp_reset_postdata();
    $content = ob_get_clean();
    return $content;
}


function crunchify_reorder_columns($columns) {
    $crunchify_columns = array();
    $title = 'author'; 
    foreach($columns as $key => $value) {
      if ($key==$title){
          $crunchify_columns['slider_post_type_shortcode'] = '';   // Move date column before title column
          $crunchify_columns['date'] = '';   // Move date column before title column
        // $crunchify_columns['author'] = '';   // Move author column before title column
      }
        $crunchify_columns[$key] = $value;
    }
    return $crunchify_columns;
  }
  add_filter('manage_posts_columns', 'crunchify_reorder_columns');

add_filter( 'manage_slider_post_type_posts_columns', 'set_custom_edit_slider_post_type_columns' );
function set_custom_edit_slider_post_type_columns($columns) {
    $columns['slider_post_type_shortcode'] = __( 'Shortcode');

    return $columns;
}
// Add the data to the custom columns for the slider_post_type post type:
add_action( 'manage_slider_post_type_posts_custom_column' , 'custom_slider_post_type_column', 10, 2 );
function custom_slider_post_type_column( $column, $post_id ) {
    switch ( $column ) {
        
        case 'slider_post_type_shortcode' :
            $shortcode_name = 'slider_post_type_shortcode';
            echo '['.$shortcode_name.' id="'.$post_id.'"]';
            break;
        default : 
            echo $column;
        break;
    }
}



