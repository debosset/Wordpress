<?php
/* Functions by Adrien de Bosset */


// Remove Admin Bar
show_admin_bar(false);

// Class for bootstrap menu
require_once('inc/wp_bootstrap_navwalker.php');

// Thumbmail
add_theme_support('post-thumbnails');
add_image_size('archive-miniature', 400, 300, true); //Thumbail for archives
add_image_size('slider-home', 1200, 500, true);

// Custom title for home  
add_filter('wp_title', 'wpdocs_hack_wp_title_for_home');
add_action('admin_menu', 'remove_menu_pages');

// Remove menu
function remove_menu_pages()
{
    if (!current_user_can('level_10')) {
        remove_menu_page('edit.php?post_type=evenement');
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('tools.php');
        remove_menu_page('upload.php');
    }
}

// Change User menu
add_action('admin_menu', 'my_change_admin_menu');
function my_change_admin_menu()
{
    global $menu;
    $menu[70][0] = 'Boutique';
    $menu[70][6] = 'dashicons-cart';   
}

// Change title home
function wpdocs_hack_wp_title_for_home($title)
{
    if (empty($title) && (is_home() || is_front_page())) {
        $title = __('Exercice', 'home') . ' | ' . get_bloginfo('Pour la home custome');
    }
    return $title;
}

add_action('init', 'postType');
// Custom Post type
function postType()
{
    
    /*
    register_taxonomy('type','offre', array(     
    'label' => 'Boutiques',     
    'labels' => array(     
    'name' => 'Boutiques',     
    'singular_name' => 'Boutique',     
    'all_items' => 'Toutes les boutiques',     
    'edit_item' => 'Éditer la boutique',     
    'view_item' => 'Voir la boutique',     
    'update_item' => 'Mettre à jour la boutique',     
    'add_new_item' => 'Ajouter une boutique',     
    'new_item_name' => 'Nouvelle boutique',     
    'search_items' => 'Rechercher une boutique',     
    'popular_items' => 'Les boutiques les plus utilisées'),   
    'hierarchical' => true   
    ) ); 
    */
    
    /* Post Type Boutique */
    /*
    register_post_type('boutique', array(
    'label' => 'Boutiques',
    'labels' => array(
    'name' => 'Boutiques',
    'singular_name' => 'Boutique',
    'all_items' => 'Toutes les boutiques',
    'add_new_item' => 'Ajouter une boutique',
    'edit_item' => 'Éditer la boutique',
    'new_item' => 'Nouvelle boutique',
    'view_item' => 'Voir la boutique',
    'search_items' => 'Rechercher parmi les boutiques',
    'not_found' => 'Pas de boutique trouvée',
    'not_found_in_trash' => 'Pas de boutique dans la corbeille'
    ),
    'public' => true,
    'capability_type' => 'page',
    'supports' => array(
    'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments', 'author'
    ),
    'has_archive' => true,
    'menu_icon' => 'dashicons-cart',
    'hierarchical' => true,
    )); // End post boutique
    
    
    
    /* Post Type Offre */
    register_post_type('offre', array(
        'label' => 'Offres',
        'labels' => array(
            'name' => 'Offres',
            'singular_name' => 'Offre',
            'all_items' => 'Toutes les offres',
            'add_new_item' => 'Ajouter une offre',
            'edit_item' => 'Éditer l\'offre',
            'new_item' => 'Nouvelle offre',
            'view_item' => 'Voir l\'offre',
            'search_items' => 'Rechercher parmi les offres',
            'not_found' => 'Pas d\'offre trouvée',
            'not_found_in_trash' => 'Pas d\'offre dans la corbeille'
        ),
        'public' => true,
        'capability_type' => 'post',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields',
            'comments',
            'author'
        ),
        'has_archive' => true,
        'menu_icon' => 'dashicons-tickets-alt',
        'hierarchical' => true
    )); // End post offre
    
    
    
    /* Post Type Offre */
    register_post_type('evenement', array(
        'label' => 'Evénements',
        'labels' => array(
            'name' => 'Evénements',
            'singular_name' => 'Evénement',
            'all_items' => 'Toutes les événements',
            'add_new_item' => 'Ajouter un événement',
            'edit_item' => 'Éditer l\'événement',
            'new_item' => 'Nouvel événement',
            'view_item' => 'Voir l\'événement',
            'search_items' => 'Rechercher parmi les événements',
            'not_found' => 'Pas d\'événement trouvée',
            'not_found_in_trash' => 'Pas d\'événement dans la corbeille'
        ),
        'public' => true,
        'capability_type' => 'post',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields',
            'comments',
            'author'
        ),
        'has_archive' => true,
        'menu_icon' => 'dashicons-megaphone',
        'hierarchical' => true
    )); // End post offre
    
    
    
    
}

// Load js for home Menu and slider
function homeMenu()
{
    if (is_home()) {
        wp_enqueue_script('script-name', get_template_directory_uri() . '/js/home.js', array(), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'homeMenu');


// Disabled post from other user
function mypo_parse_query_useronly($wp_query)
{
    if (strpos($_SERVER['REQUEST_URI'], '/wp-admin/edit.php') !== false) {
        if (!current_user_can('level_10')) {
            global $current_user;
            $wp_query->set('author', $current_user->id);
        }
    }
}

add_filter('parse_query', 'mypo_parse_query_useronly');

// Change author slug name to boutique
add_action('init', 'cng_author_base');
function cng_author_base()
{
    global $wp_rewrite;
    $author_slug             = 'boutique'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}


/* Set up Menu */
add_action('after_setup_theme', 'wpt_setup');
if (!function_exists('wpt_setup')):
    function wpt_setup()
    {
        register_nav_menu('primary', __('Primary navigation', 'wptuts'));
    }
endif;