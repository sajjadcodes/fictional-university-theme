<?php

get_header(); 

while(have_posts()){

    the_post();
    ?>
        <?php pageBanner(); ?>
        <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program');?>"><i class="fa fa-home" aria-hidden="true"></i>All Programs Home</a> <span class="metabox__main"><?php the_title();?></span>
          </p>
        </div>
            <div class="generic-content">
                <?php the_content();?>
            </div>
            <?php 

                    $today = date('Ymd');
                    $relatedProfessors = new WP_Query(array(
                    'posts_per_page'      =>-1,
                    'post_type'           =>'professor',
              
                    'orderby'             =>'title',
                    'order'               =>'ASC',
                    'meta_query'          =>array(
                        array(
                            'key'         =>'related_programs',
                            'compare'     =>'LIKE',
                            'value'       => '"' .get_the_ID() .'"' , //solve serialization problem e.g 1200 consider 12 so we need"12"
                            )
                    )
                    ));
                    if($relatedProfessors->have_posts()){?>

                    <hr class="section-break">
                    <h2 class="headline headline--medium "> <?php echo get_the_title(); ?> Professors</h2>
                    <?php 

                    echo'<ul class="professor-cards">';
                    while($relatedProfessors->have_posts()){
                    $relatedProfessors->the_post();

                    ?>
                    <li class="professor-card__list-item">
                        <a class="professor-card" href="<?php echo get_permalink(); ?>"></a>
                        <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>">
                        <span class="professor-card__name"><?php the_title();?></span>
                    </li>

                    <?php 

                    }
                    echo "</ul>";

                }
                    wp_reset_postdata(); 
                    $today = date('Ymd');
                    $homePageEvents = new WP_Query(array(
                    'posts_per_page'      =>2,
                    'post_type'           =>'event',
                    'meta_key'            =>'event_date',
                    'orderby'             =>'meta_value_num',
                    'order'               =>'ASC',
                    'meta_query'          =>array(
                        array(
                        'key'           =>'event_date',
                        'compare'       =>'>=',
                        'value'         =>$today,
                        'type'          =>'numeric'
                        ),
                        array(
                            'key'         =>'related_programs',
                            'compare'     =>'LIKE',
                            'value'       => '"' .get_the_ID() .'"' , //solve serialization problem e.g 1200 consider 12 so we need"12"
                            )
                    )
                    ));
                if($homePageEvents->have_posts()){?>

                <hr class="section-break">
            <h2 class="headline headline--medium ">Upcoming <?php echo get_the_title(); ?>Events</h2>
            <?php 
                

                while($homePageEvents->have_posts()){
                    $homePageEvents->the_post();
                  
                    get_template_part('template-parts/event','excerpt');
                    
                }
            
            ?>
                
                <?php }
                wp_reset_postdata();

                $relatedCampuses = get_field('related_compus');
                echo'<ul class="min-list link-list">';
                if($relatedCampuses){
                    echo'<hr class="section-break">';
                    echo'<h2 class="headline headline--medium">'.get_the_title(). 'Avialable at these caomuses</h2>';
                    foreach($relatedCampuses as $campus){
                        ?>
                        <li><a href="<?php echo get_the_permalink($campus);?>"><?php get_the_title($campus); ?></a></li>
                    <?php
                    }
                    echo'</ul>';
                }

            ?>
        </div>
 
 

<?php

}

get_footer(); 

