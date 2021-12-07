<?php 




add_action('rest_api_init','universityRegisterSearch');


function universityRegisterSearch(){

    register_rest_route( 'university/v1', 'search', array(
        'methods'           =>WP_REST_SERVER::READABLE,
        'callback'          =>'universitySearchResults'
    ) );
}


function universitySearchResults($data){


    $porfessors = new WP_Query(array(
        'post_type'         =>'professor',
        's'                 =>sanitize_term_field( $data['term'] )
    ));

    $porfessorResults = array();

    while($porfessors->have_posts()){
        $porfessors->the_post();
        array_push($porfessorResults, array(
            'title'         => get_the_title(),
            'permalink'     =>get_the_permalink()
        ));

    }
    return $porfessorResults;
}