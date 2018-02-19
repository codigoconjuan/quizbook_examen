<?php
if(! defined('ABSPATH')) exit;


// Agrega una nueva columna
function quizbook_examen_columna_nueva($defaults) {
    $defaults['shortcode'] = 'Shortcode';
    return $defaults;
}
add_filter('manage_examenes_posts_columns', 'quizbook_examen_columna_nueva');

// Valor a mostrar
function quizbook_examen_mostrar_shortcode_columna( $columna ) {
    if($columna === 'shortcode') {
        $examen_id = get_the_ID();
        echo "[quizbook_examen preguntas='' orden='' id='$examen_id']";
    }
}
add_action('manage_examenes_posts_custom_column', 'quizbook_examen_mostrar_shortcode_columna', 5, 1);