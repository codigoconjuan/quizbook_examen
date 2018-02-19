<?php
if(! defined('ABSPATH')) exit;

function quizbook_examen_scripts($hook) {
    global $post;
    
    if($hook = 'post-new.php' || $hook = 'post.php') {
        if('examenes' == $post->post_type ) {
            wp_enqueue_style('chosen', plugins_url('../assets/css/chosen.min.css', __FILE__) );
            wp_enqueue_script('chosenjs', plugins_url('../assets/js/chosen.jquery.min.js', __FILE__), array('jquery'), 1.0, true );  
            wp_enqueue_script('scripts', plugins_url('../assets/js/scripts.js', __FILE__), array(), 1.0, true );  
        }
    }
}
add_action('admin_enqueue_scripts', 'quizbook_examen_scripts');