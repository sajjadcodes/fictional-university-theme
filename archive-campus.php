


<?php get_header(); ?>
<?php pageBanner(
  array(
    'title'     => 'Our Campuses',
    'subtitle'  =>'We have several conveniently located compuses'
  )
); ?>

<!-- <div class="page-banner"> 
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg');?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
             
        </h1>
        <div class="page-banner__intro">
          <p>Here are our latest events list</p>
        </div>
    </div>
</div> -->


<!-- Main sectin -->
<div class="container container--narrow page-section">
       
       <div class="acf-map">
       
         <?php 
        
            while(have_posts()){
                    the_post();
                    $mapLocation = get_field('map_lcation'); 
                    ?>

                <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                <?php echo $mapLocation['address'];?>
              </div>
                
                <?php
                    //  $mapLocation = get_field('map_lcation'); 
                    //  var_dump($mapLocation);  
                    //  exit();
                    ?>
                 
            <?php    
            // get_template_part('template-parts/event', 'excerpt');
            }

            // echo the_posts_pagination(  );
           
        
        ?>
        </div>
        <hr class="section-break">
        <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>">check out our past Events archive</a></p>
</div>


<?php get_footer(); ?>


