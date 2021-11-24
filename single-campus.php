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
              <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
              <?php echo $mapLocation['address'];?>
            </div>
              
              <?php
               
                  ?>
               
          <?php    
         
         

        
      
      ?>
      </div>
            <?php 
            
                $relatePrograms = get_field('related_programs');
                 if($relatePrograms){

                    echo '<hr  class="section-break">';
                    echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
                    echo '<ul class="link-list min-list">';   
                // print_r($relatePrograms);
                    foreach($relatePrograms as $program){ ?>

                    <li><a href="<?php echo get_the_permalink($program);?>"><?php echo get_the_title($program); ?></a></li>
                    
                    <?php }
                    echo "</ul>";  
                 }
               
            ?>
        </div>
 
 

<?php

}

get_footer(); 

