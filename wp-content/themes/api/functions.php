<?php
add_action( 'wp_enqueue_scripts', 'criacaoparaweb_enqueue' );
function criacaoparaweb_enqueue() {
    /* Styles */
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    /* Scripts */
    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/39abee1600.js' );
    wp_enqueue_script( 'masonry' );
}

function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    if($var) {
    	return $var;
    } else {
    	echo 'teste';
    }
}

?>