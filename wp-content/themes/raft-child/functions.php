<?php
function enqueue_child_theme_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles');

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/svelte-demo-block-one' );
    register_block_type( __DIR__ . '/blocks/svelte-demo-block-two' );
}

// add vite support to frontend AND gutenberg editor
// https://vitejs.dev/guide/backend-integration.html
// https://wpdevelopment.courses/articles/how-to-add-javascript-to-wordpress/
// https://developer.wordpress.org/reference/hooks/enqueue_block_assets/

add_action('wp_head', 'add_vite_development_server'); // frontend
add_action('admin_head', 'add_vite_development_server'); // backend
function add_vite_development_server()
{
    // TODO: check if domain is .ddev.site (=> development)
?>
    <!-- vite development -->
    <script type="module" src="<?php echo get_site_url(); ?>:5173/@vite/client"></script>
    <script type="module" src="<?php echo get_site_url(); ?>:5173/wp-content/themes/raft-child/main.js"></script>
    <!-- eo vite development -->
<?php
};

// This does not work currently because of 
// client.ts:24 Uncaught ReferenceError: __SERVER_HOST__ is not defined at client.ts:24:20
/*function child_theme_block_scripts() {
    wp_enqueue_script( 'vite-client',  get_site_url().':5173/@vite/client' );
    wp_enqueue_script( 'vite-mainjs',   get_site_url().':5173/wp-content/themes/raft-child/main.js' );
}
add_action( 'enqueue_block_assets', 'child_theme_block_scripts' );

// IMPORTANT: add type=module to vite client
// https://stackoverflow.com/a/59594789/809939
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);
function add_type_attribute($tag, $handle, $src)
{
    // if not your script, do nothing and return original $tag
    if ('vite-client' !== $handle && 'vite-mainjs' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}
*/ 


// TODO: for production we should read from manifest.json, see: https://vitejs.dev/guide/backend-integration.html
// TODO: is it easier to use just one file instead of splitted entries?
// <!-- vite production build -->
// <script type="module" src="<?php echo get_site_url(); ... /wp-content/themes/raft-child/dist/main.js"></script>
// <!-- eo vite production build -->