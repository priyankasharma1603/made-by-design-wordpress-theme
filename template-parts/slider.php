<section class="hero-slider">

<?php

$args = array(
'post_type'=>'slider',
'posts_per_page'=>3
);

$query = new WP_Query($args);

while($query->have_posts()) : $query->the_post();

$button_text = get_post_meta(get_the_ID(),'button_text',true);
$button_link = get_post_meta(get_the_ID(),'button_link',true);

?>

<div class="slide">

<?php the_post_thumbnail(); ?>

<div class="slide-content">

<h2><?php the_title(); ?></h2>

<p><?php the_content(); ?></p>

<a href="<?php echo $button_link; ?>">
<?php echo $button_text; ?>
</a>

</div>

</div>

<?php endwhile; wp_reset_postdata(); ?>

</section>