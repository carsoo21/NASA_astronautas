<?php
function nasa_plugin_enqueue_frontend(){
  wp_register_style( 'bootstrap', NASA_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), '1.0.0' );
  wp_enqueue_style( 'bootstrap' );

  wp_register_style( 'style_nasa', NASA_PLUGIN_URL . 'assets/css/style-nasa.css', array(), '1.0.1' );
  wp_enqueue_style( 'style_nasa' );
  
  wp_register_script( 'scripts_nasa', NASA_PLUGIN_URL . 'assets/js/plugins.js', array(), '1.0.0', true );
  wp_enqueue_script( 'scripts_nasa' );

  wp_enqueue_media();
  wp_register_script('my_upload', plugin_dir_url( __FILE__ ).'assets/js/upload.js', array('jquery'), '1', true );
  wp_enqueue_script('my_upload');
  
}       
add_action( 'wp_enqueue_scripts', 'nasa_plugin_enqueue_frontend' );

function nasa_admin_style(){              

  wp_register_style( 'admin_style_nasa', NASA_PLUGIN_URL . 'assets/css/admin-style-nasa.css', array(), '1.0.1' );   
     
  wp_enqueue_style( 'admin_style_nasa' );  
  
}
add_action( 'admin_enqueue_scripts', 'nasa_admin_style' );
?>