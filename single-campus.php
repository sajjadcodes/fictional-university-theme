<?php

get_header(); 

while(have_posts()){

    the_post();
    ?>
      <?php pageBanner(); ?>
        <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus');?>"><i class="fa fa-home" aria-hidden="true"></i>All</a> <span class="metabox__main"><?php the_title();?></span>
          </p>
        </div>
            <div class="generic-content">
                <?php the_content();?>
            </div>
            <div class="acf-map">
       
       <?php 
      
         
                  $mapLocation = get_field('map_lcation'); 
                  ?>

              <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">
              <h3><?php the_title();?></h3>
              <?php echo $mapLocation['address'];?>
            </div>
              
              <?php
               
                  ?>
               
          <?php    
         
         

        
      
      ?>
      </div>
            <?php 
             

             $today = date('Ymd');
             $relatedPrograms = new WP_Query(array(
             'posts_per_page'      =>-1,
             'post_type'           =>'program',
       
             'orderby'             =>'title',
             'order'               =>'ASC',
             'meta_query'          =>array(
                 array(
                     'key'         =>'related_campus',
                     'compare'     =>'LIKE',
                     'value'       => '"' .get_the_ID() .'"' , //solve serialization problem e.g 1200 consider 12 so we need"12"
                     )
             )
             ));
             if($relatedPrograms->have_posts()){?>

             <hr class="section-break">
             <h2 class="headline headline--medium "> <?php echo get_the_title(); ?> Programs</h2>
             <?php 

             echo'<ul class="min-list link-list">';
             while($relatedPrograms->have_posts()){
                $relatedPrograms->the_post();

             ?>
             <li>
                 <a  href="<?php echo get_permalink(); ?>"><span><?php the_title();?></span></a>
                 
             </li>

             <?php 

             }
             echo "</ul>";

         }
            ?>
        </div>
 
 

<?php

}

get_footer(); 

