<section class="products container">

<?php

$args = array(
'post_type'=>'product',
'posts_per_page'=>6
);

$query = new WP_Query($args);

while($query->have_posts()) : $query->the_post();

?>

<div class="product-card">

<?php the_post_thumbnail(); ?>

<h3><?php the_title(); ?></h3>

<p><?php the_excerpt(); ?></p>

<a href="<?php the_permalink(); ?>">View Product</a>

</div>

<?php endwhile; wp_reset_postdata(); ?>

</section>