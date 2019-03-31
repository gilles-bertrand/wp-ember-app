<?php
/**
 * @package Ember_app
 * @version 0.0.1
 */
/*
Plugin Name: Ember app
Plugin URI: http://wordpress.org/plugins/ember-app/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Gilles Bertrand
Version: 0.0.1
Author URI: http://www.triptyk.eu/
*/

/**
 * Public function find ember environement html and place it in our template
 */
function setMetaEmber()
{
    $metas = get_meta_tags(plugin_dir_path( __FILE__ ) . '/ember-apps/dist/index.html');
    foreach ($metas as $meta => $value) {
        if (strpos($meta, 'config/environment') !== false) {
            ?>
            <meta name="<?php echo $meta; ?>" content="<?php echo $value;?>" />
                <?php
        }
    }

}
function ember_app($atts, $content = null)
{
    global $post;
    if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'ember')) {
        $assetFiles = scandir(plugin_dir_path( __FILE__ )  . '/ember-apps/dist/assets/');
        $files = '';
        foreach ($assetFiles as $file_name) {
            if (strpos($file_name, '.js')) {
                wp_enqueue_script('ember-app-' . $file_name, plugins_url( 'ember-apps/dist/assets/' . $file_name, __FILE__), 1.0, true);
            }
            if (strpos($file_name, '.css')) {
                wp_enqueue_style('ember-app-' . $file_name, plugins_url( 'ember-apps/dist/assets/' . $file_name, __FILE__), 1.0, true);
            }
        }
    }
    extract(shortcode_atts(
        array(
            'url' => '',
            'language' => '',
        ), $atts)
    );
    $slug = basename(get_permalink());
    add_rewrite_rule($slug . '/?([^/]*)', 'index.php?pagename=' . $slug, 'top');
    flush_rewrite_rules();
    // add_action('wp_enqueue-styles', 'enqueue_ember_styles');
    return '<base href="/'.$slug.'"><div id="ember-app" data-locale="'.$language.'"></div>';
}

add_shortcode('ember', 'ember_app');
add_action( 'wp_head', 'setMetaEmber' );