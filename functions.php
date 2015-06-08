<?php
/* Ajouts d'un menu dans l'Admin
-------------------------------*/
require 'wp-infinite/index.php';

/* Image à la Une
-------------------------------*/
add_theme_support('post-thumbnails');

add_image_size( 'home-post-thumb-1', 865, 300, true ); // (cropped)
add_image_size( 'home-post-thumb-2', 425, 225, true ); // (cropped)
add_image_size( 'post-thumb-1', 865, 432, true ); // (cropped)

/* Sidebar (Widgets)
-------------------------------*/
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => __( 'Menu', 'theme-slug' ),
        'id' => 'sidebar-1',
        'before_widget' => '<div id="" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="section">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __( 'Footer', 'theme-slug' ),
        'id' => 'sidebar-2',
        'before_widget' => '<div id="" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="section">',
        'after_title' => '</h4>',
    ));

/* Menu de navigation mobile
-------------------------------*/
function lbdf_register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu' )
    )
  );
}
add_action( 'init', 'lbdf_register_my_menus' ); 


/* Résumé des articles
-------------------------------*/
function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/* Ajouts de dimensions d'images (Admin)
-------------------------------*/
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post-img-thumb', 800, 424, true ); // (cropped)
 // on vérifie que la fonction existe, puis on crée la nouvelle taille d'image. Le dernier paramètre à true indique qu'il faut rogner l'image pour qu'elle s'adapte aux dimensions
}

add_filter('image_size_names_choose', 'my_image_sizes'); // le filtre qui permet d'ajouter la nouvelle taille au gestionnaire de médias
function my_image_sizes($sizes) {
	$addsizes = array(
		"post-img-thumb" => __( "Image Article") // on indique ici le nom de la nouvelle image (défini dans add_image_size), et le texte qui doit apparaître pour la sélection
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}


/* Pagination des articles
-------------------------------*/
if( !function_exists( 'theme_pagination' ) ) {
    function theme_pagination() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
    'base' => @add_query_arg('page','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'show_all' => false,
    'end_size' => 1,
    'mid_size' => 2,
    'type' => 'list',
    'next_text' => 'Suivant »',
    'prev_text' => '« Précédent'
    );
    if( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if( !empty($wp_query->query_vars['s']) )
    $pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );
    echo str_replace('page/1/','', paginate_links( $pagination ) );
    }	
    }

/* Nouveau Style TinyMCE
-------------------------------*/
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');
function my_mce_before_init_insert_formats( $init_array ) { 
	$style_formats = array(  
		array(  
			'title' => 'Chapeau',  
			'block' => 'span',  
			'classes' => 'chapeau',
			'wrapper' => true,
		),
	);  
	$init_array['style_formats'] = json_encode( $style_formats );  
	return $init_array;  
}  
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

/* Color Picker
-------------------------------*/
add_action( 'admin_enqueue_scripts', 'my_color_picker' );
function my_color_picker() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' ); 
}

/* CSS Dynamique
-------------------------------*/
add_filter('query_vars', 'add_new_var_to_wp');
function add_new_var_to_wp($public_query_vars) {
    $public_query_vars[] = 'infinite-option';
    return $public_query_vars;
}
add_action('template_redirect', 'my_theme_css_display');
function my_theme_css_display(){
    $css = get_query_var('infinite-option');
    if ($css == 'css'){
        include_once (TEMPLATEPATH . '/css/infinite-option.php');
        exit;
    }
}

/* Uplaoder image
-------------------------------*/
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
}

function my_admin_styles() {
wp_enqueue_style('thickbox');
}
 
if (isset($_GET['page'])) {
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
}
