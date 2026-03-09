<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="site-header">

<div class="container header-inner">

<!-- Logo -->

<div class="logo">
<a href="<?php echo home_url(); ?>">
<span class="logo-highlight">Made</span>ByDesign
</a>
</div>


<!-- Navigation -->

<nav class="main-nav">

<?php
wp_nav_menu(array(
'theme_location' => 'primary_menu',
'menu_class' => 'nav-menu',
'container' => false
));
?>

</nav>

</div>

</header>