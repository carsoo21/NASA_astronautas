<?php 
/*
* Plugin Name: NASA Astronautas
 * Plugin URI: 
 * Description: Plugins para captar datos de posibles astronautas para el 2022,
 * Version: 1.0
 * Author: Camilo Rubio
 * Author URI: https://www.camilorubio.info
 * Text Domain: NASA Astronautas
 *
 * @package NASA

*/

defined( 'ABSPATH' ) || exit;

require_once("inc/helpers.php");

// Variables / Constantes

define( 'NASA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NASA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'NASA_API_BASE_URL', plugin_dir_url( __FILE__ ) );

define( 'THEME_BASEPATH', get_template_directory());

require_once("inc/enqueue.php");

// Creo la DB 
function nasa_activation()
{
  global $wpdb;
  $tabla_candidatos = $wpdb->prefix . 'nasa_candidatos';
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE $tabla_candidatos (
      Nombre VARCHAR(90) NOT NULL,
      Edad INT(99) NOT NULL,
      Sexo VARCHAR(50) NOT NULL,
      Email VARCHAR(90) NOT NULL,
      Motivo TEXT(350) NOT NULL,
      Contacto TEXT(250) NOT NULL
      )$charset_collate";
  $wpdb->get_results($sql);  

  // Crea las paginas que necesita
  create_pages();
   
} 

// Borro la DB 
function nasa_deactivation()
{
  global $wpdb;
  $sql = 'DROP TABLE '.$wpdb->prefix.'nasa_candidatos;';
  $wpdb->get_results($sql);
}

register_activation_hook(__FILE__, 'nasa_activation');
register_deactivation_hook(__FILE__, 'nasa_deactivation');


function nasa_menu(){
  add_menu_page('NASA', 'NASA Clientes', '', 'nasa_ajustes', 'nasa_configuraciones', '', '50');
  add_submenu_page('nasa_ajustes', 'Plugins', 'Configuraciones', 'administrator', 'configuraciones', 'nasa_configuraciones');  
  add_submenu_page('nasa_ajustes', 'Plugins', 'Reporte', 'administrator', 'reportes', 'nasa_reporte');

  //Llamar a registro de las opciones y wp_ajax_set_post_thumbnail
  add_action('admin_init', 'nasa_resgistrar_ajustes');
}
add_action('admin_menu', 'nasa_menu');

function nasa_resgistrar_ajustes(){
  //Campos de configuracion
  register_setting('nasa_coniguracion_grupo', 'nasa_texto');
  register_setting('nasa_coniguracion_grupo', 'nasa_mensajeAgradecimiento');
}

function nasa_configuraciones(){                                
  require_once(dirname(__FILE__) . '/inc/configuraciones.php');                        
}

require_once(dirname(__FILE__) . '/inc/reportes.php');

//llamada de shortcode

add_shortcode('formulario-candidatos', 'nasa_formulario_candidatos');
add_shortcode('mensaje', 'nasa_mensaje_agradecimiento');
require_once('template/formulario.php');
require_once('template/mensaje.php');


?>