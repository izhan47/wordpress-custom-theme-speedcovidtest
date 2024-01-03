<?php

/********** ENQUEU STYLES **********/
function wpdocs_theme_name_scripts()
{
   wp_enqueue_style('css-fa', 'https://use.fontawesome.com/releases/v5.15.3/css/all.css', false, '1.1', 'all');
   wp_enqueue_style('css-main', get_template_directory_uri() . '/css/style.css', false, '1.14', 'all');
   wp_enqueue_style('css-extra', get_template_directory_uri() . '/style.css', false, '1.0', 'all');

   wp_enqueue_script('js-vendors', get_template_directory_uri() . '/js/vendors.js', false, '1.1', 'all');
   wp_enqueue_script('js-app', get_template_directory_uri() . '/js/app.js', false, '2.03', 'all');
   wp_enqueue_script('js-fa', 'https://use.fontawesome.com/releases/v5.15.3/js/all.js', false, '1.1', 'all');
   wp_enqueue_script('js-gmaps', 'https://maps.googleapis.com/maps/api/js?key=#&libraries=&v=weekly', false, '1.1', 'all');
   
   if (isset($_GET['footer_test'])) {
      wp_enqueue_script('js-footer-common',get_template_directory_uri().'/js/footer-common.js',['jquery'],null,true);
   }
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

/********** THUMBNAIL SUPPORT AND SIZES **********/
if (function_exists('add_theme_support')) {

   add_theme_support('post-thumbnails');
   set_post_thumbnail_size(150, 150, true);

   add_image_size('hero-home', 2000, 1200);
}

/********** ADD HTML 5 SUPPORT WHICH REMOVES SOME ERRORS OF THE W3CVALIDATOR **********/
add_action(
   'after_setup_theme',
   function () {
      add_theme_support('html5', ['script', 'style']);
   }
);

/********** REGISTER NAVIGATIONS **********/
if (!function_exists('mytheme_register_nav_menu')) {

   function mytheme_register_nav_menu()
   {
      register_nav_menus(array(
         'header_menu' => __('Header Menu', 'text_domain'),
      ));
   }
   add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);
}

/********** ACF OPTION PAGES **********/
if (function_exists('acf_add_options_page')) {

   acf_add_options_page('Header');
   acf_add_options_page('Elementen');
}

function cptui_register_my_cpts()
{

   /**
    * Post Type: Testen.
    */

   $labels = [
      "name" => __("Testen", "astra"),
      "singular_name" => __("Test", "astra"),
      "add_new" => __("Nieuwe test", "astra"),
      "new_item" => __("Nieuwe testen", "astra"),
   ];

   $args = [
      "label" => __("Testen", "astra"),
      "labels" => $labels,
      "description" => "Testen worden in de productblokken getoond",
      "public" => true,
      "publicly_queryable" => false,
      "show_ui" => true,
      "show_in_rest" => false,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => false,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => ["slug" => "partners", "with_front" => true],
      "query_var" => true,
      "menu_icon" => "dashicons-heart",
      "supports" => ["title"],
      "show_in_graphql" => false,
   ];

   register_post_type("testen", $args);

   /**
    * Post Type: Veelgestelde vragen.
    */

   $labels = [
      "name" => __("Veelgestelde vragen", "astra"),
      "singular_name" => __("Veelgestelde vraag", "astra"),
      "add_new" => __("Nieuwe vraag", "astra"),
   ];

   $args = [
      "label" => __("Veelgestelde vragen", "astra"),
      "labels" => $labels,
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => ["slug" => "veelgestelde-vragen", "with_front" => true],
      "query_var" => true,
      "menu_icon" => "dashicons-info",
      "supports" => ["title", "editor", "thumbnail"],
      "show_in_graphql" => false,
   ];

   register_post_type("veelgestelde-vragen", $args);

   /**
    * Post Type: Locaties.
    */

   $labels = [
      "name" => __("Locaties", "astra"),
      "singular_name" => __("Locatie", "astra"),
      "add_new" => __("Nieuwe locatie", "astra"),
   ];

   $args = [
      "label" => __("Locaties", "astra"),
      "labels" => $labels,
      "description" => "Deze locatie informatie is niet een onderdeel van de reserveringen, maar wordt alleen gebruikt voor het weergeven van locatie informatie op de website.",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => ["slug" => "locaties", "with_front" => true],
      "query_var" => true,
      "menu_icon" => "dashicons-location",
      "supports" => ["title", "thumbnail", "excerpt"],
      "show_in_graphql" => false,
   ];

   register_post_type("locaties", $args);

   /**
    * Post Type: Landen.
    */

   $labels = [
      "name" => __("Landen", "astra"),
      "singular_name" => __("Land", "astra"),
      "add_new" => __("Nieuw land toevoegen", "astra"),
      "new_item" => __("Nieuw land", "astra"),
   ];

   $args = [
      "label" => __("Landen", "astra"),
      "labels" => $labels,
      "description" => "Specifieke instellingen voor landen, voor bijvoorbeeld PCR vereisten",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => ["slug" => "landen", "with_front" => true],
      "query_var" => true,
      "menu_icon" => "dashicons-flag",
      "supports" => ["title"],
      "show_in_graphql" => false,
   ];

   register_post_type("landen", $args);

   /**
    * Post Type: Partners.
    */

   $labels = [
      "name" => __("Partners", "astra"),
      "singular_name" => __("Partner", "astra"),
      "add_new" => __("Nieuwe partner", "astra"),
      "new_item" => __("Nieuwe partner", "astra"),
   ];

   $args = [
      "label" => __("Partners", "astra"),
      "labels" => $labels,
      "description" => "Partner logos worden op de website in een ticker getoond",
      "public" => true,
      "publicly_queryable" => false,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => ["slug" => "partners", "with_front" => true],
      "query_var" => true,
      "menu_icon" => "dashicons-businessman",
      "supports" => ["title", "editor", "thumbnail"],
      "show_in_graphql" => false,
   ];

   register_post_type("partners", $args);

   /**
    * Post Type: Vacatures.
    */

   $labels = [
      "name" => __("Vacatures", "astra"),
      "singular_name" => __("Vacature", "astra"),
      "add_new" => __("Nieuwe Vacature", "astra"),
      "new_item" => __("Nieuwe Vacature", "astra"),
   ];

   $args = [
      "label" => __("Vacatures", "astra"),
      "labels" => $labels,
      "description" => "Vacatures voor op de website",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      'has_archive' => 'vacatures',
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => ["slug" => "vacature", "with_front" => true],
      "query_var" => true,
      "menu_icon" => "dashicons-hammer",
      "supports" => ["title", "editor", "thumbnail"],
      "show_in_graphql" => false,
   ];

   register_post_type("vacatures", $args);
}

add_action('init', 'cptui_register_my_cpts');



// This function calls a WP_Query to get all pages from the locaties post type
// We only return the ID because we need to get all the information via ACF anyway.
// This way we don't request more information then needed, hence saving some server capacity
function get_locaties($count)
{
   $args = array(
      'post_type'        => 'locaties',
      'post_status'      => 'publish',
      'posts_per_page'   => $count,
      'no_found_rows'    => true,
      'fields'           => 'ids',
      'suppress_filters' => false,
      'meta_key'          => 'plaats',
      'orderby'          => 'meta_value',
      'order'             => 'ASC'
   );

   $query = new WP_Query($args);

   return $query->posts;
}

// Hook to add a class via wp_nav_menu on the a tags
function add_menu_link_class($atts, $item, $args)
{
   if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
   }
   return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// Pagination function
function posts_pagination()
{
   global $wp_query;
   echo paginate_links();
}

// CTA Shortcode
function cta($attr)
{

   $args = shortcode_atts(array(
      // Default values here
      'url' => '#',
      'text' => ' '
   ), $attr);

   return "<a href='" . $args['url'] . "' class='btn-default'>" . $args['text'] . "</a>";
}

add_shortcode('cta', 'cta');

/**
 * Clean WP-admin Dashboard
 */
function remove_dashboard_meta()
{
   remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
   remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
   remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
   remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
   remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
   remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
   remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
   remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
   remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
   remove_meta_box('e-dashboard-overview', 'dashboard', 'normal'); //Removes the Elementor overview
}
add_action('admin_init', 'remove_dashboard_meta');

/**
 * Redirects
 */

function new_site_redirects()
{
   $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

   $loc_post_code = false;

   if ($url[0] === 'afspraak-maken' || $url[1] === 'make-an-appointment') {
      if (isset($_GET['service_id'])) {
         header("HTTP/1.1 301 Moved Permanently");
         header("Location: https://booking.speedcovidtest.nl?ProductType=" . $_GET['service_id']);
         header("Connection: close");
      }

      if (isset($_GET['loc_id'])) {
         $locations = get_posts([
            'post_type'      => 'locaties',
            'posts_per_page' => -1,
            'order'          => 'ASC',
            'orderby'        => 'title',
         ]);

         $locations_list = [];

         if (is_array($locations)) {
            foreach ($locations as $location) {
               $postcode  = get_field('postcode', $location->ID);
               $bookly_id = get_field('bookly_id', $location->ID);
               if ($postcode) {
                  $locations_list[$bookly_id] = $postcode;
               }
            }
         }

         $loc_post_code = isset($locations_list[intval($_GET['loc_id'])]) ? $locations_list[intval($_GET['loc_id'])] : false;

         if ($loc_post_code) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: https://booking.speedcovidtest.nl?TestLocationPostalCode=" . str_replace(' ', '', $loc_post_code));
            header("Connection: close");
         }
      }

      if ($loc_post_code === false and !isset($_GET['service_id'])) {
         header("HTTP/1.1 301 Moved Permanently");
         header("Location: https://booking.speedcovidtest.nl");
         header("Connection: close");
      }
   }
}

add_action('after_setup_theme', 'new_site_redirects');

/**
 * Add wiki / instruction dashboard widget: Xolution info 
 */
function your_dashboard_widget()
{ ?>
   <p>Onderstaande plugins worden door Xolution gebruikt, <strong>niet</strong> verwijderen.</p>
   <p>mainwp-child (update management)</p>
   <p>wp-simple-firewall (beveiliging)</p>
   <p>wp-time-capsule (backups)</p>
<?php };
function add_your_dashboard_widget()
{
   wp_add_dashboard_widget('your_dashboard_widget', __('Xolution'), 'your_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_your_dashboard_widget');


function getPartners($count = -1)
{
   $args = array(
      'post_type'        => 'partners',
      'post_status'      => 'publish',
      'posts_per_page'   => $count,
      'no_found_rows'    => true,
      'fields'           => 'ids',
   );

   $query = new WP_Query($args);

   return $query->posts;
}


/* Change the default path of the plugin which manages the previews for the ACF flexible content fields */
add_filter('acf-flexible-content-preview.images_path', 'get_acf_preview_path');

function get_acf_preview_path()
{
   return 'acf-flexible-content-images';
}

add_filter('acf/format_value/type=wysiwyg', 'gc_content_filter', 10, 3);

function gc_content_filter($value, $post_id, $field)
{
   if (defined('ICL_LANGUAGE_CODE')) {
      if (ICL_LANGUAGE_CODE == "nl") {
         $value = apply_filters('the_content', $value);
      }
   }
   return $value;
}
// add_action('init','gc_content_filter_remove');
// function gc_content_filter_remove(){
// 	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
// 	   if(ICL_LANGUAGE_CODE != "nl"){
// 		   remove_filter( 'the_content', 'add_data_attribute', 0 );
// 		 }
// 	} 
// }

/* Snippet seeks to remove the remaining warnings when validating HTML on w3c.org:
   Warning: The type attribute is unnecessary for JavaScript resources.
   Warning: The type attribute for the style element is not needed and should be omitted.
*/

add_action('template_redirect', function () {
   ob_start(function ($buffer) {
      $buffer = str_replace(array(' type="text/css"', " type='text/css'"), '', $buffer);
      $buffer = str_replace(array(' type="text/javascript"', " type='text/javascript'"), '', $buffer);
      return $buffer;
   });
});
function create_nonce_for_inline_script(){
   $nonce = wp_create_nonce();
   return $nonce;
}
add_filter('script_loader_tag', 'add_nonce_to_specific_scripts', 10, 3);
function add_nonce_to_specific_scripts($tag, $handle, $src) {
   if( $handle == 'wp-i18n' || $handle == 'wp-a11y' || $handle == 'daim-track-internal-links' ){
      $nonce = create_nonce_for_inline_script();
      return str_replace('<script', '<script nonce="'.$nonce.'" ', $tag);
   }
}
add_filter('script_loader_attrs','add_nonce_script');
function add_nonce_script( $attrs ){
   $attrs = array('async' => 'async', 'charset' => 'utf8');
   return $attrs;
}
function add_nonce_to_inline_script(  $attr ){
   if ( ! isset( $attr['nonce'] ) ) {
      $nonce = create_nonce_for_inline_script();
		$attr['nonce'] = $nonce;
	}
   return  $attr;
}
add_filter( 'wp_inline_script_attributes', 'add_nonce_to_inline_script' );

$attrs = array( 'id' => 'gform_gravityforms-js-extra' );
$attrss = apply_filters( 'script_loader_attrs', $attrs );
// var_dump($attrss);

$string = wp_get_script_tag( $attrs );
// var_dump($string);

$string2 = apply_filters( 'wp_script_attributes', $attrs );
// var_dump($string2);

// $nonce = wp_create_nonce('inlinescript');
// $attr['nonce'] = $nonce;
// apply_filters( 'wp_inline_script_attributes', $attr, $javascript );
?>