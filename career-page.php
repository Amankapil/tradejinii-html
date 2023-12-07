<?php
    /**
     * Template Name: Careers Page
     * The custom career page template file
     */
 ?>
<?php get_header(); ?>
<div class="banner-container">
        <div class="career-left-container">
        <?php echo get_field("banner_text");?>
        </div>
        <?php $bimage = get_field('banner_image');?>
        <div class="career-right-container">
        <img class="image2" src="<?php echo esc_url($bimage['url']); ?>" alt="">
        </div>
    </div>
    
<div class="container-fluid" id="careers-container"> 
      <div class="job-list-container">
        <div class="job-list-left">
        <?php echo get_field("current_opening");?>
        <div class="filters filter-button-group">
          <ul>
          	<li class="active" data-filter="*">All</li>
            <?php
              $terms = get_terms('job-category');
              foreach ($terms as  $term) { ?>
              <li data-filter=".<?php  echo $term->slug; ?>"><?php echo $term->name; ?></li>
              <?php  } ?>
          		</ul>
      	</div>
        </div>
        <div class="job-list-right">
        <?php
                    $args = array(
                      'post_type' => 'job',
                      'posts_per_page' => 12
                    );
                    $query = new WP_Query($args);
                    $i=1;
                    $j=1;
                    while ($query->have_posts()) {
                      $query->the_post();
                      $termsArray = get_the_terms($post->ID, 'job-category');
                      $termsSLug = "";
                      foreach ($termsArray as $term) {
                        $termsSLug .= $term->slug . ' ';
                      }
                      ?>

                      <div class="job-post-list <?php echo  $termsSLug; ?>">
                      <p class="job-title"><storng><?php the_title();?></storng></p> 
                      <div class="job-location"><?php echo get_field("job_location") ?></div>
                      <button class="learnmore" data-open="modal<?php echo $i?>">Learn More</button>
                      <div class="reveal" id="modal<?php echo $i?>" data-reveal>
                        <h2><?php the_title();?></h2>
                        <div class="job-location"><?php echo get_field("job_location") ?></div>
                          <?php the_content(); ?>
                        <h4>Are you Match?</h4>
                         <button class="applybtn" data-open="secondmodal<?php echo $j?>">Apply Now</button>
                        <button class="close-button" data-close type="button"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="reveal" id="secondmodal<?php echo $j?>" data-reveal>
                          <h3><?php the_title();?></h3>
                          <div class="job-location"><?php echo get_field("job_location") ?></div>
                          <div id="job-ninja-form"><?php echo do_shortcode('[contact-form-7 id="3766" title="Job Form"]'); ?></div>
                          <button class="close-button" data-close type="button"><span aria-hidden="true">×</span></button>
                      </div>
                      <br><br>
                      <div class="job-border"></div><br>
                    </div>
                    
                   
                <?php  
                $i++;
                $j++; 
              }
				  wp_reset_postdata();
          ?>
      </div>
      </div>

      
      </div>
      <script>
$(document).ready( function() {
$('.job-list-right').isotope({
 itemSelector: '.job-post-list',
});

// filter items on button click
$('.filter-button-group').on( 'click', 'li', function() {
 var filterValue = $(this).attr('data-filter');
 $('.job-list-right').isotope({ filter: filterValue });
 $('.filter-button-group li').removeClass('active');
 $(this).addClass('active');
});
   })     
</script> 
<?php get_footer(); ?>