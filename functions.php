<?php 

function pageBanner($args= NULL){

        if(!$args['title']){
                $args['title'] = get_the_title();
        }
        if(!$args['subtitle']){
            $args['subtitle'] = get_field('page_subtitle');
        }
        if(!$args['photo']){
            if(get_field('page_banner_background') AND !is_archive()){
                
                $args['photo']  = get_field('page_banner_background')['sizes']['pageBanner'];

            }
            else{
                $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
            }

        }
    ?>


        <div class="page-banner"> 
            
            <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'];?>)"></div>
                <div class="page-banner__content container container--narrow">
                    <h1 class="page-banner__title">
                        <?php 
                            echo $args['title'];
                        ?>
                    </h1>
                    <div class="page-banner__intro">
                    <p> <?php 
                    // the_field('page_subtitle');
                    echo $args['subtitle'];

                    ?></p>
                    </div>
                </div>
        </div>
<?php 
}


function university_files(){

    // scripts
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'),array('jquery'),'1.0', true);
    // styles
    wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom-google-font','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('university_main_style', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}


function university_features(){

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260,true);
    add_image_size('professorPortrait', 480,650, true);
    add_image_size('pageBanner', 1500,350, true);

    // registering nav menu

    register_nav_menu('headerMenuLocation','Header Menu Location');
    register_nav_menu('footerLocationOne','Footer Menu One');
    register_nav_menu('footerLocationTwo','Footer Menu Two');
}




function university_adjust_queries($query){

    if(!is_admin() AND is_post_type_archive( 'program' ) AND is_main_query()){

            $query->set('orderby', 'title');
            $query->set('order', 'ASC' );
            $query->set('order', 'ASC' );
            $query->set('posts_per_page', -1);
    }

            $today = date('Ymd');
            if(!is_admin() && is_post_type_archive( 'event' ) && $query->is_main_query()){

                // $query->set('posts_per_page','2');
                $query->set('meta_key','event_date');
                $query->set('orderby','met_value_num');
                $query->set('order', 'ASC');
                $query->set('meta_query',array(
                    array(
                      'key'           =>'event_date',
                      'compare'       =>'>=',
                      'value'         =>$today,
                      'type'          =>'numeric'
                    )
                  ));

            }

}




add_action('pre_get_posts' ,'university_adjust_queries');
add_action('wp_enqueue_scripts','university_files');

add_action('after_setup_theme','university_features');