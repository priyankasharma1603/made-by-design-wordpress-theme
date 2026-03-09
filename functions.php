<?php

function theme_setup(){

register_nav_menus(array(
'primary_menu' => 'Primary Menu'
));

add_theme_support('post-thumbnails');

}

add_action('after_setup_theme','theme_setup');


function theme_assets(){

wp_enqueue_style('main-style', get_stylesheet_uri());

wp_enqueue_script(
'slider-js',
get_template_directory_uri().'/assets/js/slider.js',
array(),
false,
true
);

}

add_action('wp_enqueue_scripts','theme_assets');


/* SLIDER POST TYPE */

function create_slider_post(){

register_post_type('slider', array(
'labels'=>array(
'name'=>'Slides',
'singular_name'=>'Slide'
),
'public'=>true,
'supports'=>array('title','editor','thumbnail'),
'menu_icon'=>'dashicons-images-alt2'
));

}

add_action('init','create_slider_post');


/* PRODUCT POST TYPE */

function create_product_post(){

register_post_type('product', array(
'labels'=>array(
'name'=>'Products',
'singular_name'=>'Product'
),
'public'=>true,
'supports'=>array('title','editor','thumbnail'),
'menu_icon'=>'dashicons-cart'
));

}

add_action('init','create_product_post');


/* SLIDER BUTTON FIELDS */

function slider_custom_fields(){

add_meta_box(
'slider_button',
'Slider Button',
'slider_button_callback',
'slider',
'normal',
'high'
);

}

add_action('add_meta_boxes','slider_custom_fields');


function slider_button_callback($post){

$button_text = get_post_meta($post->ID,'button_text',true);
$button_link = get_post_meta($post->ID,'button_link',true);

?>

<p>
<label>Button Text</label>
<input type="text" name="button_text" value="<?php echo $button_text; ?>" style="width:100%;" />
</p>

<p>
<label>Button Link</label>
<input type="text" name="button_link" value="<?php echo $button_link; ?>" style="width:100%;" />
</p>

<?php
}

function save_slider_fields($post_id){

if(isset($_POST['button_text'])){
update_post_meta($post_id,'button_text',$_POST['button_text']);
}

if(isset($_POST['button_link'])){
update_post_meta($post_id,'button_link',$_POST['button_link']);
}

}

add_action('save_post','save_slider_fields');

/* PRODUCT BUTTON FIELDS */

function product_button_fields(){

add_meta_box(
'product_button',
'Product Button',
'product_button_callback',
'product',
'normal',
'high'
);

}

add_action('add_meta_boxes','product_button_fields');


function product_button_callback($post){

$button_text = get_post_meta($post->ID,'product_button_text',true);
$button_link = get_post_meta($post->ID,'product_button_link',true);

?>

<p>
<label>Button Text</label>
<input type="text" name="product_button_text"
value="<?php echo $button_text; ?>"
style="width:100%;" />
</p>

<p>
<label>Button Link</label>
<input type="text" name="product_button_link"
value="<?php echo $button_link; ?>"
style="width:100%;" />
</p>

<?php
}


function save_product_button_fields($post_id){

if(isset($_POST['product_button_text'])){
update_post_meta($post_id,'product_button_text',$_POST['product_button_text']);
}

if(isset($_POST['product_button_link'])){
update_post_meta($post_id,'product_button_link',$_POST['product_button_link']);
}

}

add_action('save_post','save_product_button_fields');