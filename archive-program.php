


<?php get_header(); ?>
<?php pageBanner(array(
        'title'       =>'All Programs',
        'subtitle'    =>'Here are our latest programs list'
)); ?>




<!-- Main sectin -->
<div class="container container--narrow page-section">
       <ul class="link-list min-list">
       <?php 
            
            while(have_posts()){
                    the_post(); ?>

                 <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
               <?php      
            }

            // echo the_posts_pagination(  );
            echo paginate_links(  );
        
        ?>
        </ul>
        
</div>


<?php get_footer(); ?>


