<?php
/**
 * Plugin Name page template (for Ember app)
 *
 * @since    1.0.0
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head>
 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<meta name="mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
<?php  do_action('getMetaEmber'); ?>
<base href="/ember-app-page">
 	<?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
 </body>

<?php get_footer(); ?>