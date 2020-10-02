<?php

// Carbon_Fields\Carbon_Fields::boot();
use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'post_meta', 'Home Page Components' )
    ->where( 'post_type', '=', 'slider_post_type' )
    ->add_tab('CUSTOMS TABS', array(
        Field::make('text', 'custom_slider_heading', 'Heading')->set_width(33),
        Field::make('text', 'custom_slider_subhead', 'Subheading')->set_width(33),
        Field::make('rich_text', 'custom_slider_content', 'Content')->set_width(100),
        Field::make( 'complex', 'custom_slider_items', __( 'Items' ) )->set_layout('tabbed-horizontal')
        ->add_fields( array(
            Field::make('image', 'custom_slider_items_image', 'Background Image')->set_width(33)->set_value_type('url'),
            Field::make('text', 'custom_slider_items_heading', 'Heading')->set_width(33),
            Field::make('text', 'custom_slider_items_subhead', 'Subheading')->set_width(33),
            Field::make('rich_text', 'custom_slider_items_content', 'Content')->set_width(100),
        ))
    ));
}