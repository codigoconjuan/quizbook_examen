<?php
/*
 Plugin Name: Quizbook Examenes 
 Plugin URI: 
 Description: Añade la posibilidad de crear examenes para tus Quiz (Addon)
 Version: 1.0
 Author: Juan Pablo De la torre Valdez
 Author URI: 
 License: GPL2
 License URI: https://www.gnu.org/licences/gpl-2.0.html
 Text Domain: quizbook
*/

if(! defined('ABSPATH')) exit;

/*
* Revisa que el Plugin principal exista
*/
function quizbook_examen_revisar() {
    if(!function_exists('quizbook_post_type')) {
        
        add_action('admin_notices', 'quizbook_examen_error_activar');
        
        deactivate_plugins(plugin_basename(__FILE__));
    }
}
add_action('admin_init', 'quizbook_examen_revisar');

/*
* Mensaje de error en caso de no tener el plugin
*/
function quizbook_examen_error_activar() {
    $clase = 'notice notice-error';
    $mensaje = 'Un error ocurrió, necesitas instalar Quiz';
    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($clase), esc_html($mensaje) );
}

/*
* Crea el Post Type de Examenes
*/
require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
register_activation_hook(__FILE__, 'quizbook_examen_rewrite_flush'); 


/*
* Añade Capabilities a quizbook
*/
require_once plugin_dir_path(__FILE__) . 'includes/roles.php';
register_activation_hook(__FILE__, 'quizbook_examen_agregar_capabilities');
register_deactivation_hook(__FILE__, 'quizbook_examen_remover_capabilities');



/*
* Añade Metaboxes a Quizbook Examen
*/
require_once plugin_dir_path(__FILE__) . 'includes/metaboxes.php';

/*
* Añade CSS y JS al Plugin
*/
require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';

/*
* Añade el Shortcode para imprimir Examen por ID
*/
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

/*
* Añade nuevas columnas a la administración de Examenes
*/
require_once plugin_dir_path(__FILE__) . 'includes/columnas.php';





