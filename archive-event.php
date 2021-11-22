


<?php get_header(); ?>
<?php pageBanner(
  array(
    'title'     => 'All Upcoming Events',
    'subtitle'  =>'Here are our latest events list'
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
        <?php 
            

            while(have_posts()){
                    the_post(); 

                get_template_part('template-parts/event', 'excerpt');
            }

            // echo the_posts_pagination(  );
            echo paginate_links(  );
        
        ?>
        <hr class="section-break">
        <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>">check out our past Events archive</a></p>
</div>


<?php get_footer(); ?>


