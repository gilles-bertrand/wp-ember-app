<?php
/**
 * Plugin Name page template (for React app)
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

   <meta name="wp-ember-plugin/config/environment" content="%7B%22modulePrefix%22%3A%22wp-ember-plugin%22%2C%22environment%22%3A%22production%22%2C%22rootURL%22%3A%22/ember-app-page/%22%2C%22locationType%22%3A%22auto%22%2C%22EmberENV%22%3A%7B%22FEATURES%22%3A%7B%7D%2C%22EXTEND_PROTOTYPES%22%3A%7B%22Date%22%3Afalse%7D%7D%2C%22APP%22%3A%7B%22name%22%3A%22wp-ember-plugin%22%2C%22version%22%3A%220.0.0+80533764%22%7D%2C%22exportApplicationGlobal%22%3Afalse%7D" />



 	<?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
 </body>

<?php get_footer(); ?>