<?php 
// Añade los caps al activar
function quizbook_examen_agregar_capabilities() {

    $roles = array( 'administrator', 'editor', 'quizbook' );

    foreach( $roles as $the_role ) {
        $role = get_role( $the_role );
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_examenes' );
        $role->add_cap( 'publish_examenes' );
        $role->add_cap( 'edit_published_examenes' );
        $role->add_cap( 'edit_others_examenes' );
    }

    $manager_roles = array( 'administrator', 'editor' );

    foreach( $manager_roles as $the_role ) {
        $role = get_role( $the_role );
        $role->add_cap( 'read_private_examenes' );
        $role->add_cap( 'edit_others_examenes' );
        $role->add_cap( 'edit_private_examenes' );
        $role->add_cap( 'delete_examenes' );
        $role->add_cap( 'delete_published_examenes' );
        $role->add_cap( 'delete_private_examenes' );
        $role->add_cap( 'delete_others_examenes' );
    }

}

/**
    * Remueve los caps al desactivar
    */
function quizbook_examen_remover_capabilities() {

    $manager_roles = array( 'administrator', 'editor' );

    foreach( $manager_roles as $the_role ) {
        $role = get_role( $the_role );
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_examenes' );
        $role->remove_cap( 'publish_examenes' );
        $role->remove_cap( 'edit_published_examenes' );
        $role->remove_cap( 'read_private_examenes' );
        $role->remove_cap( 'edit_others_examenes' );
        $role->remove_cap( 'edit_private_examenes' );
        $role->remove_cap( 'delete_examenes' );
        $role->remove_cap( 'delete_published_examenes' );
        $role->remove_cap( 'delete_private_examenes' );
        $role->remove_cap( 'delete_others_examenes' );
    }

}