<?php
if(! defined('ABSPATH')) exit;

/*
* Crea un Shortcode, uso: [quizbook_examen preguntas="" orden="" id=""]
*/
function quizbook_examen_shortcode( $atts ) { 
    // Leer el ID del Shortcode para el examen
    
    $examen_id = (int) $atts['id'];
    
    $preguntas = maybe_unserialize( get_post_meta($examen_id, 'quizbook_examen', true) );

    $args = array(
        'post_type' => 'quizes',
        'posts_per_page' => $atts['preguntas'],
        'orderby' => $atts['orden'],
        'post__in' => $preguntas
    ); 
    $quizbook = new WP_Query($args);
    ?>
    <form name="quizbook_enviar" id="quizbook_enviar">
        <div id="quizbook" class="quizbook">
            <ul>
                <?php while($quizbook->have_posts()): $quizbook->the_post(); ?>
                    <li>
                        <?php the_title('<h2>', '</h2>'); 
                              the_content(); ?>     
                        
                        <?php
                            $opciones = get_post_meta(get_the_ID() );
                            foreach($opciones as $llave => $opcion) {
                                $resultado = quizbook_filtrar_preguntas($llave);

                                if($resultado === 0) { 
                                    $numero = explode('_', $llave);

                                     ?>
                                    <div id="<?php echo get_the_ID() . ":" . $numero[2]; ?>" class="respuesta">
                                        <?php echo $opcion[0]; ?>
                                    </div>
                                <?php }
                            }
                        ?>
                    </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
        <input type="submit" value="Enviar" id="quizbook_btn_submit">
        
        <div id="quizbook_resultado"></div>
    
    </form> <!--form-->
<?php 
}
add_shortcode('quizbook_examen', 'quizbook_examen_shortcode');