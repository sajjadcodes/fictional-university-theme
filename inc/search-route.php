<?php 

add_action('rest_api_init','universityRegisterSearch');
function universityRegisterSearch(){
    register_rest_route( 'university/v1', 'search', array(
        'methods'           =>WP_REST_SERVER::READABLE,
        'callback'          =>'universitySearchResults'
    ) );
}


function universitySearchResults($data){

    // return "Congratulation API Route is working";

    // return array('red', 'orange','yellow');

    // return array(
    //     'name'  => "university",
    //     "id"    => 21
    // );
  
    $mainQuery = new WP_Query(array(
        'post_type'         =>array('post', 'page','professar','event','program','campus'),
        's'                 =>$data['term'] 
    ));

    // return $mainQuery->posts;

    // $postResults = array();


    // while($mainQuery->have_posts()){
    //     $mainQuery->the_post();
    //     array_push($postResults, array(
    //         'title'           => get_the_title(),
    //         'permalink'       => get_the_permalink()  
    //     ));
     

    // }
    // return $postResults;

    $results = array(
        'generalInfo'       =>array(),
        'professors'        =>array(),
        'programs'          =>array(),
        'Events'            =>array(),
        'campuses'          =>array()

    );

    while($mainQuery->have_posts()){
        $mainQuery->the_post();
       if(get_post_type()=='post' OR get_post_type() == 'page'){

                array_push($results['campuses'], array(
                    'title'         => get_the_title(),
                    'permalink'     =>get_the_permalink(),
                    'PostType'      => get_post_type()
                ));

       }
       if(get_post_type()=='professor'){

        array_push($results['professors'], array(
            'title'         => get_the_title(),
            'permalink'     =>get_the_permalink()
        ));

        }
        if(get_post_type()=='program'){

            array_push($results['programs'], array(
                'title'         => get_the_title(),
                'permalink'     =>get_the_permalink()
            ));
    
            }
            if(get_post_type()=='Event'){

                array_push($results['Events'], array(
                    'title'         => get_the_title(),
                    'permalink'     =>get_the_permalink()
                ));
        
                }
                if(get_post_type()=='campus'){

                    array_push($results['campuses'], array(
                        'title'         => get_the_title(),
                        'permalink'     =>get_the_permalink()
                    ));
            
                    }
       

    }
    return $results;
}
